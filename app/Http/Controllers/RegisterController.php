<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class RegisterController extends BaseController
{
public function viewSignup(){
    $request=request(); 

    
    if(session('username')!==null){
        return redirect('/home');
    }
return view('register')
->with('old_nome', $request['nome'])
->with('old_cognome', $request['cognome'])
->with('old_email', $request['email'])
->with('old_username', $request['username'])
->with('csrf_token', csrf_token());
}

public function createUser(){
    $request=request();  
        if($this->checkEmail($request['email'])===false){
          if($this->checkUser($request['username'])===true){
           return view('register')
            ->with('error', true)
            ->with('old_nome', $request['nome'])
            ->with('old_cognome', $request['cognome'])
            ->with('old_email', $request['email'])
            ->with('old_username', $request['username'])
            ->with('csrf_token', csrf_token());
    } else {
        $pass=password_hash($request['password'], PASSWORD_BCRYPT);
        $newUser =  User::create([
          'username' => $request['username'],
          'password' => $pass,
          'nome' => $request['nome'],
          'cognome' => $request['cognome'],
          'email' => $request['email'],
          'data' => $request['birthdate']
    ]);
if ($newUser) {
    Session::put('ID', $newUser->id);
    return redirect('home');
}
    } 
      } else{
        return view('register')
     ->with('old_nome', $request['nome'])
     ->with('old_cognome', $request['cognome'])
     ->with('errore_mail', true)
     ->with('old_email', $request['email'])
     ->with('old_username', $request['username'])
     ->with('csrf_token', csrf_token());
    }
}
private function checkUser($username){
$checkUser=User::where('username', $username)->first();
if(empty($checkUser)){
    return false;
} else {
    return true;
}
}

private function checkEmail($email){
    $checkUser=User::where('email', $email)->first();
    if(empty($checkUser)){
        return false;
    } else {
        return true;
    }

}



}

