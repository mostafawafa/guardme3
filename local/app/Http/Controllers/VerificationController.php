<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function phone()
    {
        return view('verification.phone');
    }

}
