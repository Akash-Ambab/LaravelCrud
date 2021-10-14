<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthRepository {
    
    protected $admin;

    public function __construct(Admin $admin) {
        $this->admin = $admin;
    }

    public function validateData($data) {
        $validated = $data->validate([
            "name" => 'required|max:50',
            "email" => 'required|unique:admins',
            "username" => 'required|unique:admins|max:50',
            "password" => 'required',
        ]);

        return $validated;
    }

    public function Register($data) {
        $validated = $this->validateData($data);
        $this->admin->name = $validated['name'];
        $this->admin->email = $validated['email'];
        $this->admin->username = $validated['username'];
        $this->admin->password = Hash::make($validated['password']);

        $this->admin->save();
        $data->session()->put('username', $this->admin->username);
        $data->session()->put('uid', Auth::id());
        
    }

    public function Login($data) {
        $this->admin->email = $data['email'];
        $this->admin->password = $data['password'];

        $check = $this->admin->where(['email' => $this->admin->email]);

        if ($check -> exists()) {
            $Passwordcheck = Hash::check($this->admin->password, $check->first()->password);
            if ($Passwordcheck) {
                $data->session()->put('username', $check->first()->username);
                $data->session()->put('uid', $check->first()->id);
            }
            else {
                return 'Password Is Incorrect';
            }
        }
        else {
            return "{$this->admin->email} Not Exist";
        }
    }

    public function Logout($request) {
        $request->session()->flush();
    }
}