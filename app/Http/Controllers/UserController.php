<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registration_form() {
        return view('registration');
    }
    public function store_user(Request $request) {
        $validated_data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]
        );
        $validated_data['password'] = Hash::make($request->password);
        $validated_data['role'] = 'customer'; // Set default role
        User::create($validated_data);
        return redirect()->back()->with('message', 'Account Created');
    }

    public function login() {
        return view('login');
    }

     public function login_user(Request $request) {
         $validated_data = $request->validate(
            [
                "email" => "required",
                "password" => "required",
                "role" => "required"
            ]
         );
         $user = User::where('email', $validated_data['email'])
                     ->where('role', $validated_data['role'])
                     ->first();
         if ($user && Hash::check($validated_data['password'], $user->password)) {
             Auth::login($user);
             return redirect()->route('homepage');
         } else {
             return redirect()->back()->with('message', 'Invalid LOGIN');
         }
     
    }

    public function admin_registration_form() {
        return view('admin_registration_form');
    }
    public function store_admin(Request $request) {
        $validated_data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'admin'
            ]
        );
        $validated_data['password'] = Hash::make($request->password);
        User::create($validated_data);
        return redirect()->back()->with('message', 'Admin Account Created');
    }
    public function logout() {
    \Auth::logout();
    return redirect()->route('login')->with('message', 'Logged out successfully');
    }
}
