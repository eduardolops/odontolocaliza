<?php

namespace Doctor\Http\Controllers\Site;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Models\State;
use Doctor\Models\City;
use Doctor\Models\User;
use Doctor\Models\ConvenantsAcceptsDoctor;
use Doctor\Models\SpecializationDoctor;
use Doctor\Models\InfoComplementary;
use Doctor\Models\ContentInfoComplementary;
use Doctor\Http\Requests\SearchRequest;

use SEO;

class SearchController extends Controller
{
	  protected $user;
    protected $specialization_doctor;
    protected $convenants_accepts;
    protected $info_complementary;
    protected $content_info_complementary;

	  function __construct(User $user,SpecializationDoctor $specialization_doctor, 
						 ConvenantsAcceptsDoctor $convenants_accepts, InfoComplementary $info_complementary,ContentInfoComplementary $content_info_complementary)
    {
        $this->user = $user;
        $this->specialization_doctor      = $specialization_doctor;
        $this->convenants_accepts         = $convenants_accepts;
        $this->info_complementary         = $info_complementary;
        $this->content_info_complementary = $content_info_complementary;
    }

    public function search(SearchRequest $req)
    {
        $input = $req->all();
        $input = giveLastParam($input);

        $select = [
                    'users.*',
                    'states.name as state_name', 
                    'cities.name as city_name',
                    'states.id as state_id',
                    'states.uf as state_uf',
                    'cities.id as city_id',
                ];

        $doctors = $this->user->select($select)
                              ->leftJoin('states', 'users.states', '=', 'states.id')
                              ->leftJoin('cities', 'users.city', '=', 'cities.id')
                              ->leftJoin('specialization_doctors', 'users.id', '=', 'specialization_doctors.user_id')
                              ->leftJoin('convenants_accepts_doctors', 'users.id', '=', 'convenants_accepts_doctors.user_id')
                              ->where( 'users.subscription_active', 1 )
                              ->where( 'users.expires_at', '>=', date('Y-m-d') )
                              ->where( function($query) use($input){
                                    if($input['state']):
                                        $query->where('users.states',$input['state']);
                                    endif;
                                    if($input['city']):
                                        $query->where('users.city',$input['city']);
                                    endif;
                                    if($input['specialization']):
                                        $query->where('specialization_doctors.specialization_id',$input['specialization']);
                                    endif;
                                    if($input['plan']):
                                        $query->where('convenants_accepts_doctors.convenant_id',$input['plan']);
                                    endif;
                                    if($input['name']):
                                        $query->where('users.name','like','%'.$input['name'].'%');
                                    endif;
                              })->groupBy('users.id')->paginate(15);

        $state_name = State::findOrFail($input['state'])->name;
        $city_name  = City::findOrFail($input['city'])->name;
        $page_title = 'Busca em '. $state_name . ' na cidade '. $city_name;
        
        SEO::setTitle($page_title);
        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addProperty('type', 'articles'); 

        return view('layout.pages.search', compact( 'page_title', 'doctors' ));
    }
    
    public function single($state, $city, $dentist)
    {
        $input   = [ 'state' => $state, 'city' => $city, 'dentist' => $dentist ];
        $input   = giveLastParam($input);

        $select = [
                    'users.*',
                    'states.name as state_name', 
                    'cities.name as city_name',
                    'states.id as state_id',
                    'states.uf as state_uf',
                    'cities.id as city_id',
                ];

        $doctor  = $this->user->select($select)
                              ->join('states', 'users.states', '=', 'states.id')
                              ->join('cities', 'users.city', '=', 'cities.id')
                              ->where( 'users.subscription_active', 1 )
                              ->where( 'users.expires_at', '>=', date('Y-m-d') )
                              ->where('users.states',$input['state'])
                              ->where('users.city',$input['city'])
                              ->where('users.id',$input['dentist'])
                              ->firstOrFail();

        $links      = $doctor->link;
        $gallery    = $doctor->gallery;
        $address    = title_case($doctor->address).', '.$doctor->number.' - '.title_case($doctor->neighborhood).', '.title_case($doctor->city_name).' - '.$doctor->state_uf;
        $geo        = geoLocationLatLog($address);
        $page_title = 'Dr(a) '.title_case($doctor->name).' CRO '. $doctor->number_cro;

        $specializations = $this->specialization_doctor->select(['specializations.name'])
                                                       ->join('users', 'users.id', '=', 'specialization_doctors.user_id')
                                                       ->join('specializations', 'specializations.id', '=', 'specialization_doctors.specialization_id') 
                                                       ->where('users.id',$input['dentist'])->get();

        $convenants_accepts = $this->convenants_accepts->select(['healthinsurances.name'])
                                                       ->join('users', 'users.id', '=', 'convenants_accepts_doctors.user_id')
                                                       ->join('healthinsurances', 'healthinsurances.id', '=', 'convenants_accepts_doctors.convenant_id') 
                                                       ->where('users.id',$input['dentist'])->get();
        
        $complementaries = [];
        foreach ($this->info_complementary->all() as $k => $complementary) {
            $content = $this->content_info_complementary->where('info_id','=', $complementary->id)
                                                        ->where('user_id','=', $input['dentist'])->first();

            if( count($content) >= 1 ):
                $complementaries[$k] = [
                    'info_name'   => $complementary->info_name,
                    'description' => $content->description,
                    'image'       => $complementary->image
                ];
            endif;
        }

        SEO::setTitle($page_title);
        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addProperty('type', 'articles')
                        ->addImage(['url' => asset('storage/images/doctor/profile/'.$doctor->thumb)]); 
        
        return view('layout.pages.single', compact('doctor', 'specializations', 'convenants_accepts', 'geo', 'complementaries', 'page_title', 'links', 'gallery'));
    }
}
