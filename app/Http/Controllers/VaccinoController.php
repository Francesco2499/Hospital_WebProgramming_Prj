<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Vaccino;
use App\Models\Vaccinazioni;
use Illuminate\Support\Facades\Session;
class VaccinoController extends BaseController
{
    
private function generateRandomString($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function createVaccino(){
if($this->checkVaccinazione(session('ID'))===false){
$request=request();
do{
    $cod=$this->generateRandomString();
}while($this->checkCodPrenotazione($cod)===false);
$ID_vax= $this->getIDVaccino(request('vaccino'));
               if($this->checkDosi(request('vaccino'))===false){
            return view('vaccini')
            ->with('errore', true)
            ->with('vaccino', request('vaccino'))
            ->with('csrf_token', csrf_token());
          }else{
               $newVax = Vaccinazioni::create([
               'codprenotazione' => $cod,
               'user_id' => session('ID'),
               'nome' => $request['nome'],
               'CodiceFiscale' => $request['CF'],
               'vaccino_id' => $ID_vax
           ]);
           if($newVax)
          return view('vaccini')->with('csrf_token', csrf_token());
               }
           }
       } 

       public function getDati(){
        $user=User::where('id', session('ID'))->first();
        if(!empty($user->vaccinazioni->vaccino)){
            return json_encode($user);
    }
        else{
            return json_encode(null);
        }}
     
        public function deleteVaccinazione(){
            $vac=Vaccinazioni::where('user_id', session('ID'));
            $vac->delete();
         }


    public function checkLogin(){
   if(session('ID')!==null){
    return view('Vaccini')->with('csrf_token', csrf_token());
    } else {
    return redirect('login');
    }
}

private function checkVaccinazione($id){
    $error=false;
    $checkUser=User::where('ID', $id)->first();
    if(empty($checkUser->vaccinazioni)){
        return $error;
    } else {
        return true;
    }
    }
    private function getIDVaccino($vaccino){
        $Vax=Vaccino::where('vaccino', $vaccino)->first();
        return $Vax->ID;
        }
     
        private function checkDosi($vaccino){
            $Vax=Vaccino::where('vaccino', $vaccino)->first();
            if($Vax->dosi===0)
            return false;
            }   

    private function checkCodPrenotazione($codice){
        $checkCod=Vaccinazioni::where('codprenotazione', $codice)->first();
        if(empty($checkCod)){
            return true;
        } else {
            return false;
        }
 }

}
