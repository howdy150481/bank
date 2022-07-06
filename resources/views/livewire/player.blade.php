<div wire:poll>
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <div class="card mb-3">
                <div class="card-header h4 fw-bold" style="letter-spacing: 4px">
                    {{ $player->name }}
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h1
                            class="{{ $player->value < 0 ? 'text-danger' : 'text-dark' }}"
                        >
                            {{ number_format($player->value, 2, ',', '.') }}€
                        </h1>
                        @switch($player->getRanking())
                            @case(1)
                                <img src="{{ asset('images/first.png') }}" width="100" />
                                @break
                            @case(2)
                                <img src="{{ asset('images/second.png') }}" width="100" />
                                @break
                            @case(3)
                                <img src="{{ asset('images/third.png') }}" width="100" />
                        @endswitch
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="progress">
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: {{ $player->getPercentage() }}%;"
                            aria-valuenow="{{ $player->getPercentage() }}"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="card-header">Buchungen</div>
                <div class="card-body">
                    @if(count($bookings) > 0)
                        <div class="row">
                            <div class="col">
                                <strong>Eingang</strong>
                            </div>
                            <div class="col text-end">
                                <strong>Ausgang</strong>
                            </div>
                        </div>
                        @foreach($bookings as $booking)
                            <div class="row">
                                <div class="col {{ $booking->value < 0 ? 'text-danger text-end' : 'text-dark' }}">
                                    {{ number_format($booking->value, 2, ',', '.') }}€
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-secondary" role="alert">
                            Keine Buchungen vorhanden
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
