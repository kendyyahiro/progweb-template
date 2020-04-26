require('./bootstrap');
require('slick-carousel');

$('.slider').slick({
    infinite: true,
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