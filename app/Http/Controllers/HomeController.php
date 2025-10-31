<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the dashboard page.
     */
    public function index(Request $request)
    {
        // Return the standalone dashboard view
        return view('dashboard.index');
    }
}
