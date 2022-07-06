<div wire:poll>
    @if(count($players) > 0)
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($players as $player)
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header h4 fw-bold" style="letter-spacing: 4px">
                            <a class="text-decoration-none text-dark" href="https://bank.howdynet.de/player/{{ $player->id }}">{{ $player->name }}</a>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3" style="height: 70px;">
                                <div class="col">
                                    <span class="h1 {{ $player->value < 0 ? 'text-danger' : 'text-dark' }}">
                                        {{ number_format($player->value, 2, ',', '.') }}€
                                    </span>
                                </div>
                                <div class="col text-end">
                                    @switch($player->getRanking())
                                        @case(1)
                                            <img src="{{ asset('images/first.png') }}" height="60" />
                                            @break
                                        @case(2)
                                            <img src="{{ asset('images/second.png') }}" height="60" />
                                            @break
                                        @case(3)
                                            <img src="{{ asset('images/third.png') }}" height="60" />
                                    @endswitch
                                </div>
                            </div>

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
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary" role="alert">
            Keine Spieler gefunden
        </div>
    @endif
</div>
