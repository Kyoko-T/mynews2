<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    // 以下Laravel14 Validationで追記
    protected $guarded = array('id');

    public static $rules =array(
        'title' => 'required',
        'body' => 'required',
    );

    // 以下Laravel17で追記
    // News Modelに関連付けを行う
    public function histories()
    {
        return $this->hasmany('App\Models\History');
    }
}
