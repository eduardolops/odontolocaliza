<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\LinkRequest;

use Doctor\Models\User;
use Doctor\Models\Link;

class LinksController extends Controller
{
 	protected $doctor;
 	protected $link;

 	function __construct(User $doctor, Link $link)
 	{
        $this->middleware('whichPlanSubscription');
 		$this->doctor = $doctor;
 		$this->link   = $link;
 	}

 	public function index()
 	{
 		$page_title = 'Links Úteis';
        $guard      = 'web';
        $urls       = auth()->guard($guard)->user()->link;

        return view('doctor.links.index', compact('page_title','guard', 'urls'));
 	}

 	public function create()
    {
        return view('doctor.links.create', ['page_title' => 'Cadastrar Link', 'guard' => 'web']);   
    }

     public function store(LinkRequest $request)
    {
    	try{
    		$user_id = auth()->guard('web')->user()->id;
    		$this->doctor->findOrFail($user_id)->link()->create([ 'user_id' => $user_id, 'link' => $request->link]);
    		return redirect()->route('doctor::links')->with('status', 'Cadastro realizado com sucesso!');
    	} catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

     public function show($link_id)
    {
        $url = $this->link->where([ 'id' => $link_id, 'user_id' => auth()->guard('web')->user()->id ])->first();
        if(!$url){
            return redirect()->route('doctor::links');
        }
        return view('doctor.links.updade', ['page_title' => 'Editar: '.title_case($url->link), 'url' => $url, 'guard' => 'web']);   
    }

    public function update($link_id, LinkRequest $request)
    {
    	$url = $this->link->where([ 'id' => $link_id, 'user_id' => auth()->guard('web')->user()->id ])->first();

        if(!$url) {
            return redirect()->route('doctor::links_show')->with('error', 'Link não encontrado');
        }

        try {
            $url->update($request->all());
            return redirect()->route('doctor::links')->with('status', 'Link alterado com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage().' Line: '.$e->getLine();
        }

        return response()->json([
            // 'message' => $message,
            'code' => 400,
        ], 400);
    } 

    public function destroy($link_id)
    {
        $url = $this->link->where([ 'id' => $link_id, 'user_id' => auth()->guard('web')->user()->id ])->first();
        if(!$url) {
            return redirect()->route('doctor::links')->with('error', 'Link não encontrado');
        }

        try {
            $url->delete();
            return redirect()->route('doctor::links'); //->with('status', 'Especialização deletada com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }

}
