<?php

namespace Doctor\Http\Controllers\Site;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\UploadImageRequest;
use Doctor\Models\User;

class UploadController extends Controller
{
	protected $doctor;

	function __construct(User $user)
	{
		$this->doctor = $user;
	}
 	
 	public function upload($user_id, UploadImageRequest $request)
    {
        if( $request->hasFile('upload') ){

            $doctor    = $this->doctor->findOrFail($user_id);
            $file      = $request->file('upload');
            $filename  = $file->getClientOriginalName();
            $extension = $file->extension();
            $picture   = sha1($filename . time()) . '.' . $extension;

            if( !empty($doctor->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$doctor->thumb)) ):
                unlink(public_path('storage/images/doctor/profile/'.$doctor->thumb));
            endif;

            $store = $file->storeAs('images/doctor/profile', $picture, 'public');
            if( $store ):
                $doctor->update([ 'thumb' => $picture ]);
                return redirect()->route('doctor::profile')->with('status', 'Upload realizado com sucesso!');
            endif;

        }
        
        return redirect()->route('doctor::profile')->with('error', 'Erro ao realizar o Upload da imagem');
    }   
}
