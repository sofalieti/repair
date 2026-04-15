{assign var=captcha_id value=$option}
{if $option == 'form_builder'}
    {assign var=captcha_id value=$page.page_id}
{/if}
<div id="gcaptcha{$captcha_id}" class="g-recaptcha"></div>