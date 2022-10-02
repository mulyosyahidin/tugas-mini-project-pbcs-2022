<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = [
            'faculty' => \App\Models\Faculty::count(),
            'study_program' => \App\Models\Study_program::count(),
            'student' => \App\Models\Student::count(),
        ];

        return view('dashboard', compact('total'));
    }
}
