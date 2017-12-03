<?php 
/**
 *
 * Framework
 *
 * @version             2.0.0
 * @package             Ananda
 * @copyright			Copyright (C) 2014 vonfio.de. All rights reserved.
 *               
 */
  
// No direct access.
defined('_JEXEC') or die;

class ApasTemplate
{
	var $doc;
	var $params;
	
	public function __construct($doc, $params = NULL) {
		$this->doc = $doc;
		$this->params = $params;
	}
			
	public function getNavbarToggle ()
	{
		$html[] = '<button class="btn navbar-toggle visible-xs" data-toggle="offcanvas" data-id=".offcanvas-smartphones" data-class="active-right">';
        $html[] = '<span class="icon-bar"></span>';
        $html[] = '<span class="icon-bar"></span>';
        $html[] = '<span class="icon-bar"></span>';
        $html[] = '</button>';
		echo implode("\n", $html);
	}
				
	public function getModule ( $name, $class ="apas-module", $style = "xhtml" )
	{
		if( $this->doc->countModules($name) )
		{
			echo '<div class="'.$class.'"><jdoc:include type="modules" name="'.$name.'" style="'.$style.'" /></div>';
		}
	}

    public function getModulesContainer($modules = array(), $prefix = "col-sm-", $containerClass = "apas-module-container" )
    { 
	
 		$count		= count($modules);
 
 		foreach($modules AS $key => $value) {
			if(!$this->doc->countModules($key)) {
				$count--;
				unset($modules[$key]);
			}
		}
        
		if(!empty($modules) && ($count <= 6)) {
			
			$count = (int) ( 12 / $count );
			
			echo '<div class="'.$containerClass.'"><div class="row">';
			
			foreach($modules AS $key => $value)
			{
				echo '<div class="'.$prefix .	$count	.'">';
				self::getModule( $key, 'apas-module apas-'.$key , $value );
				echo '</div>';
			}
				
			echo '</div></div>';
			
		}
		
	}
	
	public function getSidebarModule ( $name, $content_width, $toggleTitle )
	{
		if( $this->doc->countModules($name) )
		{ ?>
            <div class="offcanvas-btn offcanvas-btn-<?php echo $name; ?> visible-xs" data-toggle="offcanvas" data-id="#<?php echo $name; ?>-sidebar" data-class="active-<?php echo $name; ?>"><?php echo $toggleTitle; ?></div>
            <div class="col-sm-<?php echo $content_width[0]; ?> sidebar-offcanvas offcanvas-<?php echo $name; ?>" id="<?php echo $name; ?>-sidebar">
                <jdoc:include type="modules" name="<?php echo $name; ?>" style="apas_sidebar" />
            </div> 
        <?php
		}
	}

	public function getContentWidth()
	{
	
		$content_width = array();
		if($this->doc->countModules('left') && $this->doc->countModules('right'))
		{
			$content_width = array('3', '6');
		}
		if(($this->doc->countModules('left') && !$this->doc->countModules('right')) or (!$this->doc->countModules('left') && $this->doc->countModules('right')))
		{
			$content_width = array('3', '9');
		}
		if(!$this->doc->countModules('left') && !$this->doc->countModules('right'))
		{
			$content_width = array('0', '12');
		}
		return $content_width;
	}
	
	
	public function getFooter($sitename)
	{
		?>
        <div id="apas-footer">
            <div class="container"><div class="row">
                
                <?php $this->getModulesContainer(array('position-11'=>'apas','position-12'=>'apas','position-13'=>'apas','position-14'=>'apas')); ?>
                <?php self::getModule( "footer", "footer-content textcenter" ); ?>
                <div id="webdesign-by" class="footer-content">designed by <a href="http://www.schefa.com" target="_blank">schefa</a></div>
                
            </div></div>
        </div>
        <?php
	}
	
}