<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function get()
    {
        return view('login');
    }

    public function post(Request $request)
    {
        $request->validate([
            'pin' => ['required', Rule::in(env('PIN'))]
        ]);

        Session::put('logged_in', true);
        Session::save();

        return redirect(config('links.gallery'));
    }
}
