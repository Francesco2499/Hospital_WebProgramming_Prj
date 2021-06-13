<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class LoginController extends BaseController
{

    public function checkLogin(){
    if(session('ID')!==null){
       return redirect('/home');
    } else {
    return view('login')->with('csrf_token', csrf_token());
    }
}

public function login(){

    $user=User::where('username', request('username'))->first();
     if(empty(request('username')) || empty(request('password'))){
    return  view('login')->with('errore_cred', true)->with('csrf_token', csrf_token());
    } else  if(isset($user) && (password_verify(request('password'), $user->password))){
    Session::put('ID', $user->ID);
    return redirect('/home');
    } else {
       return  view('login')->with('errore', true)->with('csrf_token', csrf_token());
    }
}

public function logout() {
    Session::flush();
    return redirect('login');
}
}



