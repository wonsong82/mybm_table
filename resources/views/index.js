require('./index.scss')



$(() => {
    let socket = io(appurl + ':8080')


    $('#reset').click(() => {
        socket.emit('reset')
        return false
    })



    socket.on('content', res => {

        // general show content
        let content = $('#content')
        content.stop(true).css({opacity: 0}).html(res.content)

        let cols = $('.col')
        cols.stop(true).css({opacity: 0})
        content.css({opacity: 1})

        cols.each((i, e) => {
            $(e).animate({opacity:1}, i*500 + 500)
        })



        // list page
        $('.leader, .member').each((i,e)=>{
            $(e).parent().click((evt)=>{
                if(!$(evt.target).is('input')){
                    if($(e).is(':checked')){
                        $(e).prop('checked', false)
                    } else {
                        $(e).prop('checked', true)
                    }
                    return false
                }
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

            if(leaders.length && members.length) {
                socket.emit('make', {leaders, members})
            }
            return false
        })

    })





    // UI




});


