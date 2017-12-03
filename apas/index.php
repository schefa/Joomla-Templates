<?php
/*
 * @version             2.0.0
 * @package             Apas Theme
 * @copyright			Copyright (C) 2015 schefa.com. All rights reserved.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
	
$app			= JFactory::getApplication(); 
$doc			= JFactory::getDocument();
$view			= $app->input->getCmd('view', '');
$itemid			= $app->input->getVar('Itemid');
$sitename		= $app->getCfg('sitename');

// Apas Framework
require_once(JPATH_SITE.'/templates/'.$this->template.'/lib/framework.php');
$apas = new ApasTemplate($doc, $this->params);

$logo_image = $this->params->get("logo_image");

// Component Width
$content_width = $apas->getContentWidth();
	
// Pageclass
$menu		= $app->getMenu();
$active		= $menu->getItem($itemid);
if(isset($active->id)) {
	$params 	= $menu->getParams( $active->id );
	$pageclass	= $params->get( 'pageclass_sfx' );
} else {
	$pageclass	= "";	
}
?>
    
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
	<jdoc:include type="head" />
    
    <?php include_once(JPATH_SITE.'/templates/'.$this->template.'/lib/head.php') ?>
    
</head>

<body class="<?php echo $view . '-view ' . $pageclass; ?>">
    
    <div class="offcanvas">
    
        <div class="col-sm-3 offcanvas-smartphones sidebar-offcanvas offcanvas-right visible-xs">
        	<?php $apas->getModule( "mainmenu", "module", "apas_sidebar" ) ?>
            <?php $apas->getModule( "submenu", "module","apas_sidebar" ) ?>
        </div>
        
        <?php
		// Mainmenu & Top
		if( $doc->countModules('mainmenu') || $doc->countModules('top') ) {
		?>
        <nav class="navbar navigation-top navbar-fixed-top apas-nav">
            <div class="container">
                <?php if(!empty($logo_image)) {
					echo '<div class="brand-logo visible-xs"><img src="'.$logo_image.'" /></div>';
				} ?>
        		<?php $apas->getNavbarToggle(); ?>
                <?php $apas->getModule( "mainmenu", "hidden-xs pull-left" ) ?>
                <?php $apas->getModule( "top", "apas-top" ) ?>
            </div>
        </nav>
        <?php } ?>
        
        <?php $apas->getModule( "header", "apas-headerfull" ) ?>
        
        <?php 
		// Logo & Search
		if( !empty($logo_image) || ($doc->countModules('search')) ) {
			if(!empty($logo_image) && ($doc->countModules('search')) ) { 	
				$headerWidth = array("7", "5");
			} else {
				$headerWidth = array("12", "12");
			}
		?>
        <div class="apas-header">
            <div class="container">
                <?php if(!$doc->countModules('mainmenu') && !$doc->countModules('top') ) { $css = ""; } else { $css = " hidden-xs"; } ?>
                <?php if(!empty($logo_image)) {
					echo '<div class="logo col-sm-'.$headerWidth[0].$css.'"><img src="'.$logo_image.'" /></div>';
				} ?>
                <?php $apas->getModule("search","apas-search col-sm-". $headerWidth[1],"none") ?>
            </div>
        </div>
        <?php } ?>
		
        <div class="apas-maincontent">
            
            <div class="container">
            
                <?php $apas->getModulesContainer( array( 'position-1' => 'xhtml', 'position-2' => 'xhtml', 'position-3' => 'xhtml', 'position-3' => 'xhtml', 'position-4' => 'xhtml', 'position-5' => 'xhtml', 'position-6' => 'xhtml' ), "col-sm-", "apas-module-container text-color-light" ); ?>
                
                <div class="apas-content-outer offcanvas clearfix">
                                      
                    <?php
                    // Submenu
                    if( ($doc->countModules('submenu')) || ($doc->countModules('login')) )
                    {
                        if( $doc->countModules('submenu') && ($doc->countModules('login')) ) { 	
                            $navBottomWidth = array("9", "3");
                        } else {
                            $navBottomWidth = array("12", "12");
                        }
                    ?>
                    <div class="navigation-bottom apas-nav <?php if(!$doc->countModules('login') && ($doc->countModules('mainmenu') || $doc->countModules('top'))) { ?>hidden-xs<?php } ?>">
                        <div class="row">
                            <?php $apas->getModule( "submenu", "col-xs-". $navBottomWidth[0] ."  navigation-bottom-inner hidden-xs" ) ?>
                            <?php $apas->getModule( "login", "col-xs-". $navBottomWidth[1] ) ?>
                            <?php $apas->getNavbarToggle(); ?>
                        </div>
                    </div>
                    <?php } ?>
                    

                    <?php $apas->getSidebarModule("left",$content_width, $this->params->get("toggleLeft")); ?>
                    
                    <div class="col-sm-<?php echo $content_width[1]; ?>" id="content-outer">
                    
                        <?php $apas->getModule("banner","apas-banner","none") ?>
        
                        <?php $apas->getModule("breadcrumbs","apas-breadcrumbs") ?>
                        
                        <div id="content">
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </div>
                        
                        <?php $apas->getModulesContainer(array('content-bottom-1'=>'xhtml','content-bottom-2'=>'xhtml','content-bottom-3'=>'xhtml')); ?>
                 
                    </div>
                
                    <?php $apas->getSidebarModule("right",$content_width, $this->params->get("toggleRight")); ?>
                       
                     
                </div> 
                
				<?php $apas->getModulesContainer( array( 'position-7' => 'xhtml', 'position-8' => 'xhtml', 'position-9' => 'xhtml', 'position-10' => 'xhtml' ), "col-sm-", "apas-module-container text-color-light" ); ?>
                            
            </div>
              
        </div>
        
        <?php $apas->getFooter($sitename); ?>
                     
    </div>
    
</body>
</html>