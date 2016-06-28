<?php /* Template Name: Offre */ ?>
<?php acf_form_head(); ?>
<?php get_header('aide');
function child_theme_head_script() { ?>
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
  <?php }
  add_action( 'wp_head', 'child_theme_head_script' );?>
<style>

</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

  <div class="container-fluid conteneur">
    <div class="row">
      <div class="col-lg-2 contenu aside">
        <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
      </div>
      <div class="col-lg-8 contenu texte_contenu">
        <p>

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>




              <H1> Details de l'expérience </H1>
              <div class="row presentation_offre">
              <div class="row"> <H2> <?=the_field("titre_de_lexperience")?> </H2></div>
              <div class="row">
                <H3> Description : </H3>
                <?=the_field("definition")?>
                <p> Mot-clés :
                  <?php $field = get_field_object("type_dexperience"); // On obtient un field object ( voir doc acf )
                // on traite le cas d'un champ de type taxonomie
                    if( $field['value'] ):
                      foreach( $field['value'] as $term ): ?>

                        — <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?>  </a>

                    <?php endforeach; ?>
                  <?php endif; ?>
              </p>
              </div>

            </div>
            <div class="row">
            <div class="details_pratiques col-lg-5">
              <H3> Details Pratiques </H3>
              <H4> Accessibilité </H4>

                <ul>
              <?php $accessibilite = get_field("accessibilite");
              if (is_array($accessibilite)) {
                if (in_array("Mineur", $accessibilite)) {
                  echo '<li>Accessible aux <strong> personnes mineures</strong> </li>';
                } else {
                  echo '<li> N\'est pas accessible aux <strong> personnes mineures</strong> </li>';
                }
                if (in_array("Handicap", $accessibilite)) {
                  echo '<li> Accessible aux personnes possédant un <strong> handicap </strong> </li>';
                } else {
                  echo '<li> N\'est pas accessible aux personnes possédant un <strong> handicap </strong> </li>';
                }
            } else {
              echo '<li> N\'est pas accessible aux personnes mineurs </li>';
              echo '<li> N\'est pas accessible aux personnes possédant un handicap </li>';
            }
            ?></ul>

            <!-- /////// (DEBUT) Affichage de la google map //////// -->

            <H4> Lieu </H4>
            <?php $location = get_field("adresse_de_l_experience"); ?>
            <p> <?=$location['address']?> </p>
            <div class="acf-map">
	            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
             </div>

             <!-- /////// (FIN) Affichage de la google map //////// -->


             <H4> Moyen d'accès </H4>
             <?php $moyenAcces = get_field("moyen_dacces");
              if (is_array($moyenAcces)) {
                echo "<p>";
                echo implode(", ", $moyenAcces);
                echo "</p>";
                $detailAcces = get_field("moyen_detail");
                echo '<div class="well">';
                echo $detailAcces;
                echo "</div>";
              } else {
                echo "Non renseigné";
              }
             ?>
            </div>

            <div class="col-lg-offset-2 col-lg-5">
              <H3> Association/Collectif </H3>

              <?php
              $authorID = get_the_author_id();
              global $wpdb;
              $associationRow = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association where id_user = '$authorID'");
              ?>
              <div class="row">

                <div class="col-lg-4">
                  <?=wp_get_attachment_image($associationRow->logo)?>
                </div>
                <div class="col-lg-8">
                  <p><strong>Nom :</strong> <?=$associationRow->nom?></p>
                  <p><strong>Adresse :</strong> <?=$associationRow->adresse?></p>
                </div>




              </div>
              <div class="row">
              <H3> Dates disponibles </H3>
              <?php
              if (have_rows("date")) {  // Cas d'un repeater "date" est le nom du repeater
                ?>
                <ul>
                  <?php
                  while (have_rows("date"))  {
                    the_row();                                                    // On recupere chaque element du repeater : à savoir la date,
                    $date = get_sub_field('date');                                // l'heure de debut, l'heure de fin et le nb de places
                    $heureDebut = get_sub_field('heure_de_debut');
                    $heureFin = get_sub_field('heure_de_fin');
                    $nbPlaces = get_sub_field('nombre_de_places_disponibles');

                    // Ensuite on les affiche un par un dans un liste (?) il faut aussi verifier s'il s'agit de celui qui a poster l'offre

                    echo '<li> '. $date . ' de '. $heureDebut . ' à '. $heureFin . ' pour environ ' . $nbPlaces .' personnes.</li>';
                  }
                }
                ?>
              </ul>
            </div>
            </div>
          </div>



            <div class="text-center">
              <form method="post" action="<?php echo esc_url( get_permalink( get_page_by_title( 'Inscription Bénévole' ) ) ); ?>">
                <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
              <button type="submit" class="btn btn-primary">S'inscrire</button>
              </form>
            </div>



          <?php endwhile; ?>

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
