<?php

namespace Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Doctor\Http\Controllers\Controller;
use Doctor\Models\User;
use Doctor\Models\State;
use Doctor\Models\City;

class AdminHomeController extends Controller
{
   	protected $doctor; 

    public function __construct(User $doctor)
    {
        $this->doctor = $doctor;
    }

    public function index()
    {
    	$total        = $this->doctor->get()->count();
    	$totalActive  = $this->doctor->where('status', 'active')->get()->count();
    	$totalPending = $this->doctor->where('status', 'pending')->get()->count();
    	$totalSuspend = $this->doctor->where('status', 'suspend')->get()->count();
    	$totalDoctors = [ 
    		'total'   => $total, 
    		'active'  => $totalActive, 
    		'pending' => $totalPending, 
    		'suspend' => $totalSuspend
    	];

    	return view('admin.home.index_home', ['page_title' => 'Página Inicial', 'guard' => 'admin', 'total' => $totalDoctors]);
    }

    public function cities($state)
    {
        $state   = State::findOrFail($state)->uf;
        $cities  = City::where('uf','=', $state)->get();
        return response()->json($cities, 200);
    }
}
