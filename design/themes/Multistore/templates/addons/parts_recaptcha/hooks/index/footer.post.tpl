<script>
    var recaptcha;
    var myCallBack = function () {
        $('.g-recaptcha').each(function (i, elm) {
            recaptcha = grecaptcha.render($(elm).attr('id'), {
                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
            });
        });
        (function (_, $) {
            $.ceEvent('on', 'ce.dialogshow', function (context) {
                setTimeout(function () {
                    context.find('.g-recaptcha').each(function () {
                        if ($.trim($(this).html()) == '') {
                            recaptcha = grecaptcha.render($(this).attr('id'), {
                                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
                            });
                        }
                    });
                }, 0);
            });
            $.ceEvent('on', 'ce.commoninit', function (context) {
                setTimeout(function () {
                    context.find('.g-recaptcha').each(function () {
                        if ($.trim($(this).html()) == '') {
                            recaptcha = grecaptcha.render($(this).attr('id'), {
                                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
                            });
                        }
                    });
                }, 0);
            });
            
        })(Tygh, Tygh.$);
    };
    
</script>
<script src="//www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit&hl={$smarty.const.CART_LANGUAGE}" async defer></script>
