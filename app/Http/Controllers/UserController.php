<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function storeComments(CommentStoreRequest $request)
    {
        $user = User::find($request->id);

        if ($this->storeCommentBy($user, $request->comments))
            return response()->json('User Comment store successfully');
        return response()
            ->status(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function storeCommentBy(User $user, string $comment): bool
    {
        $user->comments .= "\n {$comment}";
        return $user->save();
    }
}
