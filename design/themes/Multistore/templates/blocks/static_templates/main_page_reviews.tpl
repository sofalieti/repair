{assign var=posts value=""|fn_blog_get_posts_by_show_on_main_page}
{if $posts|@count}
    <div class="main-page-reviews-list reviews-list owl-carousel">
        {foreach from=$posts item=post}
            <div class="item">
                <div class="row">
                    <div class="col-lg-7 col-md-5 col-sm-6 col-7">
                        <div class="image">
                            {include file="common/image.tpl" image_width="200" obj_id=$post.page_id images=$post.main_pair}
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-11 col-sm-10 col-9">
                        <div class="info">
                            <h4>{$post.page}</h4>
                            <div class="description">{$post.description|strip_tags}</div>
                            <a class="btn btn-primary" href="{"products.view?product_id=`$post.blog_product_id`"|fn_url}">View Product</a></p>
                        </div>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
    {style src="/js/lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"}
    {script src="/js/lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"}
    <script type="text/javascript">
        (function (_, $) {
            $.ceEvent('on', 'ce.commoninit', function (context) {
                var elm = context.find('.main-page-reviews-list');

                if (elm.length) {
                    elm.owlCarousel({
                        items: 2,
                        margin: 30,
                        nav: true,
                        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                        dots: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            992: {
                                items: 2
                            }
                        }
                    });
                }
            });
        }(Tygh, Tygh.$));
    </script>
{/if}