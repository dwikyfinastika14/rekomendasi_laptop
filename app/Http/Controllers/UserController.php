<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'User Management',
            // 'users' => User::paginate(5),
            // 'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Tambah User',
            // 'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        try {
            $user = User::create($validatedData);

            if ($request->has('roles')) {
                $user->assignRole($request->roles);
            }

            return redirect('/dashboard/data-user-management')->with('success', 'Data User Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-user-management')->with('error', 'Gagal Menambah User. Silakan coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User',
            'user' => $user,
            // 'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|max:255',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        try {
            $user->update($validatedData);

            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            }

            return redirect('/dashboard/data-user-management')->with('success', 'Data User Berhasil Diperbarui');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-user-management')->with('error', 'Gagal Memperbarui User. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect('/dashboard/data-user-management')->with('success', 'Data User Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-user-management')->with('error', 'Gagal Menghapus User. Silakan coba lagi.');
        }
    }
}
