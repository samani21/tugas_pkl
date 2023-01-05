<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return view('admin/dashboard/dashboard');
    }
    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return "verifikasi email berhasil dikirim";
    }
}
