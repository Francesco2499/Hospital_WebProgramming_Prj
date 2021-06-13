<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Evidenza;
use App\Models\Vaccinazioni;
use App\Models\Vaccino;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function(){
    if(session('ID')!==null){
        return view('home');
     } else {
     return redirect('login');
     }
});
Route::get('/login','LoginController@checkLogin');
Route::post("/login", 'LoginController@login');

Route::get("/logout", 'LoginController@logout');

Route::get("/register", 'RegisterController@viewSignup');
Route::post("/register", 'RegisterController@createUser');

Route::get("/vaccini", 'VaccinoController@checkLogin');
Route::post("/vaccini", 'VaccinoController@createVaccino');
Route::get("/recupero/dati/vaccinazione", 'VaccinoController@getDati');
Route::get("/elimina/vaccino", 'VaccinoController@deleteVaccinazione');

Route::get("/ticket", 'TicketController@checkLogin');
Route::post("/ticket", 'TicketController@createTicket');
Route::get("/recupero/dati/ticket", 'TicketController@getDati');
Route::get("/elimina/prenotazione", 'TicketController@deleteTicket');


Route::get('/servizi', 'ServiziController@checkLogin');
Route::get('/servizi/check', 'ServiziController@checkService');
Route::get('/aggiungi/servizio/{titolo}/{imm}/{i}', 'ServiziController@add');
Route::get('/rimuovi/servizio/{titolo}', 'ServiziController@remove');

Route::get('search/data/{country}', function($country){
  $acc=env('ACCESS_KEY');
      $curl= curl_init();
  //  $country=$_GET['country'];
    curl_setopt($curl, CURLOPT_URL, "http://api.positionstack.com/v1/forward?access_key=".$acc."&query=".$country."&country_module=1");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result= curl_exec($curl);
    curl_close($curl);
    echo $result;
});

Route::get('ok', function(){
   return session('ID');
  });