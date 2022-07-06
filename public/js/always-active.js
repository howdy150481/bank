$(document).ready(function() {
    $.fn.bootstrapBtn = $.fn.button.noConflict()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    let toastContainer = $('#toast-container');
    if (toastContainer.data('title') !== '') {
        toast.fire({
            icon: toastContainer.data('icon'),
            title: toastContainer.data('title')
        })
    }

    $(document).on("click","#new-player",function() {
        let backlink = $(this).data('backlink');
        let playerId = $(this).data('player-id');

        Swal.fire({
            input: 'text',
            icon: 'question',
            title: 'Neuer Spieler',
            showCancelButton: true,
            cancelButtonText: 'Abbrechen',
            confirmButtonText: 'Speichern',
        }).then((result) => {
            if (result.isConfirmed) {
                let data = {
                    name: result.value,
                    backlink: backlink,
                    playerId: playerId
                };

                let queryString = $.param(data);
                window.location.href = '/bookings/new-player/?' + queryString
            }
        });
    });

    $(document).on("click",".remove-player",function() {
        let id = $(this).data('id');
        let backlink = $(this).data('backlink');
        let playerId = $(this).data('player-id');

        Swal.fire({
            title: 'Spieler löschen?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: 'Ja',
            denyButtonText: `Nein`,
        }).then((result) => {
            if (result.isConfirmed) {
                let data = {
                    id: id,
                    backlink: backlink,
                    playerId: playerId
                };

                let queryString = $.param(data);
                window.location.href = '/bookings/remove-player/?' + queryString;
            }
        });
    });

    $(document).on("click",".new-game",function() {
        let backlink = $(this).data('backlink');
        let playerId = $(this).data('player-id');

        Swal.fire({
            title: 'Neuer Spiel?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: 'Ja',
            denyButtonText: `Nein`,
        }).then((result) => {
            if (result.isConfirmed) {
                let data = {
                    backlink: backlink,
                    playerId: playerId
                };

                let queryString = $.param(data);
                window.location.href = '/bookings/new-game/?' + queryString;
            }
        });
    });
});
