<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'profile' => 'nullable',
            'image' => 'nullable|file|image',
        ]);

        $user = Auth::user();

        if ($request->file('image') === null) {
            $image = '';
        } else {
            $path = $request->file('image')->store('public/prof-img');
            $image = basename($path);
        }

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'profile' => $request->profile,
            'profile_img' => $image,
        ]);
        return redirect('home');
    }
}
