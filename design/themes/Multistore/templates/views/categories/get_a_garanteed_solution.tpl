<div class="get-a-garanteed-solution-form">         
    <form action="{""|fn_url}" method="post" name="get-a-garanteed-solution-form">
        <input type="hidden" name="category_id" value="{$smarty.get.category_id}"/>
        <input type="hidden" name="brand_id" value="{$smarty.get.b_id}"/>
        <input type="hidden" name="timezone"  value="" id="gs_timezone" />
        <input type="hidden" name="fb_source_page_title" value="" id="gs_fb_source_page_title" />

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="gs_name">Name</label>
            <input type="text" name="name" id="gs_name" value="" placeholder="Name" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="gs_email">E-mail</label>
            <input type="text" name="email" id="gs_email" value="" placeholder="E-mail" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="gs_phone">Phone</label>
            <input type="text" name="phone" id="gs_phone" value="" placeholder="Phone" class="form-control"/>
        </div>	
        <div class="form-elements-group ty-form-builder__buttons buttons-container text-right">
            <div class="row">
                <div class="col-md-10">
                    {include file="common/image_verification.tpl" option="get-a-garanteed-solution-form"}
                </div>
                <div class="col-md-6">
                    {include file="buttons/button.tpl" but_meta="btn-primary" but_role="submit" but_text='Send' but_name="dispatch[brands.get_a_garanteed_solution]"}
                </div>
            </div>
        </div>
    </form>      
</div>
{literal}
    <script type="text/javascript">
        $(document).ready(function () {
            $('form[name=get-a-garanteed-solution-form]').on('submit', function (event) {
                $('#gs_fb_source_page_title').val((typeof document !== 'undefined' && document.title) ? document.title : '');
                setTimeout(function(){
                    var reCaptchaID = GetReCaptchaID("gcaptchaget-a-garanteed-solution-form");
                    grecaptcha.reset(reCaptchaID);
                }, 200);                
            });
            var split = new Date().toString().split(" ");
            var timeZoneFormatted = split[split.length - 2];
            $("#gs_timezone").val(timeZoneFormatted);
        });
    </script>
{/literal}	
