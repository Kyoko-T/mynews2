<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    //Laravel14課題5で追記
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );

        //以下Laravel17課題で追記
        //ProfileHistory Modelに関連付けを行う
        public function profilehistories()
    {
        return $this->hasMany('App\Models\ProfileHistory');
    }

}
