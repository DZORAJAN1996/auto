$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#logOut').click(function (e){
        e.preventDefault();
        $('form#logOutForm').submit()
    })
    $('.nav-item a').each(function (){
        if($(this).attr('href')==window.location.href){
            $(this).addClass('active')
        }
    })
})

