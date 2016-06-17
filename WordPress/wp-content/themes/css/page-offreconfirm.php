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
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
        <!-- Partie identification -->
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>


              <?php

              //TODO Verifie que le post appartient à l'utilisateur connecté, sinon tu l'envoie se faire foutre. SI c'est bien l'utilisateur concerné, affiche lui les informations du post

              $fields = get_fields($_GET['post_id']);



              ?>
              <table>

                <tr>
                  <td>
                    Nom de l'association/collectif
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Adresse
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Moyen d'accès
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>


                <tr>
                  <td>
                    Titre de l'offre
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Description
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Type d'experience
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Accessibilité
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Lieu
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Moyen d'accès
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Details d'accès
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Nom référent
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Prénom référent
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Fonction référent
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Téléphone référent
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>

                <tr>
                  <td>
                    Dates
                  </td>
                  <td>
                    resultat
                  </td>
                </tr>




              </table>
              <?php
              //TODO Faire un link pour un pdf




              ?>
            <?php endwhile; ?>
            <form action="offre-valid" method="post">
              <input type="hidden" name="post_id" value="<?=$_GET['post_id']?>">
              <button type="submit" class="btn btn-default btn-lg" role="button">Valider</button>
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
