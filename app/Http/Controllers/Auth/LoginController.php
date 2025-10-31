<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Pic;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Try admin login first
        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            // Successful admin login: store admin id in session
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_username', $admin->username);

            return redirect()->intended(route('dashboard'));
        }

        // If not admin, try PIC login using the same form
        $pic = Pic::where('username', $credentials['username'])->first();
        if ($pic && Hash::check($credentials['password'], $pic->password)) {
            // Successful PIC login: store pic id in session
            $request->session()->put('pic_id', $pic->id_pic);
            $request->session()->put('pic_username', $pic->nama ?? $pic->username);

            // Redirect PICs to their laporan index
            return redirect()->intended(route('laporans.index'));
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_username', 'pic_id', 'pic_username']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
