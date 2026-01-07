<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if ($user->role === 'peserta') {
            $rules['email'] = 'required|email|unique:users,email,' . $user->id;
            $rules['password'] = 'nullable|min:6|confirmed';
        }

        if ($user->role === 'admin' || $user->role === 'staff') {
            $rules['email'] = 'nullable|email|unique:users,email,' . $user->id;
        }

        $request->validate($rules);

        $user->name = $request->name;

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {

            //pastikan folder uploads ada
            if (!File::exists(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0755, true);
            }

            //hapus foto lama (kalau ada)
            if ($user->profile_picture && File::exists(public_path('uploads/'.$user->profile_picture))) {
                File::delete(public_path('uploads/'.$user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $filename = uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $user->profile_picture = $filename;
        }

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile berhasil diperbarui!');
    }
}
