<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\PlanRequest;
use Doctor\Models\Plan;


class PlansController extends Controller
{
	protected $plan;
    
	function __construct(Plan $plan)
	{
		$this->plan = $plan;
	}

	public function index(Request $request)
    {
        $role = $request->input('search');

		$guard = 'admin';
		$page_title = 'Planos de Cobrança';
        $plans = $this->plan->where(function($query) use($role){
                                if($role):
                                    $query->where('name','like','%'.$role.'%');
                                endif;
                            })->paginate(15);
		return view('admin.register.plans.index', compact('plans', 'guard', 'page_title'));
	}

	public function create()
	{
		return view('admin.register.plans.create', ['guard' => 'admin', 'page_title' => 'Novo Plano']);
	}

	public function store(PlanRequest $request)
	{
    	try{
    		$this->plan->create($request->all());
    		return redirect()->route('admin::plan')->with('status', 'Cadastro realizado com sucesso!');
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
        $plan = $this->plan->find($id);
        if(!$plan){
            return redirect()->route('admin::plan');
        }
        $page_title = 'Editar: '. title_case($plan->name);
        $guard = 'admin';
        return view('admin.register.plans.updade', compact( 'page_title', 'plan', 'guard' ));   
    }

    public function update($id, PlanRequest $request)
    {
        $plan = $this->plan->find($id);
        if(!$plan) {
            return redirect()->route('admin::plan')->with('error', 'Plano de Cobrança não encontrada');
        }

        try {
            $plan->update($request->all());
            return redirect()->route('admin::plan')->with('status', 'Plano de Cobrança alterada com sucesso!');
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
        $plan = $this->plan->find($id);
        if(!$plan) {
            return redirect()->route('admin::plan')->with('error', 'Plano de Cobrança não encontrada');
        }

        try {
            $plan->delete();
            return redirect()->route('admin::plan'); //->with('status', 'Especialização deletada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }


}
