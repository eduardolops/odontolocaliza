<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\AdminProfileRequest;
use Doctor\Models\Admin;
use Auth;

class ProfileController extends Controller
{
    protected $admin; 

    function __construct(Admin $admin)
    {
    	$this->admin = $admin;
    }

    public function index()
    {
        $guard = 'admin';
        $auth  = auth()->guard($guard)->user();
    	$page_title = 'Perfil : '. title_case($auth->name);
    	return view('admin.profile.index', compact('page_title', 'guard', 'auth'));
    }

    public function update(AdminProfileRequest $request)
    {
    	$admin = $this->admin->findOrFail(auth()->guard('admin')->user()->id);

        if( !$admin ):
            return redirect()->route('admin::profile')
                             ->with('error', 'Usuário não encontrado, tente novamente mais tarde.');
        endif;

        try{
            $admin->update($request->except(['password']));

            if( $request->has('password') ):
                $admin->update($request->only(['password']));
            endif;

            return redirect()->route('admin::profile')
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
