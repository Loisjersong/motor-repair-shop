<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('customer.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'regex:/^(09\d{9}|63\d{10})$/'],
            'date_of_birth' => ['required', 'date', 'before:today', 'after:1900-01-01'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->except(['password', 'password_confirmation']);
        $data['role_id'] = 2;

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('customer.profile.edit')->with('success', 'Profile updated successfully');
    }

}
