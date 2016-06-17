<?php /* Template Name: Valider offre */ ?>
<?php
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} else {
  $post = get_post($_POST['post_id']);
  $post_user = $post->post_author;
  $current_user = wp_get_current_user();
  if ($current_user->ID != $post_user) {
    wp_redirect( get_permalink( $post->post_parent )); exit;
  }
}


?>
<?php get_header('aide');?>

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
            <?php
            //TODO Changer draft into publish $_POST['post_id']
            $title = get_field("titre_de_lexperience", $_POST['post_id']);
            $current_post = array (
            'ID' => $_POST['post_id'],
            'post_status' => 'publish',
            'post_title' => $title
          );

          wp_update_post($current_post);

          ?>

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
              Votre offre a été publié

              <a href="<?=get_page_link(110)?> ">Cliquez ici</a> Pour retourner sur votre compte
            <?php endwhile; ?>
            <form action="<?=get_page_link(221)?>" method="post">
              <input type="hidden" name="post_id" value="<?=$_POST['post_id']?>">
              <button class="btn btn-primary" type="submit" role="button"> Telecharger un PDF </button>
            </form>
            



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
