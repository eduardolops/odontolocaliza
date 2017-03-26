<?php

namespace Doctor\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Doctor\Http\Controllers\Controller;
use Doctor\Models\User;
use Auth;

class DoctorHomeController extends Controller
{
   	protected $doctor; 

    public function __construct(User $doctor)
    {
        $this->doctor = $doctor;
    }

    public function index()
    {
        $doctor  = Auth::user();
        $totalViewPage  = $doctor->view_count_access()->where('type_view', 1)->count();
        $totalViewPhone = $doctor->view_count_access()->where('type_view', 2)->count();
        $totalView = [
            'viewPage'  => $totalViewPage,
            'viewPhone' => $totalViewPhone
        ];
        
    	return view('doctor.home.index_home', ['page_title' => 'Página Incial', 'guard' => 'web', 'totalView' => $totalView]);
    }
}
