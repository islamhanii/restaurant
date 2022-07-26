<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $userModel;

    public function __construct(User $user) {
        $this->userModel = $user;
    }

    /*******************************************************************************************/
/*
    public function index() {
        
    }

    ///******************************************************************************************

    public function registerPage() {
        return view('admins.register');
    }

    public function addAdmin(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:250',
            'email' => 'required|email:filter|max:250',
            'password' => 'required|string|min:8|max:32'
        ]);

        $this->userModel->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        session()->flash('success', 'Admin was added successfully');
        return redirect()->home();
    }
*/
    /*******************************************************************************************/

    public function loginPage() {
        return view('admins.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect(route('overview'));
        }

        session()->flash('error', 'Invalid email or password');
        return redirect(route('login'));
    }
    
    /*******************************************************************************************/

    public function logout() {
        session()->flush();
        auth()->logout();
        return redirect(route('login'));
    }
}
