<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/
 $schema['PopupAndSideOut'] = array ( 
        'content' => array(
		
			  'PageLink' => array(
                'type' => 'input',
                'required' => true,
            ),
            'content' => array(
                'type' => 'text',
                'required' => true,            
			)
        ),
       'templates' => array(
            
		'blocks/html_block.tpl' => array(),
        'addons/PopupAndSideOut/blocks/html_block_popup.tpl' => array(),
		'addons/PopupAndSideOut/blocks/html_block_sideout.tpl' => array(),
		'addons/PopupAndSideOut/blocks/html_block_form.tpl' => array()
        ),
        'wrappers' => 'blocks/wrappers',
        'cache' => true,
        'multilanguage' => true,
    );
	
	


return $schema;
