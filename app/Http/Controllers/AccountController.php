<?php

namespace App\Http\Controllers;


use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // đối tượng Request chứa dữ liệu từ client.
    public function register_account(Request $request)
    {
        try {
            $request->validate([

                'username' => 'required|unique:users,username', // : Bắt buộc, phải là duy nhất trong bảng users.
                'address' => 'required',                        // : Bắt buộc
                'email' => 'required|email|unique:users,email', // : Bắt buộc, phải là định dạng email, phải là duy nhất trong bảng users.
                'password' => 'required|min:6',                 // : Bắt buộc, tối thiểu 6 ký tự.
                'phone' => 'required|unique:users,phone|min:9'  // : Bắt buộc, phải là duy nhất trong bảng users, tối thiểu 9 ký tự.
            ]);
            //  create Tạo một người dùng mới với các trường đã xác thực.
            $user = User::create([  
                'old' => $request->old,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Mã hóa mật khẩu trước khi lưu vào csdl
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
