<?php

namespace Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Doctor\Http\Requests\CitiesRequest;
use Doctor\Models\State;
use Doctor\Models\City;
use Validator;

class CitiesController extends Controller
{
    private $cities; 
	private $states; 

    public function __construct(City $cities, State $states)
    {
        $this->states = $states;
    	$this->cities = $cities;
    }

    public function index()
    {
        $cities = $this->cities->all();
    	return view('admin.register.cities.index', ['page_title' => 'Cidades', 'cities' => $cities]);
    }

    public function create()
    {
        $states = $this->states->all(); 
        return view('admin.register.cities.create', ['page_title' => 'Cidades', 'states' => $states]);   
    }

    public function store(CitiesRequest $request)
    {
    	try{
    		$this->cities->create($request->all());
    		return redirect()->route('admin::cities.create')->with('status', 'Cadastro realizado com sucesso!');
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
        $city = $this->cities->find($id);
        if(!$city){
            return redirect()->route('admin::cities');
        }
        $states = $this->states->all(); 
        return view('admin.register.cities.updade', ['page_title' => 'Cidades', 'states' => $states, 'city' => $city]);   
    }

    public function update($id, Request $request)
    {
        $city = $this->cities->find($id);
        if(!$city) {
            return redirect()->route('admin::cities')->with('error', 'Cidade não encontrada');
        }

        try {
            $city->update($request->all());
            return redirect()->route('admin::cities')->with('status', 'Cidade alterada com sucesso!');
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
        $city = $this->cities->find($id);
        if(!$city) {
            return redirect()->route('admin::cities')->with('error', 'Cidade não encontrada');
        }

        try {
            $city->delete();
            return redirect()->route('admin::cities') //->with('status', 'Cidade deletada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
