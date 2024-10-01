
      $(document).ready(function(){
          $("#story_slider").owlCarousel({
              loop: true,
              margin: 15,
              nav: false,
              autoplay: true,
              smartSpeed: 500,
              dots: true,
              responsive: {
                  0: {
                      items: 1
                  },
                  600: {
                      items: 2
                  },
                  1000: {
                      items: 3
                  }
              }
          });
      });
 
    $(document).ready(function(){
        $("#story_slider2").owlCarousel({
            loop: true,
            margin: 15,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
