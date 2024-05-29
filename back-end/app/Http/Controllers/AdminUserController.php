<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

// controller untuk mengelola data user
class AdminUserController extends Controller
{
    public function index()
    {
        //ngambil data user yang role nya visitor
        $users = User::where('role', 'visitor')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // return view create user
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        //validasi inputan
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'foto' => 'nullable|image',
        ]);
        //simpan foto ke storage
        $path = $request->file('foto') ? $request->file('foto')->store('profile_pictures', 'public') : null;
        // simpan data user ke database
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'visitor',
            'foto' => $path,
        ]);

        //redirect ke halaman index user
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        // return view edit user
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // validasi inputan
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'foto' => 'nullable|image',
        ]);

        $path = $user->foto;
        if ($request->hasFile('foto')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('foto')->store('profile_pictures', 'public');
        }

        $user->update([
            'username' => $request->username,
            'foto' => $path,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        //hapus foto dari storage
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        //hapus data user dari database
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
