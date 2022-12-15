<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);
        if($request->password)
        {
            Auth::user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return redirect()->route('profile.show')->with(
                [
                    'message' => [
                        'type' => 'success',
                        'text' => 'تم التحديث  بنجاح.',
                    ]
                ]
            );
        }
        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('profile.show')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم التحديث  بنجاح.',
                ]
            ]
        );

    }

    public function listUsers()
    {
        $users = User::all();
        return view('listUsers',compact('users'));
    }

}
