<div class="consult-form">         
    <form action="{""|fn_url}" method="post" class='cm-ajax' name='form_consult'>
        <input type="hidden" name="category_id" value="{$smarty.get.category_id}"/>
        <input type="hidden" name="brand_id" value="{$smarty.get.b_id}"/>
        <input type="hidden" name="timezone"  value="" id="consult_timezone" />
        <input type="hidden" name="result_ids" value="result" />

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="consult_name">Name</label>
            <input type="text" name="name" id="consult_name" value="" placeholder="Name" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="consult_email">E-mail</label>
            <input type="text" name="email" id="consult_email" value="" placeholder="E-mail" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="consult_phone">Phone</label>
            <input type="text" name="phone" id="consult_phone" value="" placeholder="Phone" class="form-control"/>
        </div>	

        <div class="form-elements-group ty-form-builder__buttons buttons-container text-right">
            <div class="row">
                <div class="col-md-10">
                    {include file="common/image_verification.tpl" option="form_consult"}
                </div>
                <div class="col-md-6">
                    {include file="buttons/button.tpl" but_meta="btn-primary" but_role="submit" but_text='Send' but_name="dispatch[brands.consult]"}
                </div>
            </div>
        </div>
    </form>      
</div>
{literal}
    <script type="text/javascript"  class="cm-ajax-force">
        $(document).ready(function () {
            $('form[name=form_consult]').on('submit', function (event) {
                setTimeout(function(){
                    var reCaptchaID = GetReCaptchaID("gcaptchaform_consult");
                    grecaptcha.reset(reCaptchaID);
                }, 200);                
            });
            var split = new Date().toString().split(" ");
            var timeZoneFormatted = split[split.length - 2];
            $("#consult_timezone").val(timeZoneFormatted);
        });
        
    </script>
{/literal}	
