<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect()->route('panel.index');
        }

        return view('panel.login');
    }

    public function login(Request $request)
    {
        $user = User::where([
            'email' => $request->email,
            'status' => 'a'
        ])->first();

        if(!$user || !Hash::check($request->password , $user ->password)){
            return redirect()->route('login-page')->with('notfound', 'User not found.');
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login-page');
    }

    public function register()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('panel.register');
    }

    public function registerSave(Request $request)
    {
        $data_ = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "|user|",
            'status' => "a"
        ];

        User::create($data_);

        return view('panel.login');
    }


}
