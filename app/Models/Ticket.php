<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    protected $table='ticket';
    
    public $timestamps=false;
  
  
   protected $fillable = [
        'ID',
       'user_id',
       'codTicket',
        'Cellulare',
        'Data',
        'orario',
   ];
/*
public function Vaccinazioni(){
    return $this->hasOne('Vaccinazioni');

}*/
/*
public function Evidenza(){
    return $this->hasMany('App\Models\Evidenza');

}*/

public function user(){
    return $this->belongsTo(User::class);

}
}