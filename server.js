var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var agent = require('superagent');
var url = require('./server.env');



app.get('/', function(req, res){
   res.send('test');
});


io.on('connection', function(socket){
    agent
        .get(url + '/api/content')
        .end(function(err, res){
            socket.emit('content', {content: res.text});
        });



    socket.on('reset', function(){
        agent
            .get(url + '/api/reset')
            .end(function(){
                agent
                    .get(url + '/api/content')
                    .end(function(err, res){
                        io.emit('content', {content: res.text});
                    });
            })
    });


    socket.on('make', function(data){
        agent
            .post(url + '/api/make')
            .send(data)
            .end(function(){
                agent
                    .get(url + '/api/content')
                    .end(function(err, res){
                        io.emit('content', {content: res.text});
                    });
            });
    });



});












http.listen(8080, function(){
   console.log('listening on *:8080');
});




