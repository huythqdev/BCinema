<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
//  định dạng dữ liệu trả về từ API
class TicketResourse extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'ticket' => [
                'id' => $this->id,
                'id_show_time' => $this->id_show_time,
                'total_price' => $this->total_price,
                'date_time' => $this->date_time,
                'seat' => $this->seat,
            ],
            'movie' => [
                'id' => $this->show_time->movie->id,
                'cost' => $this->show_time->movie->cost,
                'trailer' => $this->show_time->movie->trailer,
                'date_start' => $this->show_time->movie->date_start,
                'date_end' => $this->show_time->movie->date_end,
                'time' => $this->show_time->movie->time,
                'name' => $this->show_time->movie->name,
                'censoship' => $this->show_time->movie->censoship,
                'poster' => $this->show_time->movie->poster,
                'mount_watch' => $this->show_time->movie->mount_watch,
                'movie_type' => $this->show_time->movie->movie_type,
                'language' => $this->show_time->movie->language,
                'show_date' => $this->show_time->date_time, // Add show date from show_time
                'show_time_start' => $this->show_time->time_start, // Add show start time
            ],
            'show_time' => [
                'id' => $this->show_time->id,
                'rap' => $this->show_time->rap,
                'date_time' => $this->show_time->date_time,
                'time_start' => $this->show_time->time_start,
                'time_end' => $this->show_time->time_end,
            ],

        ];
    }
}
