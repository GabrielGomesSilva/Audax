<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelsolicitacao extends Model
{
    //use HasFactory;
    protected $table = 'solicitacao';
    protected $fillable = [
        'name',
        'id_user',
    ];

    public function relUsers(){
        return $this->hasMany('App\Models\User','id','id_user');


    }

}
