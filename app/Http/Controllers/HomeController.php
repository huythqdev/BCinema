<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;


class HomeController extends Controller
{
    public function register_account(Request $request)
    {
        try {
            $request->validate([

                'username' => 'required|unique:users,username',
                'address' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'phone' => 'required|unique:users,phone|min:9'
            ]);

            $user = User::create([
                'old' => $request->old,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return Response()->json(['status' => true,]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return Response()->json(['status' => false,]);
        }
    }
}
