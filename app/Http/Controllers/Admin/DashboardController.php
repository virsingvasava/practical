<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     // Check if user is authenticated and is an admin
    //     $this->middleware(function ($request, $next) {
    //         if (auth()->user() && !auth()->user()->is_admin) {
    //             return redirect('/');  // Redirect to home if not admin
    //         }
    //         return $next($request);
    //     });
    // }
    
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }
}
