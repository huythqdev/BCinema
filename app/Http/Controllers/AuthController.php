<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
// hàm xử lý login
    public function login()
    {
        $credentials = request(['email', 'password']); // nhận email và passworl bên client
 // auth()->attempt($credentials kiểm tra thông tin nếu đúng thì tạo 1 token và gán cho biến $token
  // nếu email và password không đúng thì trả về thông báo lỗi dạng Json
        if (!$token = auth()->attempt($credentials)) { 
            return response()->json(['status' => false, 'error' => 'Unauthorized'], 401);
        }
  // nếu đúng thì trả về phản hồi thành công kèm token truy cập
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

   // hàm trả về phản hồi thành công
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
            ]
        ]);
    }
}
