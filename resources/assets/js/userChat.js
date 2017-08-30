var io = require('socket.io-client')
var socket = io("http://localhost:9090")

$('#send').on('click', function () {
    axios.get('/api/get-userId')
        .then(response => {
            console.log(response.data)
        })
    console.log('as')
})
