<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\SpecializationsRequest;
use Doctor\Models\Specialization;
use Validator;

class SpecializationController extends Controller
{
    private $specializations; 

    public function __construct(Specialization $specialization)
    {
        $this->specializations = $specialization;
    }

    public function index(Request $request)
    {
        $role = $request->input('search');

        $specializations = $this->specializations
                                ->where(function($query) use($role){
                                    if($role):
                                        $query->where('name','like','%'.$role.'%');
                                    endif;
                                })->paginate(15);
    	return view('admin.register.specializations.index', ['page_title' => 'Especializações', 'specializations' => $specializations, 'guard' => 'admin']);
    }

    public function create()
    {
        return view('admin.register.specializations.create', ['page_title' => 'Especializações', 'guard' => 'admin']);
    }

    public function store(SpecializationsRequest $request)
    {
    	try{
    		$this->specializations->create($request->all());
    		return redirect()->route('admin::specializations.create')->with('status', 'Cadastro realizado com sucesso!');
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
        $specialization = $this->specializations->find($id);
        if(!$specialization){
            return redirect()->route('admin::specializations');
        }
        $page_title = 'Editar: '.title_case($specialization->name);
        $guard = 'admin';
        return view('admin.register.specializations.updade', compact( 'page_title', 'specialization', 'guard' ));   
    }

    public function update($id, SpecializationsRequest $request)
    {
        $specialization = $this->specializations->find($id);
        if(!$specialization) {
            return redirect()->route('admin::specializations')->with('error', 'Especialização não encontrada');
        }

        try {
            $specialization->update($request->all());
            return redirect()->route('admin::specializations')->with('status', 'Especialização alterada com sucesso!');
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
        $specialization = $this->specializations->find($id);
        if(!$specialization) {
            return redirect()->route('admin::specializations')->with('error', 'Especialização não encontrada');
        }

        try {
            $specialization->delete();
            return redirect()->route('admin::specializations'); //->with('status', 'Especialização deletada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
