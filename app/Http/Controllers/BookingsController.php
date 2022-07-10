<?php

namespace App\Http\Controllers;

use App\Models\PlayerBookings;
use App\Models\Players;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function bookings()
    {
        $players = Players::orderBy('name')->get();

        return view(
            'bookings.bookings',
            [
                'players' => $players
            ]
        );
    }

    public function addBooking(Request $request)
    {
        $value = filter_var($request->value, FILTER_SANITIZE_NUMBER_INT);

        $player = Players::find((int)$request->player_id);
        $player->value += $value;
        $player->save();

        $booking = new PlayerBookings();
        $booking->player_id = $player->id;
        $booking->value = $value;
        $booking->save();

        return redirect('/bookings')
            ->with('icon', 'success')
            ->with('title', 'Buchung gespeichert');
    }

    public function newPlayer(Request $request)
    {
        $player = new Players();
        $player->name = $request->name;
        $player->value = 0;
        $player->save();

        return redirect(route($request->backlink, $request->playerId ?? ''))
            ->with('icon', 'success')
            ->with('title', 'Spieler angelegt');
    }

    public function removePlayer(Request $request)
    {
        $player = Players::find($request->id);
        $player->delete();

        $bookings = PlayerBookings::where('player_id', $request->id)->get();
        if (count($bookings) > 0) {
            foreach ($bookings as $booking) {
                $booking->delete();
            }
        }

        return redirect(route($request->backlink, $request->playerId ?? ''))
            ->with('icon', 'warning')
            ->with('title', 'Spieler gelöscht');
    }

    public function newGame(Request $request) {
        PlayerBookings::truncate();

        Players
            ::query()
            ->update(['value' => 0]);

        return redirect(route($request->backlink, $request->playerId ?? ''))
            ->with('icon', 'success')
            ->with('title', 'Neues Spiel gestartet');

    }
}
