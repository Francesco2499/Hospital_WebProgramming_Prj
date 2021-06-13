<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Vaccinazioni extends Model
{
    protected $table='vaccinazioni';
    
    public $timestamps=false;
   
   protected $fillable = [
        'ID',
       'user_id',
       'codprenotazione',
        'user_id',
        'CodiceFiscale',
        'vaccino_id',
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
    return $this->belongsTo('App\Models\User');

}
public function Vaccino(){
    return $this->hasOne('App\Models\Vaccino', 'ID', 'vaccino_id');

}
}