<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('creator.auth.register');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ],
        );

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password =  Hash::make($request['password']);
        $users->level = "creator";
        $users->save();
        Auth::login($users);
        return redirect('/panel/dashboard')->with('pesan', 'Berhasil membuat akun creator');
    }
}
