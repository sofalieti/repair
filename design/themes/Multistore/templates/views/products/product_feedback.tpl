<div class="contact_us_for_a_price">
    <form action="{""|fn_url}" method="post" class="product_feedback" name="product_feedback">
        <input type="hidden" name="product_feedback[product_id]" value="{$smarty.get.product_id}" />
        <input type="hidden" name="product_feedback[form_name]" value="{$smarty.get.form_name}" />
        <div class="form-group">
            <label class="cm-required cm-name hidden" for="product_feedback_name">Name</label>
            <input type="text" name="product_feedback[name]" id="product_feedback_name" value="" placeholder="Name" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="cm-required cm-email hidden" for="product_feedback_email">E-mail</label>
            <input type="text" name="product_feedback[email]" id="product_feedback_email" value="" placeholder="E-mail" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="cm-required hidden" for="product_feedback_phone">Phone</label>
            <input type="text" name="product_feedback[phone]" id="product_feedback_phone" value="" placeholder="Phone" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="hidden" for="product_feedback_question">Your question</label>
            <textarea name="product_feedback[question]" id="product_feedback_question" class="form-control" placeholder="Your question"></textarea>
        </div>
        <div class="form-group text-right">
            {*include file="common/image_verification.tpl" option="use_for_form_builder"*}	
            {include but_meta="btn-primary" file="buttons/button.tpl" but_role="submit" but_text='Send' but_name="dispatch[products.product_feedback]"}
        </div>
    </form>    
</div>
{*literal}
    <script type="text/javascript">
        $.ceEvent('on', 'ce.formajaxpost_product_feedback', function (data, params) {
            var is_send = false;
            if (data.notifications != undefined) {
                $.each(data.notifications, function (key, obj) {
                    if (obj.type != undefined) {
                        if (obj.type == 'N') {
                            $('.product_feedback input[type=text]').val('');
                            $('.product_feedback input[type=email]').val('');
                            $('.product_feedback textarea').val('');
                            $('.product_feedback select').val('');
                        }
                        //$('.product_feedback .ty-captcha__img').attr('src', $('.product_feedback .ty-captcha__img').attr('src') + '|1');
                        is_send = true;
                        return false;
                    }
                });
                setTimeout(function () {
                    $('.cm-notification-content').remove();
                }, 5000);
            }
            if (!is_send) {
                alert('Form error!');
            }
        });
    </script>
{/literal*}		
