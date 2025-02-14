<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function add()
    {
        return view(' admin.news.create');
    }

    //Laravel 13 ニュース投稿画面を作成しようで追記
    public function create(Request $request)
    {
        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
}
