<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Vaccino extends Model
{

   protected $table='vaccino';
    
    public $timestamps=false;
  
   
    protected $fillable = [
        'ID',
        'vaccino',
       'dosi',
       
    ];

public function Vaccinazioni(){
    return $this->belongsToMany(Vaccinazioni::class, 'vaccino_id', 'ID');

}

}