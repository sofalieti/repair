{if $content|trim}
    <div class="{$sidebox_wrapper|default:"ty-footer"}{if isset($hide_wrapper)} cm-hidden-wrapper{/if}{if $hide_wrapper} hidden{/if}{if $block.user_class} {$block.user_class}{/if}{if $content_alignment == "RIGHT"} ty-float-right{elseif $content_alignment == "LEFT"} ty-float-left{/if}">
        
          
        <i class="ty-footer-menu__icon-open ty-icon-down-open"></i>
        <i class="ty-footer-menu__icon-hide ty-icon-up-open"></i>
        </h2>
        <div class="ty-footer-general__body" id="footer-general_{$block.block_id}">{$content|default:"&nbsp;" nofilter}</div>
    </div>

{/if}