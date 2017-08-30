var app = require('express')()
var server = require('http').Server(app)
var io = require('socket.io')(server)

server.listen(9090)

io.on('connection', function (socket) {
    console.log('a client connect server...' + socket.id)
})
