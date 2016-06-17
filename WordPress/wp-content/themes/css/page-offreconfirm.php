<?php /* Template Name: Confirmation offre */ ?>
<?php
// Le morceau de code sert a verifier que le visiteur a le droit de consulter la page
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
} else {
  $post = get_post($_GET['post_id']);
  $post_user = $post->post_author;
  $current_user = wp_get_current_user();
  if ($current_user->ID != $post_user) {
    wp_redirect( get_permalink( $post->post_parent )); exit;
  }
}


?>
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
        <h1 class="post-title" id="titre">Récapitulatif de l'offre</h1>
        <!-- Partie identification -->
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>


              <?php

              //TODO Verifie que le post appartient à l'utilisateur connecté, sinon tu l'envoie se faire foutre. SI c'est bien l'utilisateur concerné, affiche lui les informations du post

              $fields = get_fields($_GET['post_id']);


              $post = get_post($_GET['post_id']);
              global $wpdb;
              setup_postdata( $post );
              $author = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}tuts_association where id_user = '$post->post_author'");



              ?>
              <table class="table-striped table">

                <tr>
                  <td>
                    Nom de l'association/collectif
                  </td>
                  <td>
                    <?php echo ($author->nom);?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Titre de l'offre
                  </td>
                  <td>
                    <?php the_field("titre_de_lexperience") ?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Adresse
                  </td>
                  <td>
                    <?php the_field("adresse_de_l_experience");?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Moyen d'accès
                  </td>
                  <td>
                    <?php
                    $moyenAcces = get_field("moyen_dacces");
                    if (is_array($moyenAcces)) {
                      echo (implode(", ", $moyenAcces));
                      $detailAcces = get_field("moyen_detail");
                      echo '<tr><td>Details d\'accès</td><td>'.$detailAcces.'</td></tr>';

                    } else {
                      echo "Non renseigné";
                    }

                    ?>
                  </td>
                </tr>



                <tr>
                  <td>
                    Description
                  </td>
                  <td>
                    <?php the_field("definition") ?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Type d'experience
                  </td>
                  <td>
                    <?php
                    $type = get_field_object("type_dexperience");
                    foreach( $type['value'] as $term ):
                      $stringtype .= "- ".$term->name."\n";
                    endforeach;
                      echo $stringtype;
                     ?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Accessibilité
                  </td>
                  <td>
                    <?php
                    $accessibilite = get_field("accessibilite");
                    if (is_array($accessibilite)) {
                      if (in_array("Mineur", $accessibilite)) {
                        $stracces.= "- Accessible aux personnes mineures \n";
                      } else {
                        $stracces .= "- N'est pas accessible aux personnes mineures \n";
                      }
                      if (in_array("Handicap", $accessibilite)) {
                        $stracces .= "- Accessible aux personnes possédant un handicap \n";
                      } else {
                        $stracces .= "- N'est pas accessible aux personnes possédant un handicap \n";
                      }
                    } else {
                    $stracces .= "- N'est pas accessible aux personnes mineurs \n";
                    $stracces .= "- N'est pas accessible aux personnes possédant un handicap \n";
                    }
                    echo $stracces;
                    ?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Lieu
                  </td>
                  <td>
                    <?php
                    $location = get_field("adresse_de_l_experience");
                    echo ($location['address']);

                     ?>
                  </td>
                </tr>


                <tr>
                  <td>
                    Nom référent
                  </td>
                  <td>
                    <?php the_field("nom_du_referent");?>

                  </td>
                </tr>

                <tr>
                  <td>
                    Prénom référent
                  </td>
                  <td>
                    <?php the_field("prenom_du_referent"); ?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Fonction référent
                  </td>
                  <td>
                    <?php the_field("fonction_du_referent");?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Téléphone référent
                  </td>
                  <td>
                    <?php the_field("telephone_du_referent");?>
                  </td>
                </tr>

                <tr>
                  <td>
                    Dates
                  </td>
                  <td>
                    <?php
                      if (have_rows("date")) {  // Cas d'un repeater "date" est le nom du repeater
                        while (have_rows("date"))  {
                          the_row();                                                    // On recupere chaque element du repeater : à savoir la date,
                          $date = get_sub_field('date');                                // l'heure de debut, l'heure de fin et le nb de places
                          $heureDebut = get_sub_field('heure_de_debut');
                          $heureFin = get_sub_field('heure_de_fin');
                          $nbPlaces = get_sub_field('nombre_de_places_disponibles');

                          // Ensuite on les affiche un par un dans un liste (?) il faut aussi verifier s'il s'agit de celui qui a poster l'offre

                          $strdate .= "- ". $date . " de ". $heureDebut . " à ". $heureFin . " pour environ " . $nbPlaces ." personnes.";
                          $strdate .= "</br>";
                        }

                        echo $strdate;
                      } else {
                        echo "Non renseigné";
                      }

                      ?>
                  </td>
                </tr>




              </table>
              <?php
              //TODO Faire un link pour un pdf




              ?>
            <?php endwhile; ?>
            <h3> Votre offre est elle correcte ? </h3>
            <form action="offre-valid" method="post">
              <input type="hidden" name="post_id" value="<?=$_GET['post_id']?>">
              <button type="submit" class="btn btn-success btn-lg" role="button">Valider</button>
              <button style ="display:inline"class="btn btn-warning btn-lg" onclick="history.go(-1)"> Modifier </button>
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
