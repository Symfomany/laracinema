var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

//suscribe on messages-channel
redis.subscribe('messages-channel', function(err, count) {
});

//suscribe on messages-channel
redis.subscribe('tasks-channel', function(err, count) {
});

redis.subscribe('notifications-channel', function(err, count) {
});


redis.on('message', function(channel, message) {
    message = JSON.parse(message);
    //emit on channel messages-chanel withn name event and datas
    io.emit(channel + ':' + message.event, message.data);
});

//listen 3000 port
http.listen(3000, function(){
});