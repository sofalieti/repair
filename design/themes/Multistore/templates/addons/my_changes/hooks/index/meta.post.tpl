<meta property="og:title" content="{$smarty.capture.page_title|strip|trim nofilter}" />
<meta property="og:type" content="website" />

{assign var=og_image_t value="https://enlightensauna.com/images/companies/1/features/EnlightenSaunasLogo.jpg"}
{assign var=is_size value=false}

{if isset($og_image)}
{assign var=og_image_t value=$og_image}
{assign var=is_size value=true}
{/if}
<meta property="og:image" content="{$og_image_t}" />

{if $is_size}
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="200" />
{/if}

{if isset($og_image_alt)}
	{if !empty($og_image_alt)}
		<meta property="og:image:alt" content="{$og_image_alt}" />
	{/if}
{else}
<meta property="og:image:alt" content="Enlighten outdoor infrared sauna" />
{/if}

<meta property="og:description" content="{$meta_description|html_entity_decode:$smarty.const.ENT_COMPAT:"UTF-8"|default:$location_data.meta_description}">

{assign var=og_url value="https://`$smarty.server.HTTP_HOST``$smarty.server.REQUEST_URI`"}

<meta property="og:url" content="{$og_url|strtok:"?"}" />