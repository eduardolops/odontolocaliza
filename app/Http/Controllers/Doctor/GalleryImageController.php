<?php

namespace Doctor\Http\Controllers\Doctor;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\UploadGalleryImageRequest;

use Doctor\Models\User;
use Doctor\Models\Image;

use Auth;

class GalleryImageController extends Controller
{
   	protected $doctor;
   	protected $image;

   	function __construct(User $user, Image $image)
   	{
   		$this->middleware('whichPlanSubscription');
   		$this->doctor = $user;
   		$this->image  = $image;
   	}

   	public function index()
    {
        $page_title = 'Galeria de Imagens';
        $guard      = 'web';
        $user_id    = Auth::guard($guard)->user()->id;
        $images = $this->doctor->findOrFail($user_id)->gallery;
        return view('doctor.gallery.index', compact('page_title','guard','images'));
    }

    public function store($user_id, UploadGalleryImageRequest $request)
	{
		if ( $request->hasFile('upload') ) {
			$file = $request->file('upload');
			$destinationPath  = 'images/doctor/gallery'; 
			$user = $this->doctor->findOrFail($user_id);
			foreach($file as $files){
				$imgs = $this->doctor->findOrFail($user_id)->gallery;

				if( $imgs->count() >= 5 ):
					return redirect()->route('doctor::gallery')->with('error', 'Seu plano permite cadastrar somente 5 imagens na galeria');
				endif;

				$filename = $files->getClientOriginalName();
				$extension = $files->getClientOriginalExtension();
				$picture = sha1($filename . time()) . '.' . $extension;
				$store   = $files->storeAs($destinationPath, $picture, 'public');

				if( $store ):
	                $user->gallery()->create([ 'user_id' => $user_id, 'filePath' => $picture ]);
	            endif;
			}
		}

		return redirect()->route('doctor::gallery');
	}

	public function delete($user_id, $img_id)
	{
		$image = $this->doctor->findOrFail($user_id)->gallery()->findOrFail($img_id);
		
		if( $image ){
			if( !empty($image->filePath) && file_exists(public_path('storage/images/doctor/gallery/'.$image->filePath)) ):
				unlink(public_path('storage/images/doctor/gallery/'.$image->filePath));
				$image->delete();
			endif;
		}

		return redirect()->route('doctor::gallery')->with('status', 'Imagem deletada com sucesso');
	}
}
