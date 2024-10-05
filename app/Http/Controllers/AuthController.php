<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('tenant.auth.login');
    }

    public function loginStore(Request $request)
    {
        $credientials = $request->only('email', 'password');
        $credientials['tenant_id'] = tenant('id');

        if (Auth::attempt($credientials)) {
            return redirect()->route('tenant.dashboard');
            
        }
        return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function register()
    {
        return view('tenant.auth.register');
    }

    public function RegisterStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email ',
                'max:255 ',
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->where('tenant_id', tenant('id'))
                        ->where('email', $request->email);
                })
            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            return redirect()->route('tenant.login');
        } else {
            return redirect()->back()->withErrors(['msg' => 'User creation failed.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('tenant.login');
        
    }
}
