<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;
    protected $table = "ticket";
    public $timestamps = false;

    public function seat()
    {
        return $this->hasMany(SeatModel::class, 'id_ticket', 'id');
    }
    public function show_time()
    {
        return $this->belongsTo(ShowTimeModel::class, 'id_show_time', 'id');
    }
    protected $fillable = [
        "id_show_time",
        "id_user",
        "total_price",
        "date_time"
    ];
}
