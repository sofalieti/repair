<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

fn_register_hooks(
	'before_dispatch',
	'get_blocks_pre'
);