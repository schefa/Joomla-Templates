<?php

/*
 * @version             2.0.0
 * @package             Ananda Theme
 * @copyright			Copyright (C) 2015 schefa.com. All rights reserved.
*/

$app        = JFactory::getApplication();
$doc		= JFactory::getDocument();
$template   = $app->getTemplate(true);
$this->params     = $template->params;

?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    
    <link rel="shortcut icon" href="<?php echo JURI::current(true); ?>/images/favicon.ico" />
    
    <link rel="stylesheet" href="<?php echo ( $this->baseurl.'/templates/'.$this->template.'/css/bootstrap/bootstrap.min.css' ); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo ( $this->baseurl.'/templates/'.$this->template.'/css/template.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo ( $this->baseurl.'/templates/'.$this->template.'/css/custom.css?'.time() ); ?>" type="text/css" />
    
    <style type="text/css">
    
    body,#ananda-footer
    {background-color:<?php echo $this->params->get("bgcolor1"); ?>;}
    .ananda-maincontent
    {background-color:<?php echo $this->params->get("bgcolor2"); ?>;}
    .ananda-header,.ananda-content-outer,.sidebar-offcanvas > div,.ananda-breadcrumbs ul
    {background-color:<?php echo $this->params->get("bgcolor3"); ?>;}
    .navigation-top
    {background-color:<?php echo $this->params->get("bgcolor4"); ?>;}
    .sidebar-offcanvas h3,.navigation-bottom
    {background-color:<?php echo $this->params->get("bgcolor5"); ?>;}
    
    body
    {color:<?php echo $this->params->get("color1"); ?>;}
    #ananda-footer
    {color:<?php echo $this->params->get("color2"); ?>;}
    
    .ananda-nav ul ul,.navigation-top div > ul > li > a,.navigation-top div > ul > li > span,.navigation-bottom,.navigation-top,.ananda-search .inputbox,.ananda-nav div > ul > li:first-child > a,.ananda-nav div > ul > li:first-child > span,.ananda-nav div > ul > li > a,.ananda-nav div > ul > li > span
    {border-color:<?php echo $this->params->get("bordercolor1","#DDDDDD"); ?>;}
    .ananda-module-sidebar,.ananda-content-outer,.ananda-breadcrumbs,#content-outer
    {border-color:<?php echo $this->params->get("bordercolor2","#EEEEEE"); ?>;}
    #ananda-footer h3
    {border-color:<?php echo $this->params->get("bordercolor3","#444444"); ?>;}
    
    </style>
    
    <?php
    
    if($this->params->get("jquery", 0) == 1)
    {  
        $doc->addScript("http://code.jquery.com/jquery-1.11.0.min.js");
        $doc->addScript("http://code.jquery.com/jquery-migrate-1.2.1.min.js");
    } 
    
    $offcanvas = 'jQuery(document).ready(function ($) {
      $("[data-toggle=\"offcanvas\"]").click(function () {
        var id = $(this).data("id");
        $(this).closest(".offcanvas").toggleClass(id)
      });
    });';
    $doc->addScriptDeclaration( $offcanvas );
    ?>
	