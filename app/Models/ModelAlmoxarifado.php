<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAlmoxarifado extends Model
{
    //use HasFactory;
    protected $table ="materiais";
    protected $fillable = [
        'name',
        'id_user',
    ];


    public function relUsers(){
        return $this->hasOne('App\Models\User','id','id_user');


    }



}
