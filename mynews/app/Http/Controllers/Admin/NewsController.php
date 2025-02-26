<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の１行を追加することでNews Modelが扱えるようになる
use App\Models\News;

class NewsController extends Controller
{
    public function add()
    {
        return view(' admin.news.create');
    }

    // Laravel 13 ニュース投稿画面を作成しようで追記
    public function create(Request $request)
    {
        // Laravel14 NewsController の操作で追記
        // validationを行う
        $this->validate($request, News::$rules);

        $news = new News;
        $form = $request->all();

        //  フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])){
            $path = $request->file('image')->store('public/image');
            $news ->image_path = basename($path);
        } else {
            $news-> image_path = null;
        }

        //  フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']); 
        
        // データベースに保存する
        $news->fill($form);
        $news->save();

        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
}
