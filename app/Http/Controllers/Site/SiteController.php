<?php

namespace Doctor\Http\Controllers\Site;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Models\State;
use Doctor\Models\City;
use Doctor\Models\Specialization;
use Doctor\Models\HealthInsurance;
use Doctor\Models\User;
use Ixudra\Curl\Facades\Curl;
use Canducci\ZipCode\Facades\ZipCode;

use SEO;

class SiteController extends Controller
{
    protected $user; 
    protected $specialization; 
    protected $healthInsurance;

    function __construct(User $user, Specialization $specialization, HealthInsurance $healthInsurance)
    {
        $this->user = $user;
        $this->specialization  = $specialization;
        $this->healthInsurance = $healthInsurance;
    }

    public function home()
    {
        $specializations = $this->specialization->all();
        $healths = $this->healthInsurance->all();
        $states  = State::all();

        $select = [
                    'users.*',
                    'states.name as state_name', 
                    'cities.name as city_name',
                    'states.id as state_id',
                    'states.uf as state_uf',
                    'cities.id as city_id',
                ];

        $doctors = $this->user->select($select)
                              ->join('states', 'users.states', '=', 'states.id')
                              ->join('cities', 'users.city', '=', 'cities.id')
                              ->where( 'users.subscription_active', 1 )
                              ->where( 'users.expires_at', '>=', date('Y-m-d') )
                              ->inRandomOrder()->get();

        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addImage(['url' => asset('/images/banner/02.jpg'), 'size' => '300']);

        return view('layout.pages.home', compact( 'specializations', 'states', 'healths', 'doctors' ));
    }

    public function about()
    {
        SEO::setTitle('Sobre Nós');
        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addProperty('type', 'articles'); 
        
        return view('layout.pages.about');
    }

    public function searchCRO(Request $request)
    {
        $cro = '';
        if( !empty($request->input('cro')) ):
            $cro = $request->input('cro');
        endif;

        $curl  = 'http://www.consultacrm.com.br/api/';
        $param = [
                    'tipo'    => 'cro',
                    'q'       => $cro,
                    'chave'   => '4086218239',
                    'destino' => 'json' 
                ];

        try {
            
            $response    = Curl::to($curl)->withData($param)->get();
            // $responseXML = simplexml_load_string($response);
            dd($response);
            return response()->json([
                'data' => $response,
                'code' => 200,
            ], 200);

        } catch (\Exception $e) {
            $messege = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

    public function cities($state)
    {
        $input    = [ 'state' => $state ];
        $input    = giveLastParam($input);
        $state    = State::findOrFail($input['state'])->uf;
        $response = [];
        
        $cities  = City::where('uf','=', $state)->get();  

        foreach ($cities as $k => $city) {
            $response[$k] = [
                            'name' => title_case($city->name),
                            'slug' => str_slug($city->name,'-').'-'.$city->id,
                        ];
        }
        
        return response()->json($response, 200);
    }

    public function zip_code($zip_code)
    {
        if( empty($zip_code) ){
            return false;
        }
        
        $zipCodeInfo  = ZipCode::find($zip_code);

        if (!$zipCodeInfo) {
            return false;
        } 
        
        return response()->json($zipCodeInfo->getArray(), 200);
    }
}