<div class="form-block form-block-{$page_id}">
    {assign var=page value=$page_id|fn_get_page_data}
    {if $page}	
        <div id="form_block_{$page_id}">
            <h2 class="title">{$page.page}</h2>
            <div class="description">
                {$page.short_description nofilter}
            </div>
            {include file="addons/form_builder/hooks/pages/page_content.override.tpl" page=$page}	
        </div>
        {literal}
            <script type="text/javascript">
                (function (_, $) {
                    $('.form-block-{/literal}{$page_id}{literal} form').addClass('cm-ajax');
                    $('.form-block-{/literal}{$page_id}{literal} form').prepend('<input type="hidden" name="fb_ajax" value="1"/>');
                    $('.form-block-{/literal}{$page_id}{literal} form').attr('name', 'forms_form_{/literal}{$page_id}{literal}');
                })(Tygh, Tygh.$);
                $.ceEvent('on', 'ce.formajaxpost_forms_form_{/literal}{$page_id}{literal}', function (data, params) {
                    var is_send = false;
                    if (data.notifications != undefined) {
                        $.each(data.notifications, function (key, obj) {
                            if (obj.type != undefined) {
                                if (obj.type == 'N') {
                                    $('.form-block-{/literal}{$page_id}{literal} form input[type=text]').val('');
                                    $('.form-block-{/literal}{$page_id}{literal} form input[type=email]').val('');
                                    $('.form-block-{/literal}{$page_id}{literal} form textarea').val('');
                                    $('.form-block-{/literal}{$page_id}{literal} form select').val('');
                                } else {

                                }
                                var reCaptchaID = GetReCaptchaID("gcaptcha" + {/literal}{$page_id}{literal});
                                grecaptcha.reset(reCaptchaID);
                                is_send = true;
                                return false;
                            }
                        });
                    }
                    if (!is_send) {
                        alert('Form error!');
                        location.reload();
                    }
                });
            </script>
        {/literal}
    {/if}
</div>
