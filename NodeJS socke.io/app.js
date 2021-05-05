const express = require('express');
const cors = require('cors')
const app = express()
app.use(cors())
app.options('*', cors());
app.use(express.static(__dirname + '/public'));
const http = require('http').Server(app);
const io = require('socket.io')(http, {
  cors: {
    origin: '*',
	methods: ["GET", "POST"]
  }
});

app.get('/', function(req, res) {
    res.render('index.ejs');
});

io.sockets.on('connection', function(socket) {
	
    socket.on('username', function(username) {
        socket.username = username;
        io.emit('is_online',socket.username+ ' joined the chat');
    });

    socket.on('disconnect', function(username) {
		io.emit('is_online',socket.username + ' left the chat');
		socket.disconnect(true);
    })

    socket.on('chat_message', function(message) {
        socket.broadcast.emit('chat_message', {sender:socket.username,text:message});
    });

});

const server = http.listen(8080, function() {
    console.log('listening on *:8080');
});