import Echo from 'laravel-echo'

var socket = io("http://mt.dev:9090")

let echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':9090'
})

$('#send').on('click', function () {
    let message = $('#input').val()
    socket.emit('demo', { data: message })
    $('#input').val('')

    if (message != '') {
        $.ajax({
            url: 'chat',
            type: 'POST',
            dataType: 'json',
            data: {message: message}
        })
    }
})



echo.private('chat-room')
    .listen('ChatEvent', (e) => {
        console.log(e)
        $('#content').append(`<div class="well">${e.message}</div>`)
})
