<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthRepository;


class AuthController extends Controller
{
    protected $admin;
    
    public function __construct(AuthRepository $admin) {
        $this->admin = $admin;
    }

    public function RegisterAdmin(Request $request) {
        $msg = $this->admin->Register($request);
        if(isset($msg)) {
            return redirect('register')->withErrors($msg);
        }
        else {
            return redirect('student');
        }
    }

    public function LoginAdmin(Request $request) {
        $msg = $this->admin->Login($request);
        if(isset($msg)) {
            return redirect('login')->withErrors($msg);
        }
        else {
            return redirect('student');
        }
    }

    public function LogoutAdmin(Request $request) {
        $this->admin->Logout($request);
        return redirect('register');
    }
}
