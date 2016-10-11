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

    public function index()
    {
        $specializations = $this->specializations->all();
    	return view('admin.register.specializations.index', ['page_title' => 'Especializações', 'specializations' => $specializations]);
    }

    public function create()
    {
        return view('admin.register.specializations.create', ['page_title' => 'Especializações']);   
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
        return view('admin.register.specializations.updade', ['page_title' => 'Cidades', 'specialization' => $specialization]);   
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
