<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit()
    {
        return view('users.profile');
    }

    public function update(User $user, Request $request)
    {
        $image = $request->avatar;
        $imageName = $image->getClientOriginalName();
        $image->move( base_path( '../images/uploads/avatars/' . $user->id ), $imageName );
        $path = url( '/images/uploads/avatars/' . $user->id . '/' . $imageName );

        $user->avatar = $path;

        $user->save();

        return redirect( url( '/profile' ) );
    }
}
