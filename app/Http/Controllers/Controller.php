<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// cung cấp các chức năng cơ bản về xác thực quyền truy cập và xác thực dữ liệu
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
