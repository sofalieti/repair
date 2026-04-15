{style src="/js/lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"}
{script src="/js/lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"}
<script type="text/javascript">
(function(_, $) {
    $.ceEvent('on', 'ce.commoninit', function(context) {
        var elm = context.find('.owl-carousel-c-images');

        //$('.ty-float-left:contains(.ty-scroller-list),.ty-float-right:contains(.ty-scroller-list)').css('width', '100%');

        if (elm.length) {
            elm.owlCarousel({
                items: 6,
                margin: 20,
                nav: true,
                navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                dots: false,
                responsive : {
                    0 : {
                        items: 2
                    },
                    500 : {
                        items: 3
                    },
                    800 : {
                        items: 5
                    },
                    1000 : {
                        items: 6
                    }
                }
            });
        }
    });
}(Tygh, Tygh.$));
</script>
