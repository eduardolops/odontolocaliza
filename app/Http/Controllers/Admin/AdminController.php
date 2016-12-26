<?php

namespace Doctor\Http\Controllers\Admin;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }
   	
	public function login()
	{
		return view('admin.auth.login');
	}

	public function store(Request $request)
	{
		$fields = [
			'email'    => 'required|min:3|max:100',
			'password' => 'required|min:3|max:100'
		];

		$validator = validator($request->all(), $fields);

		if( $validator->fails() )
		{
			return redirect('/admin/login')->withErrors($validator)->withInput();
		}

		if( !auth()->guard('admin')->attempt($request->only(['email','password'])) )
		{
			return redirect('/admin/login')
							->withErrors(['errors' => 'Credenciais Inválida'])
							->withInput();
		}

		return redirect('/admin');

	}

	public function logout()
	{
		auth()->guard('admin')->logout();
		return redirect('/admin/login');
	}

}
