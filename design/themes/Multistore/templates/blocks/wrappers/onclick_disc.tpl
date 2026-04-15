<center>
<a class="button topicon" href="/submit-your-trouble-ticket.html"><img  style="float:left; border: 2px dashed #FFF" src="/images/CEN4.png"></a>
<a class="button topicon cm-dialog-opener cm-dialog-auto-size" href="/index.php?dispatch=pages.view&page_id=99" data-ca-target-id="open_99_ajax"><img  style="float:left;" src="/images/CEN2.png"></a>
<a class="button topicon cm-dialog-opener cm-dialog-auto-size" href="/index.php?dispatch=pages.view&page_id=100" data-ca-target-id="open_100_ajax"><img  style="float:left;" src="/images/CEN3.png"></a>
{if $content|trim}

    {assign var="dropdown_id" value=$block.snapping_id}
    <div class="ty-dropdown-box  topicon {if $block.user_class}   {$block.user_class}{/if}{if $content_alignment == "RIGHT"} ty-float-right{elseif $content_alignment == "LEFT"} ty-float-left{/if}">
  
   <div id="sw_dropdown_{$dropdown_id}" class="ty-dropdown-box__title cm-combination {if $header_class}{$header_class}{/if}">
            {hook name="wrapper:onclick_dropdown_title"}
            <img src="/images/CEN1.png">
            {/hook}
        </div>
        <div style="  background: #fff;    width: 350px;    padding: 20px;    border: 1px solid #ccc;    border-radius: 0px;    border-bottom: 5px solid #FF6920;" id="dropdown_{$dropdown_id}" class="cm-popup-box ty-dropdown-box__content hidden">
            {$content|default:"&nbsp;" nofilter}
        </div>
    </div>

{/if}
</center>