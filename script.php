 <!-- Vendor JS-->
 <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- <script src="assets/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script src="assets/js/vendor/jquery.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery.slicknav.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/jquery.ticker.js"></script>
    <script src="assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="assets/js/vendor/jquery.sticky.js"></script>
    <script src="assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- NewsBoard JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script>
        $(function(){
            $('.mhn-slide').owlCarousel({
                nav:true,
                // loop:true,
                slideBy:'page',
                rewind:false,
                responsive:{
                    0:{items:1},
                    480:{items:2},
                    600:{items:3},
                    1000:{items:5}
                },
                smartSpeed:70,
                onInitialized:function(e){
                    $(e.target).find('img').each(function(){
                        if(this.complete){
                            $(this).closest('.mhn-inner').find('.loader-circle').hide();
                            $(this).closest('.mhn-inner').find('.mhn-img').css('background-image','url('+$(e.target).attr('src')+')');
                        }else{
                            $(this).bind('load',function(e){
                                $(e.target).closest('.mhn-inner').find('.loader-circle').hide();
                                $(e.target).closest('.mhn-inner').find('.mhn-img').css('background-image','url('+$(e.target).attr('src')+')');
                            });
                        }
                    });
                },
                navText:['<svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></svg>','<svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg>']
            });

            $('.loop').owlCarousel({
               items:6,
               margin:10,
               responsive:{
                  600:{
                        items:1
                  }
               }
            });
        });
    </script>