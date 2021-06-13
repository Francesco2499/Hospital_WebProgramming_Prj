<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Evidenza;
use Illuminate\Support\Facades\Session;
class ServiziController extends BaseController
{

    public function checkLogin(){
        if(session('ID')!==null){
         return view('Servizi');
         } else {
         return redirect('login');
         }
     }

public function checkService(){
    $user=User::where('ID', session('ID'))->first();
    if(!empty($user)){
        return $user->evidenza;
    }
 }

public function add($titolo, $imm, $id){
$newEvid=Evidenza::create([
'box_id' => $id,
'user_id' => session('ID'),
'servizio' => $titolo,
'immagine' => $imm
]);
}

public function remove($titolo){
    $ID=session('ID');
    $evidence=Evidenza::where('user_id', $ID)->where('servizio', $titolo);
    $evidence->delete();
}
}