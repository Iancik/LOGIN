<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthDashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
} 