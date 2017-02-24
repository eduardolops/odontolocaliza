<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\AddNewSpealizationDoctorRequest;
use Doctor\Models\Specialization;
use Doctor\Models\SpecializationDoctor;
use Auth;

class DoctorSpealizationsController extends Controller
{
    protected $specialization;
    protected $specialization_doctor;

    function __construct(Specialization $specialization, SpecializationDoctor $specialization_doctor)
    {
    	$this->specialization = $specialization;
    	$this->specialization_doctor = $specialization_doctor;
    }

    public function index()
    {
        $doctor     = Auth::user();
        $page_title = 'Minhas Especializações';
        $guard      = 'web';
        $specialization_doctor = $this->specialization_doctor->select(['specialization_doctors.id', 'specializations.name'])
                                                       ->join('users', 'users.id', '=', 'specialization_doctors.user_id')
                                                       ->join('specializations', 'specializations.id', '=', 'specialization_doctors.specialization_id') 
                                                       ->where('users.id','=',$doctor->id)->paginate(15);
        $specializations = $this->specialization->orderBy('name', 'asc')->get();
        return view('doctor.profile.spealizations', compact('page_title', 'doctor', 'specialization_doctor', 'specializations', 'guard'));
    }

    public function store(AddNewSpealizationDoctorRequest $request)
    {
        try{
            $this->specialization_doctor->create($request->all());
            return redirect()->route('doctor::spealizations')
                             ->with('status', 'Especialização adicionado com sucesso!');
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
        $specialization_doctor = $this->specialization_doctor->findOrFail($id);

        if( !$specialization_doctor ):
            return redirect()->route('doctor::spealizations')
                             ->with('error', 'Especialização não encontrado, tente novamente mais tarde.');
        endif;

        try{
            $specialization_doctor->delete();
            return redirect()->route('doctor::spealizations')
                             ->with('status', 'Especialização excluída com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
