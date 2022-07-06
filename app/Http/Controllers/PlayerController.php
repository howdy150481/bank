<?php

namespace App\Http\Controllers;

class PlayerController extends Controller
{
    public function show(int $playerId)
    {
        return view(
            'player.player',
            [
                'playerId' => $playerId
            ]
        );
    }
}
