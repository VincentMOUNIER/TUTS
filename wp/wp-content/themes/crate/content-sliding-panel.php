<?php
/**
 * The file is for displaying the sliding panel.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *  
 *   
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

?>

<div id="panel" class="panelintro hide-for-small">
		  	
	<div class="holder">

		<?php dynamic_sidebar( 'Sliding Panel Sidebar' );  ?>

	</div><!-- END .holder -->
	
</div><!-- END #panel -->