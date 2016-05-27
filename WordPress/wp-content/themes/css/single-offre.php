<?php /* Template Name: Offre */ ?>
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
        <p>

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
                        <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> </a>

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
                //TODO Traiter les champs spéciaux


              }
            }
            echo '<div>';
            echo '<h3>Une offre proposée par ' . the_author() . '.</h3>';
            echo '</div>';




            ?>

            <div class="text-center">
              <form method="post" action="<?php echo esc_url( get_permalink( get_page_by_title( 'Inscription Bénévole' ) ) ); ?>">
                <input type="hidden" name="post_id" value=<?= get_the_ID(); ?>/>
              <button type="submit" class="btn btn-primary">S'inscrire</button>
              </form>
            </div>



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
