<div class="row">
    <div class="col-9">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <img src="{{ asset('images/logo.png') }}" width="50px" style="margin-right: 25px;"/>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }} " href="/">Spielübersicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'bookings' ? 'active' : '' }}" href="/bookings">Buchungen</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Route::currentRouteName() == 'player' ? 'active' : '' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Spieler</a>
                <ul class="dropdown-menu">
                    @if(count($players) > 0)
                        @foreach($players as $player)
                            <li>
                                <div class="row">
                                    <div class="col">
                                        <a class="dropdown-item" href="/player/{{ $player->id }}">{{ $player->name }}</a>
                                    </div>
                                    <div class="col text-end">
                                        <span
                                            class="remove-player text-danger cursor-pointer"
                                            title="Spieler löschen"
                                            data-id="{{ $player->id }}"
                                            data-backlink="{{ Route::currentRouteName() }}"
                                            data-player-id="{{ $playerId ?? 0 }}"
                                        >
                                            <span class="material-icons" style="padding-right: 10px;">person_remove</span>
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
                        <span
                            class="dropdown-item"
                            id="new-player"
                            data-backlink="{{ Route::currentRouteName() }}"
                            data-player-id="{{ $playerId ?? 0 }}"
                        >
                            Neuer Spieler
                        </span>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="col text-end">
        <span
            class="btn btn-danger new-game"
            data-backlink="{{ Route::currentRouteName() }}"
            data-player-id="{{ $playerId ?? 0 }}"
        >
            Neues Spiel
        </span>
    </div>
</div>

