<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        return view('admin/dashboard/dashboard',$data);
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return view('dashboard');
    }
    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return "verifikasi email berhasil dikirim";
    }
   
}
