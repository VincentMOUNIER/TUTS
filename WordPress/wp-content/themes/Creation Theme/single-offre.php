<?php /* Template Name: Offre */ ?>
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

              <?php
              $fields = get_fields();

              if( $fields )
              {
                foreach( $fields as $field_name => $value )
                {
                  $field = get_field_object($field_name);

                  // on traite le cas d'un champ de type taxonomie
                  if ($field['type'] == "taxonomy") {
                    ?>
                    <div>
                      <h3> <?php echo $field['label']; ?> </h3>
                      <?php
                      if( $value ):
                        foreach( $value as $term ): ?>
                        <h5><?php echo $term->name; ?></h5>
                        <p><?php echo $term->description; ?></p>
                        <a href="<?php echo get_term_link( $term ); ?>">Voir toutes les offres de type '<?php echo $term->name; ?>' </a>

                      <?php endforeach; ?>

                    </div>
                  <?php endif;


                } else {
                  // on traite le cas d'un champ classique
                  echo '<div>';
                  echo '<h3>' . $field['label'] . '</h3>';

                  echo $value;
                  echo '</div>';
                }
              }
            }





            ?>

            <div class="text-center">
              <form method="post" action="inscription-benevole">
                <input type="hidden" name="post_id" value=<?= get_the_ID(); ?>/>
              <button type="submit" class="btn btn-primary">S'inscrire</button>
              </form>
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
