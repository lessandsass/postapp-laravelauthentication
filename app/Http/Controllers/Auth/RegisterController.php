<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{

    public function index() :View
    {
        return view('auth.register');
    }

    public function store(Request $request) :RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|max:50|min:4',
            'username' => 'required|max:25|min:4|unique:users,username',
            'email' => 'required|max:50|min:4|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect('dashboard')->with('status', 'You have registered Successfully');
    }

}
