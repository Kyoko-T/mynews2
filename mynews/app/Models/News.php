<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    //以下Laravel14 Validationで追記
    protected $guarded = array('id');

    public static $rules =array(
        'title' => 'required',
        'body' => 'required',
    );
}
