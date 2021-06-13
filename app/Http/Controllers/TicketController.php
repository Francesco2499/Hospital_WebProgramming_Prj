<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Session;
class TicketController extends BaseController
{

    public function checkLogin(){
        if(session('ID')!==null){
         return view('Ticket')->with('csrf_token', csrf_token());
         } else {
         return redirect('login');
         }
     }
public function createTicket(){
$request=request();
$ora=$request->orario;
$data=$request->data;
if($this->checkOraDataTicket($ora, $data)===false){
 if($this->checkUserTicket(session('ID'))===false ){
    do{
        $cod=$this->generateRandomString();
    }while($this->checkCodPrenotazione($cod)===false);
      
    $newVax = Ticket::create([
        'codTicket' => $cod,
        'user_id' => session('ID'),
        'Cellulare' => $request['cellulare'],
        'Data' => $request['data'],
        'orario' => $request['orario']
    ]);
  
}
return view('ticket')->with('csrf_token', csrf_token());;
} else {
    return view('ticket')
    ->with('csrf_token', csrf_token())
    ->with('error', true)
    ->with('newData', $request['data'])
    ->with('orario', $request['orario']);
}
 } 

private function generateRandomString($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

private function checkOraDataTicket($ora, $data){
    
    $checkUser=Ticket::where('data', $data)->where('orario', $ora)->first();
    if(empty($checkUser)){
        return false;
    } else {
        return true;
    }
}
private function checkUserTicket($id){
    $error=false;
    $checkUser=User::where('ID', $id)->first();
    if(empty($checkUser->ticket)){
        return $error;
    } else {
        return true;
    }
}

private function checkCodPrenotazione($codice){
    $checkCod=Ticket::where('codTicket', $codice)->first();
    if(empty($checkCod)){
        return true;
    } else {
        return false;
    }
}

public function getDati(){
$ID=session('ID');
$user=User::where('ID',$ID)->first();

if(!empty($user->ticket)){
    return $user;
}else{
    return json_encode(null);
}


}

public function deleteTicket(){
    $ID=session('ID');
    $ticket=Ticket::where('user_id',$ID);
    $ticket->delete();
    }
}
