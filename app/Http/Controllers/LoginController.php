<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLoginRequest;
use  App\Http\Controllers\AdminController;
use App\Models\System;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

class LoginController extends Controller 
{
    public function index()
    {

        

        if (Auth::user()) {
            if (Auth::user()->rol == 'ADMIN') {
                return redirect()->action([AdminController::class, 'index']);
            }
            if (Auth::user()->rol == 'CLIENT') {
                return view('client.layouts.dashboard');
            } else {
                return view('admin.auth.login');
            }
        } else {
            return view('admin.auth.login');
        }
    }

    public function validate_data(ValidateLoginRequest $request)
    {


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();
        $remember_token = empty($request->remember_token) ? false : true;
        if ($user && Hash::check($request->password, $user->password) && $user->status == 'ACTIVE' && $user->is_deleted == false) {
            Auth::loginUsingId($user->id, $remember_token);
            return redirect()->action([LoginController::class, 'index']);
        }
        return redirect()->action([LoginController::class, 'index'])->with('invalid', 'Login inválido');
    }

}
