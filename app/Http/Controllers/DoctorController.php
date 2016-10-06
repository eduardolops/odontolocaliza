<?php

namespace Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Doctor\Http\Requests\DoctorRequest;
use Doctor\Models\User;

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
        
        return view('doctor.my_data.mydata', ['page_title' => 'Meus Dados', 'doctor' => $doctor]);
    }

}
