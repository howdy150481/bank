@extends('layouts.web')

@section('content')
    @livewire('player', ['playerId' => $playerId])
@endsection
