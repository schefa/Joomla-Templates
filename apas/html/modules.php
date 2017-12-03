<?php 
/**
 *
 * modules view
 *
 * @version             1.0.0
 * @package             Apas Theme
 * @copyright			Copyright (C) 2015 schefa.com. All rights reserved.
 *               
 */
 
// No direct access. 
defined('_JEXEC') or die;


function modChrome_apas_sidebar( $module, &$params, &$attribs )
{
	
	$headerLevel = (isset( $attribs['headerLevel'] )) ? $attribs['headerLevel'] : 3;
	
	echo '<div class="apas-module-sidebar' .$params->get( 'moduleclass_sfx' ) .'" >';
	 
		if ($module->showtitle) 
			echo '<h' .$headerLevel .'>' .$module->title .'</h' .$headerLevel .'>';
 
    	echo '<div class="apas-module-inside '.$module->module.'">' . $module->content . '</div>';
 
    echo '</div>';
}


function modChrome_apas ( $module, &$params, &$attribs )
{
	
	$class			= (isset( $attribs['class'] )) ? $attribs['class'] : "apas-module";
	$headerLevel	= (isset( $attribs['headerLevel'] )) ? $attribs['headerLevel'] : 3;
	
	$document	= JFactory::getDocument();
	if( $document->countModules($attribs['name']) ) {
			
		echo '<div class="module'. $params->get( 'moduleclass_sfx' ) . ' ' . $class .'" >';
		 
			if ($module->showtitle)
				echo '<h' .$headerLevel .'>' .$module->title .'</h' .$headerLevel .'>';
	 
			echo '<div class="module-inside">' . $module->content . '</div>';
	 
		echo '</div>';
	}
}

?>