<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($userID = null, Request $request)
    {
        $user = (object) [
            'id' => 1,
            'name' => 'test user',
            'comments' => 'test comments \n another comments'
        ];
        return view('welcome', compact('user'));
    }
}
