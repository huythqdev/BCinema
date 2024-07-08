<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResourse;
use App\Models\MovieModel;
use App\Models\SeatModel;
use App\Models\ShowTimeModel;
use App\Models\TicketModel;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public  $now;

    public function __construct()
    {
        $this->now = Carbon::now('Asia/Ho_Chi_Minh');
    }
    public function get_ticket()
    {
        $user = auth()->user();
        if ($user == null) {
            return response()->json(false);
        } else {
            // lấy thông tin về vé của người dùng
            $tickets = User::find($user->id)->load(['ticket.seat', 'ticket' => function ($ticket) {
            // $tickets = User::find($user->id)->load(['ticket.seat', 'ticket' => function ($ticket) {

                $ticket->with('show_time.movie')->orderByDesc('date_time');
            }]);
            $data = TicketResourse::collection($tickets->ticket);
            return response()->json($data);
        }
    }
    public function get_a_ticket($id_ticket)
    {
        $ticket = TicketModel::find($id_ticket)->load('seat');
        $movie = MovieModel::with([
            'show_time' => function ($show) use ($ticket) {
                $show->where('id', $ticket->id_show_time);
            }
        ])->whereHas('show_time', function ($show) use ($ticket) {
            $show->where('id', $ticket->id_show_time);
        })->first();
        return response()->json(['movie' => $movie, 'ticket' => $ticket]);
    }
   // xử lý nút mua vé
    public function buy_ticket(Request $request)
    {
        // lấy ra thông tin của người dùng đang đăng nhập. 
        $user = auth()->user();
        try {
            $ticket = TicketModel::create([ // tạo ra TicketModel và truyền dữ liệu vào bằng dữ liệu bên client 
                "id_show_time" => $request->show_time,
                "id_user" => $user->id,
                "total_price" => $request->total_price,
                "date_time" => $this->now
            ]);
            // lặp qua tất cả các ghế đã chọn và tạo ra SeatModel chứa các ghế đã chọn
            foreach ($request->seats as $seat) {
                SeatModel::create(["id_ticket" => $ticket->id, "number_seat" => $seat]);
            }
            return response()->json(['status' => true, 'data' => $ticket->id]); //  trả về ID của vé mới được tạo nếu thành công
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => 'Có lỗi xảy ra trong quá trình mua vé. Vui lòng thử lại.'], 500);
        }
    }

    public function get_seat_booked($id_show_time)
    {
        // truy vấn để tìm suất chiếu với ID tương ứng ($id_show_time).
        $showTime = ShowTimeModel::find($id_show_time)->load('ticket.seat');
        $seat = $showTime->ticket->pluck('seat')->flatten();;
        return response()->json($seat);
    }
}
