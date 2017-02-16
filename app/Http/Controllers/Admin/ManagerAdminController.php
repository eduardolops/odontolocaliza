<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\ManagerAdminRequest;
use Doctor\Http\Requests\AdminProfileRequest;
use Doctor\Models\Admin;

class ManagerAdminController extends Controller
{
	protected $admin; 

    function __construct(Admin $admin)
    {
    	$this->admin = $admin;
    }

    public function index(Request $request)
    {	
    	$search = $request->search;
        $guard = 'admin';
    	$page_title = 'Gerenciar Administradores';
    	$admins = $this->admin->where( function($query) use($search){
                                    if($search):
                                        $query->where('name','like','%'.$search.'%');
                                    endif;
                              })->paginate(15);
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
        return view('admin.manager.admin.update', ['page_title' => 'Editar: '.title_case($admin->name), 'admin' => $admin, 'guard' => 'admin']);   
    }

    public function update($id, AdminProfileRequest $request)
    {
        $admin = $this->admin->findOrFail($id);
        if(!$admin) {
            return redirect()->route('admin::admin.show')->with('error', 'Usuário não encontrada');
        }

        try {
            $admin->update($request->except(['password']));

            if( $request->has('password') ):
                $admin->update($request->only(['password']));
            endif;

            return redirect()->route('admin::admin')->with('status', 'Usuário alterada com sucesso!');
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
        $admin = $this->admin->findOrFail($id);
        if(!$admin) {
            return redirect()->route('admin::health_insurance')->with('error', 'Usuário não encontrada');
        }

        try {
            $admin->delete();
            return redirect()->route('admin::admin'); //->with('status', 'Especialização deletada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
