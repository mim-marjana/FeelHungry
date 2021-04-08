
$('.review-slide').slick({
        infinite: true,
        slidesToShow:3,
        slidesToScroll:1,
        centerMode:true,
        autoplay:true,
        autoplaySpeed:4000,
        easing:'ease-out',
        adaptiveHeight: true,
        speed:1000,
        accessibility: true,
        useCSS:true,
        arrows:true,
        prevArrow: '#brand-prev',
        nextArrow: '#brand-next',
        pauseOnFocus:false,
        pauseOnHover:true,
        draggable: true,
        swipeToSlide:true,
        
        // the magic
          responsive: [{
              breakpoint: 1082,
              settings: {
                slidesToShow:3,
                infinite: true,
                speed:600,
                centerMode:true,
              }
            },{

              breakpoint: 992,
              settings: {
                slidesToShow:1,
                infinite: true,
                centerMode:true,
              }

            },{

              breakpoint: 431,
              settings: {
                centerMode: true,
                centerPadding:'0px',
                slidesToShow:1,
              }

            }]
      });