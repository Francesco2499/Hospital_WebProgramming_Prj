<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Evidenza extends Model
{

   protected $table='evidenza';
    
    public $timestamps=false;
  
  
    protected $fillable = [
        'ID',
        'user_id',
        'box_id',
       'servizio',
        'immagine',
    ];

public function User(){
    return $this->belongsTo(User::class);

}
 
}