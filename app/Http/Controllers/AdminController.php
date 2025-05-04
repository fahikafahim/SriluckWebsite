<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->user_type === 'admin') {
            return view('admin.dashboard');
        }
        abort(403, 'Unauthorized access');
    }

    public function products()
    {
        return view('admin.products.index');
    }
    public function users()
    {
        $users = User::where('user_type', 'user')->get();
        return view('admin.users', compact('users'));
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully.');

    }



}
