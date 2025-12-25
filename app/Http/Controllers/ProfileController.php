<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi nama dan email (email peserta bisa diubah, admin/staff tetap bisa)
        $rules = [
            'name' => 'required|string|max:255',
        ];

        if($user->role === 'peserta'){
            $rules['email'] = 'required|email|unique:users,email,'.$user->id;
            $rules['password'] = 'nullable|string|min:6|confirmed';
        }

        if($user->role === 'admin' || $user->role === 'staff'){
            $rules['email'] = 'required|email|unique:users,email,'.$user->id; // opsional, bisa dihapus kalau ingin email tetap
        }

        $request->validate($rules);

        $user->name = $request->name;

        if($user->role === 'peserta'){
            $user->email = $request->email;
            if($request->password){
                $user->password = bcrypt($request->password);
            }
        }

        // Upload foto profil
        if($request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $user->profile_picture = $filename;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile berhasil diperbarui!');
    }
}
