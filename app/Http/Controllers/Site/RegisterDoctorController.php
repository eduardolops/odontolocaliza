<?php

namespace Doctor\Http\Controllers\Site;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\DoctorRequest;
use Doctor\Models\User;
use Doctor\Models\Plan;
use Doctor\Models\Specialization;
use Doctor\Models\HealthInsurance;
use Doctor\Models\State;
use Doctor\Models\ConvenantsAcceptsDoctor;
use Doctor\Models\SpecializationDoctor;

use Auth;
use SEO;


class RegisterDoctorController extends Controller
{

	protected $plan;
	protected $specialization; 
	protected $healthInsurance;
	protected $doctor;
	protected $specialization_doctor;
	protected $convenants_accepts_doctor;

	function __construct(User $user,  Plan $plan, Specialization $specialization, HealthInsurance $healthInsurance,
	SpecializationDoctor $specialization_doctor, ConvenantsAcceptsDoctor $convenants_accepts )
	{
		$this->plan = $plan;
		$this->doctor = $user;
		$this->specialization  = $specialization;
		$this->healthInsurance = $healthInsurance;
		$this->specialization_doctor     = $specialization_doctor;
		$this->convenants_accepts_doctor = $convenants_accepts;
	}

    public function sign()
    {
        SEO::setTitle('Sou Dentista');
        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addProperty('type', 'articles');
        $plans = $this->plan->all();
        return view('layout.pages.i-am-destist', ['plans' => $plans]);
    }

    public function register(Request $request)
    {
        SEO::setTitle('Sou Dentista');
        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addProperty('type', 'articles'); 

        $specializations = $this->specialization->all();
        $healths = $this->healthInsurance->all();
        $states  = State::orderBy('name', 'asc')->get();

        return view('layout.pages.register', compact( 'states','specializations','healths' ));
    }


    public function store(DoctorRequest $request)
    {
        // dd($request->all());
        try{

            $req = [
                  "number_cro"   => $request->number_cro,
                  "name"         => $request->name,
                  "email"        => $request->email,
                  "doc_cpf"      => $request->doc_cpf,
                  "phone"        => $request->phone,
                  "cell_phone"   => $request->cell_phone,
                  "zip_code"     => $request->zip_code,
                  "address"      => $request->address,
                  "number"       => $request->number,
                  "complement"   => $request->complement,
                  "neighborhood" => $request->neighborhood,
                  "states"       => $request->states,
                  "city"         => $request->city,
                  "office_hours" => '',
                  "password"     => $request->password,
                  "country"      => $request->country,
                  "plan"         => $request->plan,
                  "terms_use"    => 1
            ];

            # format state
            $input  = [ 'state' => $request->states ];
            $input  = giveLastParam($input);
            $req['states'] = $input['state'];

            # format city
            $input  = [ 'city' => $request->city ];
            $input  = giveLastParam($input);
            $req['city'] = $input['city'];
        

            $doctor = $this->doctor->create($req);
            
            $this->insertInfoComplementies( $request, $doctor );

            if( Auth::guard('web')->loginUsingId($doctor->id) ){
            	return redirect()->route('doctor::home_doctor');
            }else{
            	return redirect()->route('home');
            }

        } catch(\Exception $e) {
            $message = $e->getMessage().' '. $e->getLine();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

    protected function insertInfoComplementies( $request, $doctor )
    {
        foreach ($request->specialization as $k => $v) {
            $input   = [ 'specialization' => $v ];
            $input   = giveLastParam($input);
            $specialization[$k] = [
                'user_id'           => $doctor->id,
                'specialization_id' => $input['specialization']
            ];
        }

        foreach ($request->healthinsurance as $k => $v) {
            $input   = [ 'healthinsurance' => $v ];
            $input   = giveLastParam($input);
            $convenants_accepts[$k] = [
                'user_id'      => $doctor->id,
                'convenant_id' => $input['healthinsurance']
            ];
        }

        $this->specialization_doctor->insert($specialization);
        $this->convenants_accepts_doctor->insert($convenants_accepts);
    }
}
