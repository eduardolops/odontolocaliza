<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Doctor\Models\InfoComplementary;
use Doctor\Models\ContentInfoComplementary;

class DoctorComplementariesController extends Controller
{	
	protected $info_complementary;
	protected $content_info_complementary;

    function __construct(InfoComplementary $info_complementary, ContentInfoComplementary $content_info_complementary)
    {	
    	$this->info_complementary         = $info_complementary;
    	$this->content_info_complementary = $content_info_complementary;
    }

    public function index()
    {
        $page_title = 'Dados Complementáres';
        $guard   = 'web';
        $complementaries =  $this->info_complementary->all();
        return view('doctor.profile.complementary', compact('page_title', 'complementaries', 'guard'));
    }

    public function store(Request $request)
    {
        foreach ($request->get('id') as $key => $id) {
            $complementContent = [
                'info_id'     => $id,
                'user_id'     => $request->get('doctor'),
                'description' => $request->get('description_'.$key),
                'status'      => 1
            ];

            $infoComplementary = $this->content_info_complementary->where([ 'info_id' => $id, 'user_id' => $request->get('doctor') ])->first();
            if( count($infoComplementary) >= 1 )
                $infoComplementary->update($complementContent);
            else
                $this->content_info_complementary->create($complementContent);
        }

        return redirect()->route('doctor::complementary')
                             ->with('status', 'Dados Complementáres atualizados com sucesso!');
    }
}
