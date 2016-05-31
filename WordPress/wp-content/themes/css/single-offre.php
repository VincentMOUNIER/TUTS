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
                  $field = get_field_object($field_name); // On obtient un field object ( voir doc acf )


                  // on traite le cas d'un champ de type taxonomie
                  if ($field['type'] == "taxonomy") {
                    ?>
                    <div>
                      <h3> <?php echo $field['label']; ?> </h3>
                      <?php
                      if( $value ):
                        foreach( $value as $term ): ?>
                        <h5>
                        <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> </a>
                        </h5>
                      <?php endforeach; ?>
                    </div>
                  <?php endif;


                } else {

                  echo '<div>';
                  echo '<h3>' . $field['label'].'</h3>';
                  if (is_array($value)){
                    if ($field['type']=="google_map"){ // Le cas d'un google_map
                      echo $value['address'];
                    } elseif ($field['type']=="repeater"){ // le cas d'un repeater
                        if (have_rows($field['label'])) {
                          ?>
                          <ul>
                          <?php
                          while (have_rows($field['label']))  {
                            the_row();                                                    // On recupere chaque element du repeater : à savoir la date,
                            $date = the_sub_field('date');                                // l'heure de debut, l'heure de fin et le nb de places
                            $heureDebut = the_sub_field('heure_de_debut');
                            $heureFin = the_sub_field('heure_de_fin');
                            $nbPlaces = the_sub_field('nombre_de_places_disponibles');

                            // Ensuite on les affiche un par un dans un liste (?) il faut aussi verifier s'il s'agit de celui qui a poster l'offre



                            ?>
                            <li> <?=$date?> de <?=$heureDebut?> à <?=$heureFin?> pour <?=$nbPlaces?> </li>
                            <?php
                          }

                          ?>
                          </ul>
                          <?php
                        }
                    }


                    else{

                      echo implode(", ",$value); // on traite le cas de checkbox par exemple
                    }
                  }else {
                  echo $value; // Cas classique "champ texte"
                }
                  echo '</div>';
                }
                //TODO Traiter les champs spéciaux


              }
            }
            echo '<div>';
            echo '<h3>Une offre proposée par ' . get_the_author() . '.</h3>';
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
