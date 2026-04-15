<div id="module_slideout">

  {$content nofilter}

  <div id="module_slideout_inner">

  
    {assign var="page" value=$PageLink|fn_get_page_data }

    {hook name="pages:page_content"}
    <div {live_edit name="page:description:{$PageLink}"}>{$MyPageNumber.description nofilter}</div>
    {/hook}
{capture name="mainbox_title"}<span {live_edit name="page:page:{$MyPageNumber.page_id}"}>{$MyPageNumber.page}</span>{/capture}



  </div>

</div>

