<?php

/*
 * @version             2.0.0
 * @package             Apas Theme
 * @copyright			Copyright (C) 2015 schefa.com. All rights reserved.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );


$app        = JFactory::getApplication();
$doc		= JFactory::getDocument();
$template   = $app->getTemplate(true);
$params     = $template->params;

?>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

<link rel="shortcut icon" href="<?php echo JURI::current(true); ?>/images/favicon.ico" />

<link rel="stylesheet" href="<?php echo ( $this->baseurl.'/templates/'.$this->template.'/css/bootstrap/bootstrap.min.css' ); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo ( $this->baseurl.'/templates/'.$this->template.'/css/template.css' ); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo ( $this->baseurl.'/templates/'.$this->template.'/css/custom.css?'.time() ); ?>" type="text/css" />

<style type="text/css">

body,#apas-footer
{background-color:<?php echo $params->get("bgcolor1"); ?>;}
.apas-header,.apas-maincontent
{background-color:<?php echo $params->get("bgcolor2", "#37769E"); ?>;}
.apas-module-sidebar h3,.navigation-bottom
{background-image:linear-gradient(#66A6CF 0%, <?php echo $params->get("bgcolor2", "#37769E"); ?> 100%);}
.apas-content-outer,.sidebar-offcanvas > div,.apas-breadcrumbs ul
{background-color:<?php echo $params->get("bgcolor3"); ?>;}
.navigation-top
{background-color:<?php echo $params->get("bgcolor4"); ?>;}
.sidebar-offcanvas h3,.navigation-bottom
{background-color:<?php echo $params->get("bgcolor5"); ?>;}

body
{color:<?php echo $params->get("color1"); ?>;}
#apas-footer
{color:<?php echo $params->get("color2"); ?>;}
body a
{color:<?php echo $params->get("color3","#73A9D1"); ?>;}

.apas-nav ul ul,.navigation-top div > ul > li > a,.navigation-top div > ul > li > span,.navigation-top
{border-color:<?php echo $params->get("bordercolor1","#DDDDDD"); ?>!important;}
.apas-module-sidebar,.apas-content-outer,.apas-breadcrumbs,#content-outer,.navigation-bottom,.navigation-bottom div > ul > li > *,.navigation-bottom div > ul > li:first-child *
{border-color:<?php echo $params->get("bordercolor2","#EEEEEE"); ?>!important;}
#apas-footer h3
{border-color:<?php echo $params->get("bordercolor3","#444444"); ?>;}

</style>

<?php

if($params->get("jquery", 0) == 1)
{  
    $doc->addScript("http://code.jquery.com/jquery-1.11.0.min.js");
    $doc->addScript("http://code.jquery.com/jquery-migrate-1.2.1.min.js");
} 

$offcanvas = '
jQuery(document).ready(function ($) {
  $("[data-toggle=\"offcanvas\"]").click(function () {
    var id = $(this).data("id");
    var targetClass = $(this).data("class");
    $(id).closest(".offcanvas").toggleClass(targetClass)
  });
});
';
$doc->addScriptDeclaration( $offcanvas );
?>
