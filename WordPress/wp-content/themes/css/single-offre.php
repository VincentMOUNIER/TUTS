<?php /* Template Name: Offre */ ?>
<?php acf_form_head(); ?>
<?php get_header('aide');
function child_theme_head_script() { ?>
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
  <?php }
  add_action( 'wp_head', 'child_theme_head_script' );?>
<style>
.details_pratiques {

}
.presentation_offre{
  padding:0 5em 0 5em;
  text-align: left;
}
</style>
<style type="text/css">

.acf-map {
	width: 100%;
	height: 400px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

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

              <!-- <?php
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
                  if (is_array($value)){                  // La valeur obtenue est sous la forme d'un array quelques fois
                    if ($field['type']=="google_map"){ // Le cas d'un google_map
                      echo $value['address'];
                    } elseif ($field['type']=="repeater"){ // le cas d'un repeater
                      if (have_rows($field['name'])) {
                        ?>
                        <ul>
                          <?php
                          while (have_rows($field['name']))  {
                            the_row();                                                    // On recupere chaque element du repeater : à savoir la date,
                            $date = get_sub_field('date');                                // l'heure de debut, l'heure de fin et le nb de places
                            $heureDebut = get_sub_field('heure_de_debut');
                            $heureFin = get_sub_field('heure_de_fin');
                            $nbPlaces = get_sub_field('nombre_de_places_disponibles');

                            // Ensuite on les affiche un par un dans un liste (?) il faut aussi verifier s'il s'agit de celui qui a poster l'offre

                            echo '<li> '. $date . ' de '. $heureDebut . ' à '. $heureFin . ' pour environ ' . $nbPlaces .' personnes.</li>';
                          }
                          ?>
                        </ul>
                        <?php
                      } else {
                        echo "norow";
                      }
                    }
                    else{
                      echo implode(", ",$value); // on traite le cas de checkbox par exemple
                    }
                  }else {
                    echo $value; // Cas classique "champ texte"
                    if ($field['name']=="titre_de_lexperience") {
                      $titre = $value ;
                    }
                  }
                  echo '</div>';
                }
              }
            }
            echo '<div>';
              echo '<h3>Une offre proposée par ' . get_the_author() . '.</h3>';
              echo '</div>';
              ?> -->


              <H1> Details de l'expérience </H1>
              <div class="row presentation_offre">
              <div class="row"> <H2> <?=the_field("titre_de_lexperience")?> </H2></div>
              <div class="row">
                <H3> Description : </H3>
                <?=the_field("definition")?>
                <p> Mot-clés :
                  <?php $field = get_field_object("type_experience"); // On obtient un field object ( voir doc acf )
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
            <p> <?=$location['address']?>
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
             <H4> Dates disponibles </H4>
             <?php
             $date = get_field("date");
             if (have_rows($date['name'])) {
               ?>
               <ul>
                 <?php
                 while (have_rows($date['name']))  {
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
