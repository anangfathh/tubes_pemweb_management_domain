<?php

namespace App\Http\Controllers\User;

// use App\Models\user;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('pages.administrator.user.index', compact('users'));
    }

    // Show the form to create a new user
    public function create()
    {
        return view('pages.administrator.user.create');
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'phone_number' => 'required|unique:users',
        ]);

        User::create($request->all());
        return redirect()->route('administrator.user.index')->with('success', 'user created successfully');
    }

    // Show the form to edit a user
    public function edit(User $user)
    {
        return view('pages.administrator.user.edit', compact('user'));
    }

    // Update a user in the database
    public function update(Request $request, user $user)
    {
        $request->validate([
            'email' => 'required|unique:users,email,' . $user->id,
            'phone_number' => 'required|unique:users,phone_number,' . $user->id,
        ]);

        $user->update($request->all());
        return redirect()->route('administrator.user.index')->with('success', 'user updated successfully');
    }

    // Delete a user from the database
    public function destroy(user $user)
    {
        try {
            if (Auth::user()->id === $user->id) {
                $user->delete();
                Auth::logout();
                // Redirect ke halaman utama
                return redirect()->route('home')->with('success', 'Akun dihapus dan Anda telah logout.');
            }

            $user->delete();
            return redirect()->route('administrator.user.index')->with('success', ['name' => $user->name . " Delete Succesfully"]);
        } catch (\Exception $e) {
            return redirect()->route('administrator.user.index')->with('error', 'Failed to change role. Error: ' . $e->getMessage());
        }
    }

    public function changeRole($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->is_admin = $user->is_admin === 0 ? 1 : 0;
            $user->save();

            return redirect()->route('administrator.user.index')->with('success', ['name' => $user->name . " Role Changed Succesfully"]);
        } catch (\Exception $e) {
            return redirect()->route('administrator.user.index')->with('error', 'Failed to change role. Error: ' . $e->getMessage());
        }
    }
}
