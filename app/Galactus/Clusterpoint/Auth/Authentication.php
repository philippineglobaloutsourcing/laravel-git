<?php 

namespace App\Galactus\Clusterpoint\Auth;

use App\Galactus\Clusterpoint\Clusterpoint;

use Hash;


trait Authentication
{

	public function authCheck()
	{
		if (count(session('user')) > 0) {
			return true;
		}

		return false;
	}

	public function authUser()
	{
		if (count(session('user')) > 0) {
			$user = json_decode(json_encode(session('user')));
			return $user;
		}

		return "Authentication Failed";
	}

	public function authLogin($request)
	{
		$data = [
			'type' => 'user',
			'email' => $request->email,
		];
		$list = ['password' => 'yes'];
		$user = Clusterpoint::search($data, null, null, $list);

		if (count($user) > 0) {

			foreach ($user as $key => $value) {
				$user = $value;

				if (Hash::check($request->password, $user->password)) {
					$user = json_decode(json_encode($user), true);

					$user['password'] = 'hidden';
					session(['user' => $user]);

					return $user;
				}

				break;
			}

		}

		return false;
	}

	public function authLogout($request)
	{
		$request->session()->flush();
	}

	public function FunctionName($value='')
	{
		# code...
	}

}