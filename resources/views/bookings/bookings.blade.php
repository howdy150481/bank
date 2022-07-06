@extends('layouts.web')

@section('content')
    @if(count($players) > 0)
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($players as $player)
                @include('bookings.booking-block', ['player' => $player])
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary" role="alert">
            Keine Spieler gefunden
        </div>
    @endif
@endsection
