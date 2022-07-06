<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $sql = "SELECT SUM(value) AS totalMoney FROM players";
        $result = DB::selectOne($sql);

        return view(
            'livewire.footer',
            [
                'totalMoney' => $result->totalMoney
            ]
        );
    }
}
