<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'editor') {
                return redirect()->intended('editor');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->email_verified_at == null) {
                    return redirect()->intended('verifikasi');
                } else{
                    if ($user->level == 'admin') {
                        return redirect()->intended('admin');
                    } elseif ($user->level == 'editor') {
                        return redirect()->intended('editor');
                    }
                }
                return redirect()->intended('/');
            }

        return redirect('login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function register()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' =>$request->level,
        ]);
        $user->save();

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('verifikasi')->with('success', 'Registration success. Silahkan verifikasi email anda');
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
    
    public function verifikasi(){
        return view('verifikasi');
    }
}
