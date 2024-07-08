<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatModel extends Model
{
    use HasFactory;
    protected $table = "seat";
    public $timestamps = false;

    protected $fillable = [
        "id_ticket",
        "number_seat"
    ];
}
