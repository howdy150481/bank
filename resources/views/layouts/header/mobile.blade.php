<div class="row">
    <div class="col">
        <img src="{{ asset('images/logo.png') }}" width="50px" />
    </div>
    <div class="col text-end">
        <div class="dropdown">
            <span id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons" style="font-size: 40px;">menu</span>
            </span>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                    <a class="dropdown-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }} " href="/">Spielübersicht</a>
                </li>
                <li>
                    <a class="dropdown-item {{ Route::currentRouteName() == 'bookings' ? 'active' : '' }}" href="/bookings">Buchungen</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                @if(count($players) > 0)
                    @foreach($players as $player)
                        <li>
                            <div class="row">
                                <div class="col">
                                    <a
                                        class="dropdown-item {{ Route::currentRouteName() == 'player' && $player->id == $playerId ? 'active' : '' }}"
                                        href="/player/{{ $player->id }}"
                                    >
                                        {{ $player->name }}
                                    </a>
                                </div>
                                <div class="col text-end">
                                    <span class="badge bg-light rounded-pill">
                                        <span
                                            class="remove-player text-danger cursor-pointer"
                                            title="Spieler löschen"
                                            data-id="{{ $player->id }}"
                                            data-backlink="{{ Route::currentRouteName() }}"
                                            data-player-id="{{ $playerId ?? 0 }}"
                                        >
                                            <span class="material-icons">person_remove</span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li><a class="dropdown-item disabled" href="#">Keine Spieler gefunden</a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a
                        class="dropdown-item new-game"
                        href="#"
                        data-backlink="{{ Route::currentRouteName() }}"
                        data-player-id="{{ $playerId ?? 0 }}"
                    >
                        Neues Spiel
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
