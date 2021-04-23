<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($userID = null, Request $request)
    {
        if (is_null($userID) && empty($request->id)) {
            session()->flash('warning', 'You must set user id as query or params');
            return view('welcome');
        }

        session()->forget('warning'); // clear warning session is exist

        $userID = $userID ?? $request->id;

        $user = User::findOrFail($userID);

        return view('welcome', compact('user'));
    }

}
