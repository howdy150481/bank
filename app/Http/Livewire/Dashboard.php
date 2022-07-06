<?php

namespace App\Http\Livewire;

use App\Models\Players;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $players = Players::orderBy('value', 'DESC')->get();

        return view(
            'livewire.dashboard',
            [
                'players' => $players
            ]
        );
    }
}
