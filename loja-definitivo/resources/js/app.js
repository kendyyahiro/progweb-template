require('./bootstrap');
require('jquery-ajax')
require('slick-carousel');

$('.slider').slick({
    infinite: false,
    slidesToShow: 5,
    slidesToScroll: 3,
    responsive: [
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});