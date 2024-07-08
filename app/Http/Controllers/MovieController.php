<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public  $now;
 // khởi tạo thời gian hiện tại bằng thư viện Carbon
    public function __construct()
    {
        $this->now = Carbon::now();
    }
    // lấy những bộ phim đang chiếu
    public function get_movie_show()
    {
        // whereDate lọc các  date_start là trường trong sql và trước thời gian hiện tại 
        $movies = MovieModel::whereDate('date_start', '<', $this->now)
            ->whereDate('date_end', '>', $this->now)
            ->withAvg('avg_star as avg_rate', 'star_rate',)
            ->get();
        return Response()->json($movies);
    }
   // lấy những bộ phim sắp chiếu
    public function get_movie_soon()
    {
        // những bộ phim sắp chiếu có thời gian phải trước thời gian hiện tại 
        $data = MovieModel::whereDate('date_start', '>', $this->now)->get();
        return Response()->json($data);
    }
}
