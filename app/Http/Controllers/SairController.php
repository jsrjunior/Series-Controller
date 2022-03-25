<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SairController extends Controller
{
    public function sair(Request $request){
        Auth::logout();
        return redirect('/entrar');
    }
}
