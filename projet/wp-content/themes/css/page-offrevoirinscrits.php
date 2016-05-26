<?php /* Template Name: Offre-voirinscrit */ ?>
<?phpif ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} ?>
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
        <p>

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

              <?php
              // $_POST['post_id'] sert à avoir l'id du de l'offre à laquelle on va lister les participants qui attendent la confirmation
              // TODO Alors, on est sur une page et non plus sur une offre donc get_fields ne va pas fonctionner, cependant nous avons l'id de l'offre qu'on observe
              // qui est $_POST['post_id'] du coup il est posstible de recuperer les informations de celui ci Tout ce qui est en bas n'est qu'une pale copie de
              // singe-offre.php, donc TODO VOIR L'OFFRE - Description + inscrits -


              $field = get_field_object("description", $_POST['post_id']);

              echo '<h2>'.$field['label'].'</h2>';
              echo '<p>'.$field['value'].'</p>';


            // TODO Afficher tout les inscrit de l'offre



            ?>



          <?php endwhile; ?>

        </p>
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
      <!-- Container fluid -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

      <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/tuts_script.js"></script>
<?php get_footer(); ?>
