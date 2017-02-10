<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\HealthInsuranceRequest;
use Doctor\Models\HealthInsurance;
use Validator;

class HealthInsuranceController extends Controller
{
    private $health_insurances; 

    public function __construct(HealthInsurance $health_insurance)
    {
        $this->health_insurances = $health_insurance;
    }

    public function index(Request $request)
    {
        $role = $request->input('search');
        $health_insurances = $this->health_insurances
                                  ->where(function($query) use($role){
                                    if($role):
                                        $query->where('name','like','%'.$role.'%');
                                    endif;
                                  })->paginate(15);
    	return view('admin.register.health_insurance.index', ['page_title' => 'Planos de Saúde', 'health_insurances' => $health_insurances, 'guard' => 'admin']);
    }

    public function create()
    {
        return view('admin.register.health_insurance.create', ['page_title' => 'Planos de Saúde', 'guard' => 'admin']);   
    }

    public function store(HealthInsuranceRequest $request)
    {
    	try{
    		$this->health_insurances->create($request->all());
    		return redirect()->route('admin::health_insurance')->with('status', 'Cadastro realizado com sucesso!');
    	} catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

    public function show($id)
    {
        $plan = $this->health_insurances->find($id);
        if(!$plan){
            return redirect()->route('admin::health_insurance');
        }
        return view('admin.register.health_insurance.updade', ['page_title' => 'Editar: '.title_case($plan->name), 'health_insurance' => $plan, 'guard' => 'admin']);   
    }

    public function update($id, HealthInsuranceRequest $request)
    {
        $plan = $this->health_insurances->find($id);
        if(!$plan) {
            return redirect()->route('admin::health_insurance.show')->with('error', 'Plano de Saúde não encontrada');
        }

        try {
            $plan->update($request->all());
            return redirect()->route('admin::health_insurance')->with('status', 'Plano de Saúde alterada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    } 

    public function destroy($id)
    {
        $plan = $this->health_insurances->find($id);
        if(!$plan) {
            return redirect()->route('admin::health_insurance')->with('error', 'Plano de Saúde não encontrada');
        }

        try {
            $plan->delete();
            return redirect()->route('admin::health_insurance'); //->with('status', 'Especialização deletada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
