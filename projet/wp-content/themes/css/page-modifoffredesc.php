<?php /* Template Name: Modif Desc Offre */ ?>
<?php if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} ?>
<?php acf_form_head(); ?>
<?php get_header('aide'); ?>
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
            // acf_form, il s'agit ici de la méthode V4, voir ensuite le hook prepost dans functions.php , le field group concerné est le 60 pour l'instant
            // Je pense et c'est sûr, qu'il va falloir mettre tout les id field group
            // le id est trouvable dans l'url lorsqu'on edit un field group dans le back office de WP et le menu d'ACF
            acf_form(array(
					'post_id'	=> $_POST['post_id'],
					'field_groups'	=> array( 60 ),
					'submit_value'	=> 'Mettre à jour'
				)); ?>

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
