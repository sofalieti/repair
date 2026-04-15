<div class="default-main-title text-center">Outdoor Infrared Sauna Guide Campaign</div>
<button class="cm-dialog-opener cm-dialog-auto-size btn btn-primary" data-ca-target-id="sauna_guide_campaign">GET THE FREE eBOOK</button>

<div class="hidden" id="sauna_guide_campaign" title="Outdoor Infrared Sauna Guide">
    <form action="{"products.outdoor_infrared_sauna_guide_campaign"|fn_url}" method="post">		
		<div class="form-group">	
                    <label class="cm-required cm-name hidden" for="inf_field_name">Name</label>
                    <input class="form-control" id="inf_field_name" name="data[name]" placeholder="First Name*" type="text" value="" />
		</div>
		<div class="form-group">		
			<label class="cm-required cm-email hidden" for="inf_field_email">Email</label>
			<input class="form-control" id="inf_field_email" name="data[email]" placeholder="Email*" type="text" />
		</div>
		<div class="form-group">
			<label for="inf_field_whb" class="cm-required cm-name">What health benefit is MOST important to you? *</label> 
			<select id="inf_field_whb" name="data[WHB]" class="form-control">
				<option value="">Please select one</option>
				<option value="detoxification">detoxification</option>
				<option value="heart health">heart health</option>
				<option value="pain relief">pain relief</option>
				<option value="stress relief">stress relief</option>
				<option value="weight loss">weight loss</option>
				<option value="skin health">skin health</option>
				<option value="cell health">cell health</option>
				<option value="wound healing">wound healing</option>
				<option value="hyperthermia">hyperthermia</option>
				<option value="lowering blood pressure">lowering blood pressure</option>
				<option value="fibromyalgia">fibromyalgia</option>
				<option value="lyme disease">lyme disease</option>
				<option value="chronic fatigue">chronic fatigue</option>
				<option value="arthritis">arthritis</option>
				<option value="cancer">cancer</option>
			</select>
		</div>
                <div class="form-group">
                    {include file="common/image_verification.tpl" option="form_builder"}
                </div>
		<div class="form-group text-right">
			<label>&nbsp;</label>
			<button type="submit" class="btn btn-primary">GET THE FREE eBOOK</button>
		</div>
	</form>
</div>