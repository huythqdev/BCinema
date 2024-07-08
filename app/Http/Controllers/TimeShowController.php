<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use App\Models\ShowTimeModel;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class TimeShowController extends Controller
{
    public  $now;

    public function __construct()
    {
        $this->now = Carbon::now('Asia/Ho_Chi_Minh');
    }

 // Request đại diện cho yêu cầu từ client gửi đến 
    public function get_show_time(Request $request)
    {
        // lấy ngày từ client yêu cầu và gán vào $time1
        $time1 = $request->time;
        // lấy ra những bộ phim có ngày chiếu cùng ngày người dùng yêu cầu
        $data = MovieModel::whereHas('show_time', function ($show) use ($time1) {
            $show->whereDate('date_time', '=', $time1);
            // with nạp trước các bảng show_time giúp cải thiện hiệu suất truy vấn
        })->with(['show_time' => function ($show) use ($time1) {
            $show->whereDate('date_time', $time1);
        }])->get();
        return response()->json($data);
    }
}
