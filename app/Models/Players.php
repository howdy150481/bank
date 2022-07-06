<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $fillable = [
        'name',
        'value'
    ];

    public function getPercentage(): int
    {
        $maxPlayer = Players::orderBy('value', 'DESC')->first();

        $percent = 0;
        if ($this->value > 0) {
            $percent = ($this->value * 100) / $maxPlayer->value;

        }
        return number_format($percent);
    }

    public function getRanking(): int
    {
        $players = Players::orderBy('value', 'DESC')->get();

        $ranking = 0;
        if (count($players) > 0) {
            foreach ($players as $key => $player) {
                if ($player->id == $this->id  && $player->value != 0) {
                    $ranking = $key + 1;
                }
            }
        }

        return $ranking;
    }
}
