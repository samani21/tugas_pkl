<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        return view('operator/dashboard/dashboard',$data);
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return view('operator');
    }
    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return "verifikasi email berhasil dikirim";
    }
}
