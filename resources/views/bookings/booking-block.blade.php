<div class="col">
    <div class="card mb-3">
        <div class="card-header h4 fw-bold" style="letter-spacing: 4px">
            <a class="text-decoration-none text-dark" href="https://bank.howdynet.de/player/{{ $player->id }}">{{ $player->name }}</a>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <form action="/bookings/add-booking" method="post">
                        @csrf
                        <input class="form-control" type="hidden" name="player_id" value="{{ $player->id }}" />

                        <div class="input-group mb-3">
                            <input class="form-control booking-field" type="number" name="value" novalidate />
                            <button type="submit" class="btn btn-success">
                                <span class="material-icons">done</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col text-end">
                    <h1 class="{{ $player->value < 0 ? 'text-danger' : 'text-dark' }}">{{ number_format($player->value, 2, ',', '.') }}€</h1>
                </div>
            </div>
        </div>
    </div>
</div>
