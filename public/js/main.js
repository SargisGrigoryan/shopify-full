$(function(){
    // Owl carousel
    $(".owl-carousel").owlCarousel({
        'loop': true,
        responsive:{
            0:{
                items: 1,
            },
            576:{
                items: 2,
            },
            992:{
                items: 3
            },
            1300:{
                items: 4
            },
            1600:{
                items: 5
            },
        },
    });

    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl, {
        delay: { "show": 100, "hide": 100 }
      })
    })

    // Details image changing
    $('.details-secondary-image').on('click', function(){
        var imgSrc = $(this).attr('src');
        $('.details-general-image').attr('src', imgSrc);
    })

    // Notification disappearing
    if($('body').find('.alert')){
        setTimeout(function(){
            $('body').find('.alert').fadeOut('1000');
        }, '5000');
    }
});

function notify(type, message){
    var notify = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    $('.notifications').html(notify);
}