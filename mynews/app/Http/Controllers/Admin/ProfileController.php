<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view(' 
        admin.profile.create');
    }

    // Laravel13課題3で追記
    public function create(Request $request)
    {
        // admin/profile/createにリダイレクトする。
        return redirect(' admin/profile/create');
    }

    public function edit()
    {
        return view(' admin.profile.edit');
    }

    public function update()
    {
        return redirect(' admin/profile/edit');
    }
}
