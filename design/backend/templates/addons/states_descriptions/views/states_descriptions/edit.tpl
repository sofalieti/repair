{capture name="mainbox"}
<div id="content_detailed">

	{if $state}
	<form action="{""|fn_url}" method="post" name="add_states_form" class="form-horizontal form-edit">
	
	
		<input type="hidden" name="state_id" value="{$state.state_id}" />

		<div class="cm-j-tabs">
			<ul class="nav nav-tabs">
				<li id="tab_new_states" class="cm-js active"><a>{__("general")}</a></li>
			</ul>
		</div>

		<div class="cm-tabs-content">
		<fieldset>
			<div class="control-group">
				<label class="cm-required control-label" for="elm_state_code">{__("code")}:</label>
				<div class="controls">
				<input type="text" id="elm_state_code" name="state_data[code]" size="8" value="{$state.code}" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="elm_state_name">{__("state")}:</label>
				<div class="controls">
				<input type="text" id="elm_state_name" name="state_data[state]" size="55" value="{$state.state}" />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="elm_state_url">URL:</label>
				<div class="controls">
				<input type="text" id="elm_state_url" name="state_data[url]" size="55" value="{$state.url}" />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="elm_state_description1">Description top:</label>
				<div class="controls">
				<textarea id="elm_state_description1" name="state_data[description1]" cols="55" rows="8" class=" input-large">{$state.description1}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="elm_state_description2">Description bottom:</label>
				<div class="controls">
				<textarea id="elm_state_description2" name="state_data[description2]" cols="55" rows="8" class=" input-large">{$state.description2}</textarea>
				</div>
			</div>

			{include file="common/select_status.tpl" input_name="state_data[status]" id="elm_state_status" obj=$state}
		</fieldset>
		</div>

		<div class="buttons-container">
			{include file="buttons/save.tpl" create=true but_name="dispatch[states_descriptions.edit]" cancel_action="close"}
		</div>

	</form>
</div>
{else}
    <p class="no-items">{__("no_data")}</p>
{/if}

{/capture}
{include file="common/mainbox.tpl" title='Edit state' content=$smarty.capture.mainbox adv_buttons=$smarty.capture.adv_buttons buttons=$smarty.capture.buttons sidebar=$smarty.capture.sidebar select_languages=true}