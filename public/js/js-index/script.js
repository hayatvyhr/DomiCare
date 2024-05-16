(function($) {

    "use strict";

        // $(document).ready(function() {   

        //     $(window).on('scroll',function(){
        //         if($(window).scrollTop()){
        //             $('nav').addClass('nav-bg');
        //         }
        //         else{
        //             $('nav').removeClass('nav-bg');
        //         }
        //     })

        // }); 

        document.addEventListener("DOMContentLoaded", function(){
        
            window.addEventListener('scroll', function() {
                
              if (window.scrollY > 50) {
                document.getElementById('header-nav').classList.add('fixed-top');
              } else {
                document.getElementById('header-nav').classList.remove('fixed-top');
                // remove padding top from body
                document.body.style.paddingTop = '0';
              }      

            });

            $(window).on('scroll',function(){
                if($(window).scrollTop()){
                    $('nav').addClass('nav-bg');
                }
                else{
                    $('nav').removeClass('nav-bg');
                }
            })


          }); 
          // DOMContentLoaded  end

    AOS.init({
        duration: 1200,
    })

    })(jQuery);