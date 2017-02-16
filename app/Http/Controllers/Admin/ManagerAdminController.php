<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\ManagerAdminRequest;
use Doctor\Models\Admin;

class ManagerAdminController extends Controller
{
	protected $admin; 

    function __construct(Admin $admin)
    {
    	$this->admin = $admin;
    }

    public function index()
    {
        $guard = 'admin';
    	$page_title = 'Gerenciar Administradores';
    	$admins = $this->admin->paginate(15);
    	return view('admin.manager.admin.index', compact('page_title', 'guard', 'admins'));
    }

    public function create()
    {
    	$guard = 'admin';
    	$page_title = 'Criar um novo Administrador';
    	return view('admin.manager.admin.create', compact('page_title', 'guard'));
    }

    public function store(ManagerAdminRequest $request)
    {
    	try{
    		$this->admin->create($request->all());
    		return redirect()->route('admin::admin')->with('status', 'Cadastro realizado com sucesso!');
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
        $admin = $this->admin->findOrFail($id);
        if(!$admin){
            return redirect()->route('admin::admin');
        }
        return view('admin.manager.admin.updade', ['page_title' => 'Editar: '.title_case($admin->name), 'admin' => $admin, 'guard' => 'admin']);   
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
