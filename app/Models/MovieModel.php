<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{

    use HasFactory;
    // định nghĩa bảng movie trong database
    protected $table = "movie";
    public $timestamps = false;

    public function avg_star()
    {
        return $this->hasMany(RateModel::class, 'id_movie', 'id');
    }
    // lấy thòi gian chiếu của 1 bộ phim (id_movie và id của thời gian trong sql)
    public function show_time()
    {
        return $this->hasMany(ShowTimeModel::class, 'id_movie', 'id');
    }
    public function a_show_time()
    {
        return $this->hasOne(ShowTimeModel::class, 'id_movie', 'id');
    }
    
}
