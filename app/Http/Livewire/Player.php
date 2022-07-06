<?php

namespace App\Http\Livewire;

use App\Models\PlayerBookings;
use App\Models\Players;
use Livewire\Component;

class Player extends Component
{
    public int $playerId = 0;

    public function render()
    {
        $player = Players::find($this->playerId);

        if ($player instanceof Players) {
            $bookings = PlayerBookings
                ::where('player_id', $this->playerId)
                ->get();

            return view(
                'livewire.player',
                [
                    'player' => $player,
                    'bookings' => $bookings
                ]
            );
        } else {
            return view('livewire.player-error');
        }
    }
}
