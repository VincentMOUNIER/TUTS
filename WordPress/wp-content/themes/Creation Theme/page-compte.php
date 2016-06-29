<?php /* Template Name: Mon Compte */ ?>
<?php
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
}
?>
<?php acf_form_head(); ?>
<?php get_header('aide');
function child_theme_head_script() { ?>
	<link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
<?php }
add_action( 'wp_head', 'child_theme_head_script' );?>

<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <h2 class="text-center"> Boite à outils </h2>
            <div id="pdf-tools">
            <?php

          the_content();





            ?>


          </div> <!-- End div pdf tools -->
          <div class="row">


          <div class=" text-center"><a href="mes-offres" class="btn btn-default btn-lg" role="button">Mes Offres d'Experiences</a></div>
        </div>
          <?php endwhile; ?>

        </div><!-- #content -->
      </div><!-- #primary -->
    </div>
  </div>
</div>
<script>

</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



<script src="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
