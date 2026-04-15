<div class="contact_us_for_a_price">         
    <form action="{""|fn_url}" method="post">
        <input type="hidden" name="redirect_url" value="{$config.current_url}" />   

        <input type="hidden" name="financing[product_id]" value="{$smarty.get.product_id}" />   
        <input type="hidden" name="financing[product]" value="{$smarty.get.product}" />      

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="contact_us_for_a_price_name">Name</label>
            <input type="text" name="financing[name]" id="contact_us_for_a_price_name" value="" placeholder="Name" class="form-control"  />
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="contact_us_for_a_price_email">E-mail</label>
            <input type="text" name="financing[email]" id="contact_us_for_a_price_email" value="" placeholder="E-mail" class="form-control"  />
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="contact_us_for_a_price_phone">Phone</label>
            <input type="text" name="financing[phone]" id="contact_us_for_a_price_phone" value="" placeholder="Phone" class="form-control"  />
        </div>	

        <div class="form-group">
            <label class="cm-required hidden" for="contact_us_for_a_price_price_type">Price-Type</label>
            <select name="financing[price_type]" id="contact_us_for_a_price_price_type" class="form-control">
                <option value="For use in USA">For use in USA</option>
                <option value="For use in Canada">For use in Canada</option>
                <option value="For International use">For International use</option>
            </select>
        </div>
        {*<div class="form-group">
            <p style="font-size: 14px;">Sauna Type</p>
            <label class="cm-required hidden" for="contact_us_for_a_price_sauna_type">Sauna Type</label>
            <select name="financing[sauna_type]" id="contact_us_for_a_price_sauna_type">
                <option value="Outdoor Variant">Outdoor Variant</option>
                <option value="Indoor Variant">Indoor Variant</option>
            </select>
        </div>*}
        {*<div class="checkbox-as-image">
            <label class="active">
                <img src="/design/themes/Multistore/media/images/outdooricon.png"><br>
                <input checked="" type="radio" name="financing[sauna_type]" value="Outdoor Variant" onchange="$('.checkbox-as-image label').removeClass('active');$(this).parent('label').addClass('active');">
                Outdoor Variant
            </label>
            <label>
                <img src="/design/themes/Multistore/media/images/indooricon.png"><br>
                <input type="radio" name="financing[sauna_type]" value="Indoor Variant" onchange="$('.checkbox-as-image label').removeClass('active');$(this).parent('label').addClass('active');">
                Indoor Variant
            </label>
        </div>*}

        <div class="form-group">
            <p style="font-size: 14px;">What Health Benefit is MOST important to you?</p>
            <label class="cm-required hidden cm-required" for="contact_us_for_a_price_whb">What Health Benefit is MOST important to you?</label>
            <select id="contact_us_for_a_price_whb" name="financing[WHB]" class="form-control">
                <option value="">-</option>
                <option value="detoxification">Detoxification</option>
                <option value="cardiovascular health">Cardiovascular Health</option>
                <option value="pain relief">Pain Relief</option>
                <option value="stress relief">Stress Relief</option>
                <option value="weight loss">Weight Loss</option>
                <option value="skin health">Skin Health</option>
                <option value="cell health">Cell Health</option>
                <option value="wound healing">Wound Healing</option>
                <option value="hyperthermia">Hyperthermia</option>
                <option value="lowering blood pressure">Lowering Blood Pressure</option>
                <option value="fibromyalgia">Fibromyalgia</option>
                <option value="lyme disease">Lyme Disease</option>
                <option value="chronic fatigue">Chronic Fatigue</option>
                <option value="arthritis">Arthritis</option>
                <option value="cancer">Cancer</option>
            </select>
        </div>
        <input type="hidden" name="financing[options]"  value="{$smarty.get.options|default:''}" />
        <input type="hidden" name="financing[timezone]"  value="" id="contact_us_for_a_price_timezone" />
        {*include file="common/image_verification.tpl" option="use_for_form_builder"*}	
        <div class="form-group text-right">
            {include file="buttons/button.tpl" but_role="submit" but_text='Send' but_name="dispatch[products.financing]" but_meta="btn-primary"}
        </div>
    </form>      
</div>
{literal}
<script type="text/javascript">
$(document).ready(function(){
	var split = new Date().toString().split(" ");
	var timeZoneFormatted = split[split.length - 2];
	$("#contact_us_for_a_price_timezone").val(timeZoneFormatted);
});
</script>
{/literal}	
