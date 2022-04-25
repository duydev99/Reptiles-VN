$('.btn_key').click(function () {
    var key = $(this).html()//Chữ cái

    if(key == '...'){
        $('.card_animal').removeClass('d-none')
        return false
    }

    $('.card_animal').addClass('d-none')
    $('.name_animal').each(function (i) {
        var name_animal = $('.name_animal').eq(i).html().charAt(0).toUpperCase()
        if(key == name_animal){
            $('.card_animal').eq(i).removeClass('d-none')
        }
    })
})

