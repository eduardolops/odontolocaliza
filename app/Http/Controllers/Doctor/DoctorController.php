<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Doctor\Models\User;
use Doctor\Models\State;
use Doctor\Models\City;

use Auth;

class DoctorController extends Controller
{
    protected $doctor; 

    public function __construct(User $userDoctor)
    {
        $this->doctor = $userDoctor;
    }

    public function index()
    {
        $doctor  = Auth::user();
        $page_title = 'Meus Dados';
        $states  = State::orderBy('name', 'asc')->get();
        $cities  = City::all();
        $guard   = 'web';
        return view('doctor.profile.index', compact('page_title', 'doctor', 'states', 'cities', 'guard'));
    }


    public function update(Request $request, $id)
    {
        
        $doctor = $this->doctor->findOrFail($id);

        if( !$doctor ):
            return redirect()->route('doctor::profile')
                             ->with('error', 'Doutor não encontrado, tente novamente mais tarde.');
        endif;

        try{
            $doctor->update($request->except(['password']));

            if( $request->has('password') ):
                $doctor->update($request->only(['password']));
            endif;

            return redirect()->route('doctor::profile')
                             ->with('status', 'Informações atualizadas com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
