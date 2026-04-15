<?php /* Smarty version Smarty-3.1.21, created on 2025-10-07 20:14:47
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/debugger/debugger.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211500609168e54a87f36cb4-74473916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e02439fef88ffdf202a3730778cac641c1decdc7' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/debugger/debugger.tpl',
      1 => 1752993020,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '211500609168e54a87f36cb4-74473916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'images_dir' => 0,
    'config' => 0,
    'current_url' => 0,
    'debugger_hash' => 0,
    'totals' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_68e54a8801df14_58869368',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_68e54a8801df14_58869368')) {function content_68e54a8801df14_58869368($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo smarty_function_script(array('src'=>"js/lib/highlight/highlight.pack.js"),$_smarty_tpl);?>



<?php echo '<script'; ?>
 type="text/javascript">

(function($){

var codeArr={};

$(document).ready(function() {

    $(window).on('keydown', function(e) {
        codeArr[e.keyCode] = true;

        if (codeArr[17] && codeArr[18] && e.keyCode !== 17 && e.keyCode !== 18) {
            // show toolbar on ctrl+alt+d
            if (e.keyCode == 68) {
                $('.deb-content').toggle();
            }

            codeArr={};
        }
    });

    $(window).on('keyup', function(e) {
        delete(codeArr[e.keyCode]);
    });

    // show hide toolbar
    $('.deb-bug').on('click', function(){
        $('.deb-content').toggle();
        localStorage.removeItem('debugToolbarTab');
        localStorage.removeItem('debugToolbarTabContent');
        if($('.deb-content').is(':visible')){
            localStorage.setItem('debugToolbarTab', true);
        }       
    });

    $('.deb-menu li').on('click', function(e){
        var tab = $(this).find('a').data('tab-content-id');
        localStorage.setItem('debugToolbarTabContent', tab);

        $('.deb-menu li').removeClass('active');
        $(this).addClass('active');

        if($(tab).is(':visible')) {
            $(tab).css('display','none');
            $(this).removeClass('active');
            localStorage.removeItem('debugToolbarTabContent');
        } else {
            $('.deb-tab').hide();
            $(tab).css('display','block');
        }
        
    });

    // show if opened
    if(localStorage.getItem("debugToolbarTabContent") !== null){
        var viewTab = localStorage.getItem("debugToolbarTabContent");
        $('.deb-content').show();
        $('.deb-menu li a[data-tab-content-id="'+viewTab+'"]').click();
    }

    if(localStorage.getItem("debugToolbarTab") !== null){
        $('.deb-content').show();
    }

    $('.deb-close').on('click', function(){
        $('.deb-tab').hide();
        localStorage.removeItem('debugToolbarTabContent');
        $('.deb-menu li').removeClass('active');
    });


    // after ajax init
    $.ceEvent('on', 'ce.ajaxdone', function(){

        // code highlight
        $('pre code').each(function(i, e) {
            hljs.highlightBlock(e)
        });

        // template tree
        $('.tree li').each(function(){
            if($(this).children('ul').length > 0){
                $(this).addClass('parent');     
            }
        });
        $('.tree li.parent > a').click(function(){
            $(this).parent().toggleClass('active');
            $(this).parent().children('ul').slideToggle('fast');
        });

        // Sub tabs
        var defaultTab = $('.deb-sub-tab ul li.active a').data('sub-tab-id');
        $('#'+defaultTab).show();

        $('.deb-sub-tab ul li a').on('click', function(e){
            var subTab = $(this).data('sub-tab-id');
            $('.deb-sub-tab ul li').removeClass('active');
            $(this).parent().addClass('active');

            $('.deb-sub-tab-content').hide();
            $('#'+subTab).show();
        });

        // change tab on sql query click
        $('#DebugToolbarSubTabSQLListTable a').on('click', function(e){
            $('.deb-sub-tab li:last-child a').click();
        })

        // chenge value on submit
        $('#DebugToolbarSubTabSQLParseSubmit').on('click',function(){
            var value = $('#DebugToolbarSQLQueryValue').text();
            $('#DebugToolbarSQLQuery').val(value);
        })
    })
        
});

})(Tygh.$);

<?php echo '</script'; ?>
>

<style type="text/css">
        pre code {
          display: block; padding: 0.5em;
        }

        pre .comment,
        pre .annotation,
        pre .template_comment,
        pre .diff .header,
        pre .chunk,
        pre .apache .cbracket {
          color: rgb(0, 128, 0);
        }

        pre .keyword,
        pre .id,
        pre .built_in,
        pre .smalltalk .class,
        pre .winutils,
        pre .bash .variable,
        pre .tex .command,
        pre .request,
        pre .status,
        pre .nginx .title,
        pre .xml .tag,
        pre .xml .tag .value {
          color: rgb(0, 0, 255);
        }

        pre .string,
        pre .title,
        pre .parent,
        pre .tag .value,
        pre .rules .value,
        pre .rules .value .number,
        pre .ruby .symbol,
        pre .ruby .symbol .string,
        pre .aggregate,
        pre .template_tag,
        pre .django .variable,
        pre .addition,
        pre .flow,
        pre .stream,
        pre .apache .tag,
        pre .date,
        pre .tex .formula {
          color: rgb(163, 21, 21);
        }

        pre .ruby .string,
        pre .decorator,
        pre .filter .argument,
        pre .localvars,
        pre .array,
        pre .attr_selector,
        pre .pseudo,
        pre .pi,
        pre .doctype,
        pre .deletion,
        pre .envvar,
        pre .shebang,
        pre .preprocessor,
        pre .userType,
        pre .apache .sqbracket,
        pre .nginx .built_in,
        pre .tex .special,
        pre .prompt {
          color: rgb(43, 145, 175);
        }

        pre .phpdoc,
        pre .javadoc,
        pre .xmlDocTag {
          color: rgb(128, 128, 128);
        }

        pre .vhdl .typename { font-weight: bold; }
        pre .vhdl .string { color: #666666; }
        pre .vhdl .literal { color: rgb(163, 21, 21); }
        pre .vhdl .attribute { color: #00B0E8; }

        pre .xml .attribute { color: rgb(255, 0, 0); }


        #DebugToolbar {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        #DebugToolbar pre, code {
            padding: 0px !important;
            font-size: 14px !important;
            margin: 0px !important;
            background: white;
            border: 0px !important;
            border-radius: 0px !important;
            font-family: monospace !important;
            white-space: pre-wrap;
            line-height: 18px;
        }
        #DebugToolbar ul, #DebugToolbar li {
            padding: 0px;
            margin: 0px;
        }
        #DebugToolbar a {
            text-decoration: none;
            color: 
        }
        #DebugToolbar .deb-bug {
            width: 32px;
            height: 32px;
            position: fixed;
            top: 24px;
            right: 22px;
            z-index: 99999;
            cursor: pointer;
        }
        #DebugToolbar .deb-x {
            color: white;
            position: absolute;
            top: 58px;
            left: -24px;
            display: block;
            padding: 5px 7px;
            height: 18px;
            -webkit-border-radius: 4px 0 0 4px;
            -moz-border-radius: 4px 0 0 4px;
            border-radius: 4px 0 0 4px;
            background: #4d4d4d;
            text-decoration: none;
            visibility: hidden;
            opacity: 0;
        }
        #DebugToolbar .deb-logo {
            width: 86px;
            height: 19px;
            display: block;
            position: absolute;
            top: 25px;
            right: 94px;
            z-index: 99999;
        }
        #DebugToolbar .deb-content {
            display: none;
        }
        #DebugToolbar .deb-panel {
            background: #111111;
            width: 200px;
            position: fixed;
            right: 0px;
            top: 0px;
            bottom: 0px;
            z-index: 99998;
            color: white;
            min-height: 630px;
        }
        #DebugToolbar .deb-panel:hover .deb-x {
            visibility: visible;
            opacity: 1;
            -webkit-transition: all 0.2s ease;
            -moz-transition: all 0.2s ease;
            -ms-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        #DebugToolbar .deb-panel .deb-menu {
            margin-top: 85px;
            border-top: 1px solid #464545;
        }
        #DebugToolbar .deb-panel .deb-menu .active a {
            background: #4b4b4b;
        }
        #DebugToolbar .deb-panel .deb-menu li {
            list-style-type: none;
        }
        #DebugToolbar .deb-panel .deb-menu li a {
            color: white;
            display: block;
            font-size: 16px;
            padding: 15px 20px;
        }
        #DebugToolbar .deb-panel .deb-menu li a:hover {
            background: #323232;
        }
        #DebugToolbar .deb-panel ul li a small {
            display: block;
            font-size: 11px;
            color: #999999;
        }
        #DebugToolbar .deb-panel .deb-down-wrap {
            position: absolute;
            right: 0px;
            bottom: 20px;
        }
        #DebugToolbar .deb-panel .deb-down-content {
            padding: 0px 16px;
            margin-bottom: 15px;
        }
        #DebugToolbar .deb-panel .deb-down-help-text {
            color: #999;
            font-size: 12px;
            line-height: 16px;
        }
        #DebugToolbar .deb-panel .deb-resource-usage {
            border-top: 1px solid #464545;
            font-size: 12px;
            padding: 10px 15px 0px 15px;
            width: 170px;
        }
        #DebugToolbar .deb-panel .deb-resource-usage li {
            list-style-type: none;
            padding-bottom: 2px;
            color: #999999;
        }
        #DebugToolbar .deb-panel .deb-resource-usage li small {
            color: white;
        }
        #DebugToolbar .deb-panel .deb-resource-usage .deb-title {
            font-size: 16px;
            padding-bottom: 20px;
            color: white;
        }
        #DebugToolbar .deb-tab {
            z-index: 99997;
            background-color: #eeeeee;
            position: fixed;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 200px;
            padding: 0px;
            display: none;
            overflow: auto;
        }
        #DebugToolbar .deb-tab-title {
            background-color: #ffffcc;
            padding: 10px 20px;
            position: relative;
            box-shadow: 0px 0px 10px #797979;
            z-index: 20;
        }
        #DebugToolbar .deb-tab-title h1 {
            font-size: 22px;
            padding: 0px;
            margin: 0px;
            line-height: 22px;
        }
        #DebugToolbar .deb-tab-content {
            padding: 25px 20px;
        }
        #DebugToolbar .deb-sub-tab {
            margin-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        #DebugToolbar .deb-sub-tab-content {
            display: none;
        }
        #DebugToolbar .deb-sub-tab > ul li {
            display: inline-block;
            margin-bottom: -1px;
        }
        #DebugToolbar .deb-sub-tab > ul li.active a {
            background: #dddddd !important;
            color: #333333;
            border-bottom: 1px solid #aeaeae !important;
        }
        #DebugToolbar .deb-sub-tab > ul li:hover a {
            background: #e5e5e5;
            border-bottom: 1px solid #c5c5c5;
        }
        #DebugToolbar .deb-sub-tab > ul li a {
            display: block;
            padding: 8px 15px;
            border-bottom: 1px solid #dddddd;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-top-right-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-topright: 2px;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
        }
        #DebugToolbar .deb-close {
            font-size: 20px;
            position: absolute;
            top: 11px;
            right: 25px;
            color: black;
        }
        #DebugToolbar .deb-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        #DebugToolbar .deb-table caption {
            text-align: left;
            font-size: 18px;
            padding-bottom: 15px;
        }
        #DebugToolbar .deb-table th, #DebugToolbar .deb-table td {
            margin: 0px;
            padding: 0px;
            outline: 0px;
            text-align: left;
            border: 1px solid #cccccc;
            padding: 7px 10px;
            color: #424242;
            font-size: 13px;
            background-color: #ffffff;
        }
        #DebugToolbar .deb-table tr:hover td {
            background-color: #ffffeb;
        }
        #DebugToolbar .deb-table tr:hover td code, #DebugToolbar .deb-table tr:hover td pre {
            background: transparent;
        }
        #DebugToolbar .deb-table td a {
            color: #333333;
        }
        #DebugToolbar .deb-table th {
            background-color: #f5f5f5;
        }
        #DebugToolbar .deb-font-gray {
            color: gray;
        }
        #DebugToolbar .deb-table .deb-light-red, #DebugToolbar .deb-table .deb-light-red pre, #DebugToolbar .deb-table .deb-light-red pre code {
            background-color : #ffc8c8;
        }
        #DebugToolbar .deb-table .deb-light2-red, #DebugToolbar .deb-table .deb-light2-red pre, #DebugToolbar .deb-table .deb-light-red pre code {
            background-color: #fcdede;
        }
        #DebugToolbar .deb-table .deb-light3-red {
            background-color: #ffeeee;
        }
        #DebugToolbar .deb-variables {
            height: 100%;
            background: #333333;
            position: fixed;
            padding: 0px 0px 4px 0px;
            right: 217px;
            top: 0px;
        }
        #DebugToolbar .deb-variables a {
            display: block;
            padding: 2px 18px;
            color: #999999;
        }
        #DebugToolbar .deb-variables h4 {
            color: white;
            padding: 5px 18px;
        }
        #DebugToolbar .deb-variables a:hover {
            color: #999999;
            background: #4b4b4b;
        }
        #DebugToolbar #DebugToolbarTabTemplates .deb-table {
            width: 88%;
        }
        #DebugToolbar .tree {
            border-color: #BFC0C2 #BFC0C2 #B6B7BA;
            border-style: solid;
            border-width: 1px;
            display: inline-block;
            margin: 0 0 20px;
            width: 88%;
            background-color: white;
        }
        #DebugToolbar .tree ul {
            list-style: none outside none;
        }
        #DebugToolbar .tree ul li {
            padding: 4px 10px;
        }
        #DebugToolbar .tree ul > li:hover {
            background-color: #f7f7f7;
        }
        #DebugToolbar .tree li a {
            line-height: 25px;
        }
        #DebugToolbar .tree > ul > li  a {
            color: #3B4C56;
        }
        #DebugToolbar .tree > ul > li > a {
            display: block;
            font-weight: normal;
            position: relative;
            text-decoration: none;
        }
        #DebugToolbar .tree li.parent > a {
            padding: 0 0 0 17px;
            font-weight: bold;
        }
        #DebugToolbar .tree li.parent > a:before {
            background-image: url("design/backend/media/images/debugger/plus_minus_icons.png");
            background-position: 14px center;
            content: "";
            display: block;
            height: 21px;
            left: 0;
            position: absolute;
            top: 2px;
            vertical-align: middle;
            width: 14px;
        }
        #DebugToolbar .tree ul li.active > a:before {
            background-position: 0 center;
        }
        #DebugToolbar .tree ul li ul {
            display: none;
            margin: 0 0 0 12px;
            overflow: hidden;
            padding: 0 0 0 25px;
        }
        #DebugToolbar .tree ul li ul li {
            position: relative;
        }
        #DebugToolbar .tree ul li ul li:before {
            content: "";
            left: -20px;
            position: absolute;
            top: 17px;
            width: 15px;
        }
        #DebugToolbar h1 {
            font-size: 18px;
        }
        #DebugToolbar textarea {
            width: 99%;
        }
        #DebugToolbar [type="checkbox"] {
            margin: 0px;
        }
        #DebugToolbar #DebugToolbarSubTabSQLList,
        #DebugToolbar #DebugToolbarSubTabCacheQueriesList {
            display: block;
        }

    </style>

<div id="DebugToolbar">
    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/debugger/bug.png" class="deb-bug" />
    <div class="deb-content">
    <div class="deb-panel">
        <a href="#" class="deb-logo"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/debugger/logo.png"></a>
        <?php if (@constant('DEBUG_MODE')!==true) {?>
            <?php $_smarty_tpl->tpl_vars['current_url'] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],$_smarty_tpl->tpl_vars['config']->value['debugger_token']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars['current_url'] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['current_url']->value), null, 0);?>
            <a href="<?php echo htmlspecialchars(fn_url("debugger.quit?redirect_url=".((string)$_smarty_tpl->tpl_vars['current_url']->value)), ENT_QUOTES, 'UTF-8');?>
" id="DebugToolbarQuit" class="deb-x">&#10006;</a>
        <?php }?>
        <ul class="deb-menu">
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.server?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabServerContent" data-tab-content-id="#DebugToolbarTabServer">Server<small><?php echo htmlspecialchars(@constant('PRODUCT_NAME'), ENT_QUOTES, 'UTF-8');?>
: version <b><?php echo htmlspecialchars(@constant('PRODUCT_VERSION'), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(@constant('PRODUCT_EDITION'), ENT_QUOTES, 'UTF-8');?>
 <?php if (@constant('PRODUCT_STATUS')!='') {?> (<?php echo htmlspecialchars(@constant('PRODUCT_STATUS'), ENT_QUOTES, 'UTF-8');?>
)<?php }?> <?php if (@constant('PRODUCT_BUILD')!='') {?> <?php echo htmlspecialchars(@constant('PRODUCT_BUILD'), ENT_QUOTES, 'UTF-8');
}?></b></small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.request?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabRequestContent" data-tab-content-id="#DebugToolbarTabRequest">Request</a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.config?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabConfigContent" data-tab-content-id="#DebugToolbarTabConfig">Config</a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.sql?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabSQLContent" data-tab-content-id="#DebugToolbarTabSQL">SQL<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['count_queries'], ENT_QUOTES, 'UTF-8');?>
 queries <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['time_queries'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.cache_queries?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabCacheQueriesContent" data-tab-content-id="#DebugToolbarTabCacheQueries">Cache queries<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['count_cache_queries'], ENT_QUOTES, 'UTF-8');?>
 queries <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['time_cache_queries'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.logging?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabLoggingContent" data-tab-content-id="#DebugToolbarTabLogging">Logging</a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.templates?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabTemplatesContent" data-tab-content-id="#DebugToolbarTabTemplates" >Templates<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['count_tpls'], ENT_QUOTES, 'UTF-8');?>
 included templates</small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.blocks?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabBlocksContent" data-tab-content-id="#DebugToolbarTabBlocks">Blocks<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['blocks_rendered'], ENT_QUOTES, 'UTF-8');?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['blocks_from_cache'], ENT_QUOTES, 'UTF-8');?>
 from cache) blocks rendered in <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['blocks_time'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></a></li>
        </ul>
        <div class="deb-down-wrap">
        <div class="deb-down-content">
            <p class="deb-down-help-text">
            Ctrl+Alt+D - show/hide toolbar
        </p>
        </div>
        <ul class="deb-resource-usage">
            <li>Page generating time <small><?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['time_page'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></li>
            <li>Memory usage <small><?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['memory_page'],"2","."," "), ENT_QUOTES, 'UTF-8');?>
 KB</small></li>
        </ul>
        </div>
    </div>
    <!--Sever tab-->
    <div class="deb-tab" id="DebugToolbarTabServer">
        <div class="deb-tab-title">
            <h1>Server</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabServerContent">
        </div>
    </div>

    <!--Request tab-->
    <div class="deb-tab" id="DebugToolbarTabRequest">
        <div class="deb-tab-title">
            <h1>Request</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabRequestContent">
        </div>
    </div>

    <!--Config tab-->
    <div class="deb-tab" id="DebugToolbarTabConfig">
        <div class="deb-tab-title">
            <h1>Config</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabConfigContent">
        </div>
    </div>

    <!--SQL tab-->
    <div class="deb-tab" id="DebugToolbarTabSQL">
        <div class="deb-tab-title">
            <h1>SQL</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabSQLContent">
        </div>
    </div>

    <!--Cache queries tab-->
    <div class="deb-tab" id="DebugToolbarTabCacheQueries">
        <div class="deb-tab-title">
            <h1>Cache queries</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabCacheQueriesContent">
        </div>
    </div>    

    <!--Logging tab-->
    <div class="deb-tab" id="DebugToolbarTabLogging">
        <div class="deb-tab-title">
            <h1>Logging</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabLoggingContent">
        </div>
    </div>

    <!--Templates tab-->
    <div class="deb-tab" id="DebugToolbarTabTemplates">
        <div class="deb-tab-title">
            <h1>Templates</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabTemplatesContent">
        </div>
    </div>

    <!--Blocks tab-->
    <div class="deb-tab" id="DebugToolbarTabBlocks">
        <div class="deb-tab-title">
            <h1>Blocks</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabBlocksContent">
        </div>
    </div>
    </div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/debugger/debugger.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/debugger/debugger.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo smarty_function_script(array('src'=>"js/lib/highlight/highlight.pack.js"),$_smarty_tpl);?>



<?php echo '<script'; ?>
 type="text/javascript">

(function($){

var codeArr={};

$(document).ready(function() {

    $(window).on('keydown', function(e) {
        codeArr[e.keyCode] = true;

        if (codeArr[17] && codeArr[18] && e.keyCode !== 17 && e.keyCode !== 18) {
            // show toolbar on ctrl+alt+d
            if (e.keyCode == 68) {
                $('.deb-content').toggle();
            }

            codeArr={};
        }
    });

    $(window).on('keyup', function(e) {
        delete(codeArr[e.keyCode]);
    });

    // show hide toolbar
    $('.deb-bug').on('click', function(){
        $('.deb-content').toggle();
        localStorage.removeItem('debugToolbarTab');
        localStorage.removeItem('debugToolbarTabContent');
        if($('.deb-content').is(':visible')){
            localStorage.setItem('debugToolbarTab', true);
        }       
    });

    $('.deb-menu li').on('click', function(e){
        var tab = $(this).find('a').data('tab-content-id');
        localStorage.setItem('debugToolbarTabContent', tab);

        $('.deb-menu li').removeClass('active');
        $(this).addClass('active');

        if($(tab).is(':visible')) {
            $(tab).css('display','none');
            $(this).removeClass('active');
            localStorage.removeItem('debugToolbarTabContent');
        } else {
            $('.deb-tab').hide();
            $(tab).css('display','block');
        }
        
    });

    // show if opened
    if(localStorage.getItem("debugToolbarTabContent") !== null){
        var viewTab = localStorage.getItem("debugToolbarTabContent");
        $('.deb-content').show();
        $('.deb-menu li a[data-tab-content-id="'+viewTab+'"]').click();
    }

    if(localStorage.getItem("debugToolbarTab") !== null){
        $('.deb-content').show();
    }

    $('.deb-close').on('click', function(){
        $('.deb-tab').hide();
        localStorage.removeItem('debugToolbarTabContent');
        $('.deb-menu li').removeClass('active');
    });


    // after ajax init
    $.ceEvent('on', 'ce.ajaxdone', function(){

        // code highlight
        $('pre code').each(function(i, e) {
            hljs.highlightBlock(e)
        });

        // template tree
        $('.tree li').each(function(){
            if($(this).children('ul').length > 0){
                $(this).addClass('parent');     
            }
        });
        $('.tree li.parent > a').click(function(){
            $(this).parent().toggleClass('active');
            $(this).parent().children('ul').slideToggle('fast');
        });

        // Sub tabs
        var defaultTab = $('.deb-sub-tab ul li.active a').data('sub-tab-id');
        $('#'+defaultTab).show();

        $('.deb-sub-tab ul li a').on('click', function(e){
            var subTab = $(this).data('sub-tab-id');
            $('.deb-sub-tab ul li').removeClass('active');
            $(this).parent().addClass('active');

            $('.deb-sub-tab-content').hide();
            $('#'+subTab).show();
        });

        // change tab on sql query click
        $('#DebugToolbarSubTabSQLListTable a').on('click', function(e){
            $('.deb-sub-tab li:last-child a').click();
        })

        // chenge value on submit
        $('#DebugToolbarSubTabSQLParseSubmit').on('click',function(){
            var value = $('#DebugToolbarSQLQueryValue').text();
            $('#DebugToolbarSQLQuery').val(value);
        })
    })
        
});

})(Tygh.$);

<?php echo '</script'; ?>
>

<style type="text/css">
        pre code {
          display: block; padding: 0.5em;
        }

        pre .comment,
        pre .annotation,
        pre .template_comment,
        pre .diff .header,
        pre .chunk,
        pre .apache .cbracket {
          color: rgb(0, 128, 0);
        }

        pre .keyword,
        pre .id,
        pre .built_in,
        pre .smalltalk .class,
        pre .winutils,
        pre .bash .variable,
        pre .tex .command,
        pre .request,
        pre .status,
        pre .nginx .title,
        pre .xml .tag,
        pre .xml .tag .value {
          color: rgb(0, 0, 255);
        }

        pre .string,
        pre .title,
        pre .parent,
        pre .tag .value,
        pre .rules .value,
        pre .rules .value .number,
        pre .ruby .symbol,
        pre .ruby .symbol .string,
        pre .aggregate,
        pre .template_tag,
        pre .django .variable,
        pre .addition,
        pre .flow,
        pre .stream,
        pre .apache .tag,
        pre .date,
        pre .tex .formula {
          color: rgb(163, 21, 21);
        }

        pre .ruby .string,
        pre .decorator,
        pre .filter .argument,
        pre .localvars,
        pre .array,
        pre .attr_selector,
        pre .pseudo,
        pre .pi,
        pre .doctype,
        pre .deletion,
        pre .envvar,
        pre .shebang,
        pre .preprocessor,
        pre .userType,
        pre .apache .sqbracket,
        pre .nginx .built_in,
        pre .tex .special,
        pre .prompt {
          color: rgb(43, 145, 175);
        }

        pre .phpdoc,
        pre .javadoc,
        pre .xmlDocTag {
          color: rgb(128, 128, 128);
        }

        pre .vhdl .typename { font-weight: bold; }
        pre .vhdl .string { color: #666666; }
        pre .vhdl .literal { color: rgb(163, 21, 21); }
        pre .vhdl .attribute { color: #00B0E8; }

        pre .xml .attribute { color: rgb(255, 0, 0); }


        #DebugToolbar {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        #DebugToolbar pre, code {
            padding: 0px !important;
            font-size: 14px !important;
            margin: 0px !important;
            background: white;
            border: 0px !important;
            border-radius: 0px !important;
            font-family: monospace !important;
            white-space: pre-wrap;
            line-height: 18px;
        }
        #DebugToolbar ul, #DebugToolbar li {
            padding: 0px;
            margin: 0px;
        }
        #DebugToolbar a {
            text-decoration: none;
            color: 
        }
        #DebugToolbar .deb-bug {
            width: 32px;
            height: 32px;
            position: fixed;
            top: 24px;
            right: 22px;
            z-index: 99999;
            cursor: pointer;
        }
        #DebugToolbar .deb-x {
            color: white;
            position: absolute;
            top: 58px;
            left: -24px;
            display: block;
            padding: 5px 7px;
            height: 18px;
            -webkit-border-radius: 4px 0 0 4px;
            -moz-border-radius: 4px 0 0 4px;
            border-radius: 4px 0 0 4px;
            background: #4d4d4d;
            text-decoration: none;
            visibility: hidden;
            opacity: 0;
        }
        #DebugToolbar .deb-logo {
            width: 86px;
            height: 19px;
            display: block;
            position: absolute;
            top: 25px;
            right: 94px;
            z-index: 99999;
        }
        #DebugToolbar .deb-content {
            display: none;
        }
        #DebugToolbar .deb-panel {
            background: #111111;
            width: 200px;
            position: fixed;
            right: 0px;
            top: 0px;
            bottom: 0px;
            z-index: 99998;
            color: white;
            min-height: 630px;
        }
        #DebugToolbar .deb-panel:hover .deb-x {
            visibility: visible;
            opacity: 1;
            -webkit-transition: all 0.2s ease;
            -moz-transition: all 0.2s ease;
            -ms-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        #DebugToolbar .deb-panel .deb-menu {
            margin-top: 85px;
            border-top: 1px solid #464545;
        }
        #DebugToolbar .deb-panel .deb-menu .active a {
            background: #4b4b4b;
        }
        #DebugToolbar .deb-panel .deb-menu li {
            list-style-type: none;
        }
        #DebugToolbar .deb-panel .deb-menu li a {
            color: white;
            display: block;
            font-size: 16px;
            padding: 15px 20px;
        }
        #DebugToolbar .deb-panel .deb-menu li a:hover {
            background: #323232;
        }
        #DebugToolbar .deb-panel ul li a small {
            display: block;
            font-size: 11px;
            color: #999999;
        }
        #DebugToolbar .deb-panel .deb-down-wrap {
            position: absolute;
            right: 0px;
            bottom: 20px;
        }
        #DebugToolbar .deb-panel .deb-down-content {
            padding: 0px 16px;
            margin-bottom: 15px;
        }
        #DebugToolbar .deb-panel .deb-down-help-text {
            color: #999;
            font-size: 12px;
            line-height: 16px;
        }
        #DebugToolbar .deb-panel .deb-resource-usage {
            border-top: 1px solid #464545;
            font-size: 12px;
            padding: 10px 15px 0px 15px;
            width: 170px;
        }
        #DebugToolbar .deb-panel .deb-resource-usage li {
            list-style-type: none;
            padding-bottom: 2px;
            color: #999999;
        }
        #DebugToolbar .deb-panel .deb-resource-usage li small {
            color: white;
        }
        #DebugToolbar .deb-panel .deb-resource-usage .deb-title {
            font-size: 16px;
            padding-bottom: 20px;
            color: white;
        }
        #DebugToolbar .deb-tab {
            z-index: 99997;
            background-color: #eeeeee;
            position: fixed;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 200px;
            padding: 0px;
            display: none;
            overflow: auto;
        }
        #DebugToolbar .deb-tab-title {
            background-color: #ffffcc;
            padding: 10px 20px;
            position: relative;
            box-shadow: 0px 0px 10px #797979;
            z-index: 20;
        }
        #DebugToolbar .deb-tab-title h1 {
            font-size: 22px;
            padding: 0px;
            margin: 0px;
            line-height: 22px;
        }
        #DebugToolbar .deb-tab-content {
            padding: 25px 20px;
        }
        #DebugToolbar .deb-sub-tab {
            margin-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        #DebugToolbar .deb-sub-tab-content {
            display: none;
        }
        #DebugToolbar .deb-sub-tab > ul li {
            display: inline-block;
            margin-bottom: -1px;
        }
        #DebugToolbar .deb-sub-tab > ul li.active a {
            background: #dddddd !important;
            color: #333333;
            border-bottom: 1px solid #aeaeae !important;
        }
        #DebugToolbar .deb-sub-tab > ul li:hover a {
            background: #e5e5e5;
            border-bottom: 1px solid #c5c5c5;
        }
        #DebugToolbar .deb-sub-tab > ul li a {
            display: block;
            padding: 8px 15px;
            border-bottom: 1px solid #dddddd;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-top-right-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-topright: 2px;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
        }
        #DebugToolbar .deb-close {
            font-size: 20px;
            position: absolute;
            top: 11px;
            right: 25px;
            color: black;
        }
        #DebugToolbar .deb-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        #DebugToolbar .deb-table caption {
            text-align: left;
            font-size: 18px;
            padding-bottom: 15px;
        }
        #DebugToolbar .deb-table th, #DebugToolbar .deb-table td {
            margin: 0px;
            padding: 0px;
            outline: 0px;
            text-align: left;
            border: 1px solid #cccccc;
            padding: 7px 10px;
            color: #424242;
            font-size: 13px;
            background-color: #ffffff;
        }
        #DebugToolbar .deb-table tr:hover td {
            background-color: #ffffeb;
        }
        #DebugToolbar .deb-table tr:hover td code, #DebugToolbar .deb-table tr:hover td pre {
            background: transparent;
        }
        #DebugToolbar .deb-table td a {
            color: #333333;
        }
        #DebugToolbar .deb-table th {
            background-color: #f5f5f5;
        }
        #DebugToolbar .deb-font-gray {
            color: gray;
        }
        #DebugToolbar .deb-table .deb-light-red, #DebugToolbar .deb-table .deb-light-red pre, #DebugToolbar .deb-table .deb-light-red pre code {
            background-color : #ffc8c8;
        }
        #DebugToolbar .deb-table .deb-light2-red, #DebugToolbar .deb-table .deb-light2-red pre, #DebugToolbar .deb-table .deb-light-red pre code {
            background-color: #fcdede;
        }
        #DebugToolbar .deb-table .deb-light3-red {
            background-color: #ffeeee;
        }
        #DebugToolbar .deb-variables {
            height: 100%;
            background: #333333;
            position: fixed;
            padding: 0px 0px 4px 0px;
            right: 217px;
            top: 0px;
        }
        #DebugToolbar .deb-variables a {
            display: block;
            padding: 2px 18px;
            color: #999999;
        }
        #DebugToolbar .deb-variables h4 {
            color: white;
            padding: 5px 18px;
        }
        #DebugToolbar .deb-variables a:hover {
            color: #999999;
            background: #4b4b4b;
        }
        #DebugToolbar #DebugToolbarTabTemplates .deb-table {
            width: 88%;
        }
        #DebugToolbar .tree {
            border-color: #BFC0C2 #BFC0C2 #B6B7BA;
            border-style: solid;
            border-width: 1px;
            display: inline-block;
            margin: 0 0 20px;
            width: 88%;
            background-color: white;
        }
        #DebugToolbar .tree ul {
            list-style: none outside none;
        }
        #DebugToolbar .tree ul li {
            padding: 4px 10px;
        }
        #DebugToolbar .tree ul > li:hover {
            background-color: #f7f7f7;
        }
        #DebugToolbar .tree li a {
            line-height: 25px;
        }
        #DebugToolbar .tree > ul > li  a {
            color: #3B4C56;
        }
        #DebugToolbar .tree > ul > li > a {
            display: block;
            font-weight: normal;
            position: relative;
            text-decoration: none;
        }
        #DebugToolbar .tree li.parent > a {
            padding: 0 0 0 17px;
            font-weight: bold;
        }
        #DebugToolbar .tree li.parent > a:before {
            background-image: url("design/backend/media/images/debugger/plus_minus_icons.png");
            background-position: 14px center;
            content: "";
            display: block;
            height: 21px;
            left: 0;
            position: absolute;
            top: 2px;
            vertical-align: middle;
            width: 14px;
        }
        #DebugToolbar .tree ul li.active > a:before {
            background-position: 0 center;
        }
        #DebugToolbar .tree ul li ul {
            display: none;
            margin: 0 0 0 12px;
            overflow: hidden;
            padding: 0 0 0 25px;
        }
        #DebugToolbar .tree ul li ul li {
            position: relative;
        }
        #DebugToolbar .tree ul li ul li:before {
            content: "";
            left: -20px;
            position: absolute;
            top: 17px;
            width: 15px;
        }
        #DebugToolbar h1 {
            font-size: 18px;
        }
        #DebugToolbar textarea {
            width: 99%;
        }
        #DebugToolbar [type="checkbox"] {
            margin: 0px;
        }
        #DebugToolbar #DebugToolbarSubTabSQLList,
        #DebugToolbar #DebugToolbarSubTabCacheQueriesList {
            display: block;
        }

    </style>

<div id="DebugToolbar">
    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/debugger/bug.png" class="deb-bug" />
    <div class="deb-content">
    <div class="deb-panel">
        <a href="#" class="deb-logo"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/debugger/logo.png"></a>
        <?php if (@constant('DEBUG_MODE')!==true) {?>
            <?php $_smarty_tpl->tpl_vars['current_url'] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],$_smarty_tpl->tpl_vars['config']->value['debugger_token']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars['current_url'] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['current_url']->value), null, 0);?>
            <a href="<?php echo htmlspecialchars(fn_url("debugger.quit?redirect_url=".((string)$_smarty_tpl->tpl_vars['current_url']->value)), ENT_QUOTES, 'UTF-8');?>
" id="DebugToolbarQuit" class="deb-x">&#10006;</a>
        <?php }?>
        <ul class="deb-menu">
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.server?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabServerContent" data-tab-content-id="#DebugToolbarTabServer">Server<small><?php echo htmlspecialchars(@constant('PRODUCT_NAME'), ENT_QUOTES, 'UTF-8');?>
: version <b><?php echo htmlspecialchars(@constant('PRODUCT_VERSION'), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(@constant('PRODUCT_EDITION'), ENT_QUOTES, 'UTF-8');?>
 <?php if (@constant('PRODUCT_STATUS')!='') {?> (<?php echo htmlspecialchars(@constant('PRODUCT_STATUS'), ENT_QUOTES, 'UTF-8');?>
)<?php }?> <?php if (@constant('PRODUCT_BUILD')!='') {?> <?php echo htmlspecialchars(@constant('PRODUCT_BUILD'), ENT_QUOTES, 'UTF-8');
}?></b></small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.request?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabRequestContent" data-tab-content-id="#DebugToolbarTabRequest">Request</a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.config?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabConfigContent" data-tab-content-id="#DebugToolbarTabConfig">Config</a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.sql?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabSQLContent" data-tab-content-id="#DebugToolbarTabSQL">SQL<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['count_queries'], ENT_QUOTES, 'UTF-8');?>
 queries <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['time_queries'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.cache_queries?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabCacheQueriesContent" data-tab-content-id="#DebugToolbarTabCacheQueries">Cache queries<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['count_cache_queries'], ENT_QUOTES, 'UTF-8');?>
 queries <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['time_cache_queries'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.logging?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabLoggingContent" data-tab-content-id="#DebugToolbarTabLogging">Logging</a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.templates?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabTemplatesContent" data-tab-content-id="#DebugToolbarTabTemplates" >Templates<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['count_tpls'], ENT_QUOTES, 'UTF-8');?>
 included templates</small></a></li>
            <li><a class="cm-ajax cm-ajax-cache" href="<?php echo htmlspecialchars(fn_url("debugger.blocks?debugger_hash=".((string)$_smarty_tpl->tpl_vars['debugger_hash']->value)), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="DebugToolbarTabBlocksContent" data-tab-content-id="#DebugToolbarTabBlocks">Blocks<small><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['blocks_rendered'], ENT_QUOTES, 'UTF-8');?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['blocks_from_cache'], ENT_QUOTES, 'UTF-8');?>
 from cache) blocks rendered in <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['blocks_time'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></a></li>
        </ul>
        <div class="deb-down-wrap">
        <div class="deb-down-content">
            <p class="deb-down-help-text">
            Ctrl+Alt+D - show/hide toolbar
        </p>
        </div>
        <ul class="deb-resource-usage">
            <li>Page generating time <small><?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['time_page'],"4"), ENT_QUOTES, 'UTF-8');?>
 s</small></li>
            <li>Memory usage <small><?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['totals']->value['memory_page'],"2","."," "), ENT_QUOTES, 'UTF-8');?>
 KB</small></li>
        </ul>
        </div>
    </div>
    <!--Sever tab-->
    <div class="deb-tab" id="DebugToolbarTabServer">
        <div class="deb-tab-title">
            <h1>Server</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabServerContent">
        </div>
    </div>

    <!--Request tab-->
    <div class="deb-tab" id="DebugToolbarTabRequest">
        <div class="deb-tab-title">
            <h1>Request</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabRequestContent">
        </div>
    </div>

    <!--Config tab-->
    <div class="deb-tab" id="DebugToolbarTabConfig">
        <div class="deb-tab-title">
            <h1>Config</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabConfigContent">
        </div>
    </div>

    <!--SQL tab-->
    <div class="deb-tab" id="DebugToolbarTabSQL">
        <div class="deb-tab-title">
            <h1>SQL</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabSQLContent">
        </div>
    </div>

    <!--Cache queries tab-->
    <div class="deb-tab" id="DebugToolbarTabCacheQueries">
        <div class="deb-tab-title">
            <h1>Cache queries</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabCacheQueriesContent">
        </div>
    </div>    

    <!--Logging tab-->
    <div class="deb-tab" id="DebugToolbarTabLogging">
        <div class="deb-tab-title">
            <h1>Logging</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabLoggingContent">
        </div>
    </div>

    <!--Templates tab-->
    <div class="deb-tab" id="DebugToolbarTabTemplates">
        <div class="deb-tab-title">
            <h1>Templates</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabTemplatesContent">
        </div>
    </div>

    <!--Blocks tab-->
    <div class="deb-tab" id="DebugToolbarTabBlocks">
        <div class="deb-tab-title">
            <h1>Blocks</h1>
            <a href="#" class="deb-close">&#10006;</a>
        </div>
        <div class="deb-tab-content" id="DebugToolbarTabBlocksContent">
        </div>
    </div>
    </div>
</div><?php }?><?php }} ?>
