<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class VerificationController extends Controller
{
    /**
     * Show the verification notice page.
     */
    public function notice()
    {
        if (Auth::user()->verified) {
            return redirect()->route('dashboard');
        }

        return Inertia::render('Auth/VerificationNotice');
    }
}
