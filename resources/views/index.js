require('./index.scss')
let config = require('../../.env.js')


$(() => {
    let socket = io(config.url + ':' + config.port)


    $('#reset').click(() => {
        socket.emit('reset')
        return false
    })



    socket.on('change', data => {

        // change leaders
        $('.leader').prop('checked', false)
        $.each(data.leaders, (i, e) => {
            $('.leader[value="'+e+'"]').prop('checked', true)
        })

        // change members
        $('.member').prop('checked', false)
        $.each(data.members, (i, e) => {
            $('.member[value="'+e+'"]').prop('checked', true)
        })

        // change total
        $('#leaders_count').text(data.leaders.length)
        $('#members_count').text(data.members.length)

    })




    socket.on('content', res => {

        // general show content
        let content = $('#content')


        // initial animation
        content.stop(true).css({opacity: 0}).html(res.content)

        let cols = $('.col')
        cols.stop(true).css({opacity: 0})
        content.css({opacity: 1})

        cols.each((i, e) => {
            $(e).animate({opacity:1}, i*500 + 500)
        })


        // list page specific
        if(res.hasOwnProperty('data')){
            let leaders = res.data.leaders,
                members = res.data.members

            $('#leaders_count').text(leaders.length)
            $('#members_count').text(members.length)

            // leaders
            $.each(leaders, (i, e) => {
                $('.leader[value="'+e+'"]').prop('checked', true)
            })

            // members
            $.each(members, (i, e) => {
                $('.member[value="'+e+'"]').prop('checked', true)
            })
        }


        // list page
        $('.leader, .member').each((i,e)=>{
            $(e).parent().click((evt)=>{
                if(!$(evt.target).is('input')){
                    if($(e).is(':checked')){
                        $(e).prop('checked', false)
                    } else {
                        $(e).prop('checked', true)
                    }
                }

                let leaders = []
                $('.leader:checked').each((i, e) => {
                    leaders.push(parseInt($(e).val()))
                })

                let members = []
                $('.member:checked').each((i, e) => {
                    members.push(parseInt($(e).val()))
                })

                socket.emit('change', {leaders, members})
            })
        })

        $('#make').click(() => {

            let leaders = []
            $('.leader:checked').each((i, e) => {
                leaders.push(parseInt($(e).val()))
            })

            let members = []
            $('.member:checked').each((i, e) => {
                members.push(parseInt($(e).val()))
            })

            let total = $('#total').text();

            if(leaders.length && members.length) {
                socket.emit('make', {leaders, members})
            }
            return false
        })

    })





    // UI




});


