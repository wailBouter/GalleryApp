<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function doLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (!Auth::attempt($credentials)) {
            Session::flash('flash_error', 'Something went wrong wit your credentials');
            return redirect()->back();
        }
        
        Session::flash('flash_massage', 'You have logged in succefully');
        return redirect('gallery/list');
    }
}
