<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記することで、Profile Modelが扱えるようになる
use App\Models\Profile;
// Laravel17 課題　以下の２行を追記することで、ProfileHistory model, Carbonクラスが扱えるようになる
use App\Models\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    // Laravel13課題3で追記
    public function create(Request $request)
    {
        // 以下Laravel14課題7で追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();

        // admin/profile/createにリダイレクトする。
        return redirect('admin/profile/create');
    }
    
    // 以下laravel16課題１で追記
    public function edit(Request $request)
    {
        
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profile  Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        //以下Laravel17課題で追記
        $profilehistory = new ProfileHistory();
        $profilehistory->profile_id = $profile->id;
        $profilehistory->edited_at = Carbon::now();
        $profilehistory->save();

        return redirect('admin/profile/edit?id=1');
    }
}
