var app = require('express')()
var http = require('http').Server(app)
var io = require('socket.io')(http)
var agent = require('superagent')
var config = require('./.env.js')


app.get('/', function(req, res){
   res.send('test')
})

io.on('connection', function(socket){
    agent
        .get(config.url + '/api/content')
        .end(function(err, res){

            agent
                .get(config.url + '/api/data')
                .end(function(err2, res2){
                    let data = JSON.parse(res2.text)
                    socket.emit('content', {content: res.text, data: data})
                })
        })


    socket.on('reset', function(){
        agent
            .get(config.url + '/api/reset')
            .end(function(){
                agent
                    .get(config.url + '/api/content')
                    .end(function(err, res){
                        io.emit('content', {content: res.text})
                    })
            })
    })


    socket.on('change', function(data){
        io.emit('change', data)

        agent
            .post(config.url + '/api/change')
            .send(data)
            .end()
    });


    socket.on('make', function(data){
        agent
            .post(config.url + '/api/make')
            .send(data)
            .end(function(){
                agent
                    .get(config.url + '/api/content')
                    .end(function(err, res){
                        io.emit('content', {content: res.text})
                    })
            })
    })



})












http.listen(config.port, function(){
   console.log('listening on port: ' + config.port)
})




