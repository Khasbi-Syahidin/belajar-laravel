<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show(Request $request){
        $name = $request->query('name');
        return view('hello', ['name_1' => $name]);
    }
}