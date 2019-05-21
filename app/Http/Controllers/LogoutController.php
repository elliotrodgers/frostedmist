<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function get()
    {
        Session::flush();
        return redirect(config('links.gallery'));
    }
}
