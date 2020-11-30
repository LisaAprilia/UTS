<?php 

namespace App\Http\Controllers;
use App\Models\User;
use Auth;

class AuthController extends controller
{

	function showLogin (){
		return view ('login');

	}

	function logout (){
		Auth::logout();
		return redirect('beranda');

	}

	function register (){
		return view ('register');

	}
	
	function forgotPassword (){

	}

	function loginProcess (){
		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])){
			return redirect('beranda')->with('success', 'Login Berhasil');
		}else{
			return back()->with('danger', 'Login Gagal, Silahkan cek email dan password Anda');
		}

	}
	
}