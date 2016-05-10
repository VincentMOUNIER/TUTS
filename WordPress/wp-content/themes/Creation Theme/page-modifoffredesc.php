<?php /* Template Name: Modif Desc Offre */ ?>
<?php if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} ?>
<?php acf_form_head(); ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <div id="primary" class="content-area">
    		<div id="content" class="site-content" role="main">

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

    		</div><!-- #content -->
    	</div><!-- #primary -->
  </div>
</div>
</div>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</div>
</div>
</div>
<?php get_footer(); ?>
