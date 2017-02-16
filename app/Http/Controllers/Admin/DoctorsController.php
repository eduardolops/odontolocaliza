<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Models\User;
use Doctor\Models\Plan;
use Doctor\Models\State;
use Doctor\Models\City;

use Auth;

class DoctorsController extends Controller
{
    protected $doctor; 

    public function __construct(User $doctor)
    {
        $this->doctor = $doctor;
    }

    public function index(Request $request)
    {
        $req = [
                'plan' => $request->input('plan'),
                'doctor' => $request->input('doctor'),
                'status' => $request->input('status')
            ];

    	$guard  = 'admin';
    	$page_title = 'Doutores Cadastrados';
        $plans = Plan::all();
    	$doctors = $this->doctor->where( function($query) use($req){
                                if($req['plan']):
                                    $query->where('subscription_plan',$req['plan']);
                                endif;
                                if($req['doctor']):
                                    $query->where('name','like','%'.$req['doctor'].'%');
                                endif;
                                if($req['status']):
                                    $query->where('status', $req['status']);
                                endif;
                            })->paginate(15);
    	return view('admin.doctors.index',compact('guard', 'page_title', 'doctors', 'plans'));
    }

    public function show($id)
    {
    	if( ! is_numeric($id) ):
    		return redirect()->route('admin::doctors');
    	endif;

    	$guard   = 'admin';
    	$states  = State::all();
        $cities  = City::all();
    	$doctor  = $this->doctor->findOrFail($id);
    	$page_title = 'Dr(a): '. title_case($doctor->name);
    	return view('admin.doctors.update',compact('page_title', 'doctor', 'states', 'cities', 'guard'));	
    }

    public function update(Request $request, $id)
    {
        
        $doctor = $this->doctor->findOrFail($id);

        if( !$doctor ):
            return redirect()->route('admin::doctors.show', $id)
                             ->with('error', 'Doutor não encontrado, tente novamente mais tarde.');
        endif;

        try{
            $doctor->update($request->except(['password']));

            if( $request->has('password') ):
                $doctor->update($request->only(['password']));
            endif;

            return redirect()->route('admin::doctors.show', $id)
                             ->with('status', 'Informações atualizadas com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

    public function logar($user_id)
    {
        if( ! is_numeric($user_id) ):
            return redirect()->route('admin::doctors')->with('error', 'Não foi possível logar no painel de esse usuário');
        endif;

        $doctor = $this->doctor->findOrFail($user_id);

        if( Auth::guard('web')->loginUsingId($doctor->id) ){
            return redirect()->route('doctor::home_doctor');
        }else{
            return redirect()->route('admin::doctors')->with('error', 'Não foi possível logar no painel de esse usuário');
        }
    }
}
