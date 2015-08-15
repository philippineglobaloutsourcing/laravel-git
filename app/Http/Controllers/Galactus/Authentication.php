<?php

namespace App\Http\Controllers\Galactus;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Clusterpoint;
use Response;

class Authentication extends Controller
{
    
	public function getLogin()
	{
		$nav = 'login';

		return view('auth.login', compact('nav'));
	}

	public function postLogin()
	{
		$result = Clusterpoint::authLogin($request);

		if ($result == false) {
			return Response::json(['login'=>'failed']);
		}

		return redirect('/');
	}

	public function getLogout()
	{
		Clusterpoint::authLogout($request);

		return redirect('/');
	}

}
