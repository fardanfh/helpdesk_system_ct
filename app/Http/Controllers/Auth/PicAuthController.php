<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pic;

class PicAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pic_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $pic = Pic::where('username', $credentials['username'])->first();

        if ($pic && Hash::check($credentials['password'], $pic->password)) {
            $request->session()->put('pic_id', $pic->id_pic);
            $request->session()->put('pic_username', $pic->nama ?? $pic->username);

            return redirect()->intended(route('laporans.index'));
        }

        return back()->withErrors(['username' => 'Invalid PIC credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['pic_id', 'pic_username']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pic.login');
    }
}
