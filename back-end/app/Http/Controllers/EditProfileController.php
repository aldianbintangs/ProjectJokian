<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// controller untuk edit profile
class EditProfileController extends Controller
{
    public function showEditProfileForm()
    {
        //ngambil data user yang login
        $user = Auth::user();
        // return view edit profile
        return view('auth.edit-profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        // validasi inputan
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username,' . $user->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // simpan foto ke storage
        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            //simpan foto ke storage
            $fotoPath = $request->file('foto')->store('profile_pictures', 'public');
            $user->foto = $fotoPath;
        }
        // simpan data user ke database
        $user->username = $request->username;
        $user->save();
        //redirect ke halaman edit profile dengan peringatan
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
