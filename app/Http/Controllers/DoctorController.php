<?php

namespace Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Doctor\Http\Requests\DoctorRequest;
use Doctor\Models\User;
use Doctor\Models\Specialization;
use Doctor\Models\State;
use Doctor\Models\City;

use Auth;

class DoctorController extends Controller
{
	private $doctor; 

    public function __construct(User $userDoctor)
    {
    	$this->doctor = $userDoctor;
    }

    public function index()
    {
    	return view('layout.create');
    }

    public function store(DoctorRequest $request)
    {
    	try{
    		$this->doctor->create($request->all());
    		return redirect()->route('doctor.index')->with('status', 'Cadastro realizado com sucesso!');
    	} catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

    public function profile()
    {
        $doctor = Auth::user();
        if(!$doctor) {
            $doctor = '';
        }
        $specializations = Specialization::all();
        $states = State::all();
        $cities = City::all();
        return view('doctor.my_data.mydata', ['page_title' => 'Meus Dados', 'doctor' => $doctor, 'specializations' => $specializations, 'states' => $states, 'cities' => $cities]);
    }


    public function profilepost(Request $request)
    {
        dd($request);
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
                    'chave'   => '',
                    'destino' => 'xml' 
                ];

        try {
            
            $response    = Curl::to($curl)->withData($param)->get();
            $responseXML = simplexml_load_string($response);

            return response()->json([
                'data' => $responseXML,
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
}
