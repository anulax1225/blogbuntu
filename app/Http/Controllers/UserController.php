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
        $user->image = UserController::getRequestImage();
        $user->save();
        return response('', 200);
    }

    private static function getRequestImage()
    {
        if(request()->hasFile('image'))
        {
            $hash = request()->file('image')->hashName();
            request()->file('image')->store('public/images/profile');
            return $hash;
        }
        else return "";
    }

    public function follow($id)
    {
        $user = User::find($id);
        if (!$user) return redirect("/");
        if (request()->user()->id == $user->id) return redirect("/profile/" . $id);
        try {
            $user->followed()->attach(request()->user()->id);
        } catch(QueryException $e) {
            return redirect("/profile/" . $id);
        }
        return redirect("/profile/" . $id);
    }
}

