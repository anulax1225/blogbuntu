<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        if (!$user) return response('', 404);
        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function myProfile()
    {
        return redirect('/profile/' . request()->user()->id);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) return response('', 404);
        if (request()->user()->id != $user->id) return response('', 401);
        $user->delete();
        return response('', 200);
    }

    public function update($id)
    {
        request()->validate([
            'username' => 'required',
        ]);
        $user = User::find($id);
        if (!$user) return response('', 404);
        if (request()->user()->id != $user->id) return response('', 401);
        $user->username = request('username');
        $user->name = request('name');
        $user->description = request('description');
        $user->save();
        return response('', 200);
    }

    public function follow($id)
    {
        $user = User::find($id);
        if (!$user) return response('', 404);
        if (request()->user()->id == $user->id) return response('', 400);
        try {
            $user->followed()->attach(request()->user()->id);
        } catch(QueryException $e) {
            return response($e, 400);
        }
        return response('', 200);
    }
}

