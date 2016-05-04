<?php
/**
 * The template for displaying the footer
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

bean_content_end(); ?>

			</div><!-- END .twelve.columns -->

		</div><!-- END .row -->

	</div><!-- END .wrapper --> 

	<?php get_template_part( 'content', 'mobile-sidebar' ); ?>

</div><!-- END .viewport -->

<footer class="<?php if( get_theme_mod('show_sliding_panel') ) {  echo 'panel-on'; } ?>">
	<p><?php 
		if ( get_theme_mod( 'footer_copyright') ) {  
			echo get_theme_mod( 'footer_copyright'); 
		} else {
			echo '&copy; '.date("Y").' <a href="http://themebeans.com/theme/crate">Crate</a>';
		}?>

		<?php if( get_theme_mod('enable_totop') ) { ?>
			<a href="#header" class="back-to-top">Back to Top</a>
		<?php } ?>
	</p>
</footer><!-- END footer -->

<?php bean_body_end(); //PULLS DEBUG INFO ?>  

<?php wp_footer(); ?>

<!--<?php echo ''. BEAN_THEME_NAME .' WordPress Theme (ThemeBeans.com) with '. $wpdb->num_queries .' queries in '. timer_stop(0, 2) .' seconds'; ?>-->

</body>
</html>