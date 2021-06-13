<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class User extends Model
{

   protected $table='user';
    
    public $timestamps=false;
  
    protected $fillable = [
        'ID',
        'username',
        'data',
       'cognome',
        'nome',
        'email',
        'password',
    ];

public function Vaccinazioni(){
    return $this->hasOne(Vaccinazioni::class, 'user_id', 'ID');

}

public function Evidenza(){
    return $this->hasMany(Evidenza::class, 'user_id', 'ID');

}

public function Ticket(){
    return $this->hasOne(Ticket::class, 'user_id', 'ID');

}
 
}
