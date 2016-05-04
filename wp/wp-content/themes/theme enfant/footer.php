<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package AlbinoMouse
 */

$layout    = get_theme_mod( 'footer-layout', '3col' );
$love      = get_theme_mod( 'love', '1' );
$copyright = get_theme_mod( 'copyright', '' );
?>

	</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-print" role="contentinfo">
		<div class="container">

			<div id="footer-widgets" class="row">

				<table>
          <tr>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_LEFOYER.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_emmaeus.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_ANCIELA.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_MAISONDESSOLIDARITES.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_HI.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_CROIXROUGE.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_FB.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_HABITAT.jpg"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_RCFLYON.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_PETITSFRERES.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_SCD.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_UNICEF.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_CONSEIL.png"></td>
            <td><img alt="" class="img-responsive" src ="<?php bloginfo('template_directory');?>/img/LOGO_AFEV.png"></td>

          </tr>
        </table>

			</div><!-- #footer-widgets -->

			<div class="site-info">
				<?php do_action( 'albinomouse_credits' ); ?>

				<?php if( ! isset( $love ) || $love == '1' ) : ?>
					<a href="<?php _e( 'https://wordpress.org/themes/albinomouse', 'albinomouse' ); ?>"><?php _e( 'AlbinoMouse WordPress Theme', 'albinomouse' ); ?></a>,
				<?php endif ?>

				<?php if( ! isset( $copyright ) || $copyright == '' ) {
						printf( _x( '&#169; Copyright %1$s %2$s', '1: year 2: Site name', 'albinomouse' ), date( 'Y' ), bloginfo( 'name' ) );
					} else {
						echo $copyright;
					} ?>

			</div><!-- .site-info -->

		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
