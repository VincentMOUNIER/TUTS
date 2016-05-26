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

  <div class="container-fluid conteneur">

    <div class="row">

      <div class="col-lg-2 contenu aside">

        <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
      </div>

      <div class="col-lg-8 contenu texte_contenu">
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
        <!-- Partie identification -->
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

              <h2 class="text-center"> Boite à outils </h2>
              <div id="pdf-tools">
                <?php

                $upload_dir = wp_upload_dir();

                // recursiveListTool va prendre en parametre la basedir (directory) et la baseurl ( url ) car elle va chercher les pdf
                // uploadé via le menu de wordpress, il faut penser a definir comment choisir les bons pdf ( mettre un tool-*.pdf par exemple )
                recursiveListTool($upload_dir['basedir'],$upload_dir['baseurl']);





                ?>


              </div> <!-- End div pdf tools -->
              <div class="row">


                <div class=" text-center"><a href="mes-offres" class="btn btn-default btn-lg" role="button">Mes Offres d'Experiences</a></div>
              </div>
            <?php endwhile; ?>

          </div><!-- #content -->
        </div><!-- #primary -->
      </div>

      <div class="col-lg-2 contenu aside">
        <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
      </div>
    </div>
    <!-- Row -->

    <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

    <div class="clear">

    </div>

    

  </div>
  <script>

  </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



  <script src="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
  <?php get_footer(); ?>
