<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\AddNewConvenantDoctorRequest;

use Doctor\Models\ConvenantsAcceptsDoctor;
use Doctor\Models\HealthInsurance;

use Auth;

class DoctorConvenantController extends Controller
{

	protected $convenants_accepts_doctor;
	protected $healthInsurance;

	function __construct( ConvenantsAcceptsDoctor $convenant, HealthInsurance $healthInsurance )
	{
		$this->convenants_accepts_doctor = $convenant;
		$this->healthInsurance           = $healthInsurance;
	}

 	public function index()
    {
        $doctor  = Auth::user();
        $page_title = 'Convênios Odontológicos Aceitos';
        $guard   = 'web';
        $convenants_accepts = $this->convenants_accepts_doctor->select(['convenants_accepts_doctors.id', 'healthinsurances.name'])
                                                       ->join('users', 'users.id', '=', 'convenants_accepts_doctors.user_id')
                                                       ->join('healthinsurances', 'healthinsurances.id', '=', 'convenants_accepts_doctors.convenant_id')
                                                       ->where('users.id','=',$doctor->id)->paginate(15);
        $convenants = $this->healthInsurance->orderBy('name', 'asc')->get();
        return view('doctor.profile.convenant', compact('page_title', 'doctor', 'convenants', 'convenants_accepts', 'guard'));
    }

    public function store(AddNewConvenantDoctorRequest $request)
    {
        try{
            $this->convenants_accepts_doctor->create($request->all());
            return redirect()->route('doctor::convenant')
                             ->with('status', 'Convênio odontológico adicionado com sucesso!');
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
        $convenants_accepts_doctor = $this->convenants_accepts_doctor->findOrFail($id);

        if( !$convenants_accepts_doctor ):
            return redirect()->route('doctor::convenant')
                             ->with('error', 'Convênio odontológico não encontrado, tente novamente mais tarde.');
        endif;

        try{
            $convenants_accepts_doctor->delete();
            return redirect()->route('doctor::convenant')
                             ->with('status', 'Convênio odontológico excluído com sucesso!');
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'code' => 400,
        ], 400);
    }
}
