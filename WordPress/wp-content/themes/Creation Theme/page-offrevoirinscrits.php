<?php /* Template Name: Offre-voirinscrit */ ?>
<?phpif ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} ?>
<?php get_header('aide');
function child_theme_head_script() { ?>
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
  <?php }
  add_action( 'wp_head', 'child_theme_head_script' );?>

  <div class="row">
    <div class="col-lg-12">
      <div class="main page">
        <h1 class="post-title" id="titre"><?= get_field("titre_de_lexperience",$_POST['post_id']) ?></h1>
        <!-- Partie identification -->
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

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
