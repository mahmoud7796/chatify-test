<?php

namespace App\Http\Controllers\Admin;

use App\ChMessage;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
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

    public function findConversation()
    {
        $users = User::all();
        return view('findConversation',compact('users'));
    }

    public function showConversation(Request $request)
    {
        $conversations = ChMessage::where(function ($query) use ($request) {
            $query->where('from_id', '=', $request->from_id)
                ->where('to_id', '=', $request->to_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_id', '=', $request->to_id)
                ->where('to_id', '=', $request->from_id);
        })->orderBy('created_at','ASC')->get();
        $from= $request->from_id;
        return view('showConversation',compact('conversations','from'));
    }

}
