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
});