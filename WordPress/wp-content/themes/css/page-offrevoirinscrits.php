<?php /* Template Name: Offre-voirinscrit */ ?>
<?php
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
}

get_header('aide');
?>

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

              $post_id = $_POST['post_id'];
              $offre = get_post($post_id);
              echo '<h2>';
              echo 'Bénévole de l\'offre ';
              echo '</h2>';


              echo '<h3>"';
              echo $offre->post_title;
              echo '"</h3>';


            // TODO Afficher tout les inscrit de l'offre

            global $wpdb;

            $selection = $wpdb->get_results(" SELECT * FROM {$wpdb->prefix}tuts_inscription WHERE id_offre = '$post_id' ");
              echo '<table id="datatable">';
              echo '<thead>';
              echo '<tr>';

              echo '<th>';
              echo 'Nom';
              echo '</th>';

              echo '<th>';
              echo 'Prénom';
              echo '</th>';

              echo '<th>';
              echo 'Commune';
              echo '</th>';

              echo '<th>';
              echo 'Téléphone';
              echo '</th>';

              echo '<th>';
              echo 'E-mail';
              echo '</th>';

              echo '<th>';
              echo 'Date choisie';
              echo '</th>';

              echo '<th>';
              echo 'Horaire Choisie';
              echo '</th>';

              echo '<th>';
              echo 'Déjà été bénévole ?';
              echo '</th>';

              echo '<th>';
              echo 'Comment a t il connu TUTS ?';
              echo '</th>';

              echo '<th>';
              echo 'Infos complémentaires';
              echo '</th>';

              echo '<th>';
              echo 'Date d\'inscription';
              echo '</th>';



              echo '</tr>';
              echo '</thead>';



            foreach ($selection as $inscrit) {
              echo '<tr>';
              echo '<td>';
              echo $inscrit->nom;
              echo '</td>';
              echo '<td>';
              echo $inscrit->prenom;
              echo '</td>';
              echo '<td>';
              echo $inscrit->commune;
              echo '</td>';
              echo '<td>';
              echo $inscrit->telephone;
              echo '</td>';
              echo '<td>';
              echo $inscrit->addr_mail;
              echo '</td>';
              echo '<td>';
              echo $inscrit->date;
              echo '</td>';
              echo '<td>';
              echo $inscrit->horaire;
              echo '</td>';
              echo '<td>';
              echo $inscrit->benevolat;
              echo '</td>';
              echo '<td>';
              echo $inscrit->connaissance;
              echo '</td>';
              echo '<td>';
              echo $inscrit->info;
              echo '</td>';
              echo '<td>';
              echo $inscrit->date_inscrit;
              echo '</td>';
              echo '</tr>';

            }

            ?>
          </table>


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
      <script>
      jQuery(function($) {
        $(document).ready(function(){
          $('#datatable').DataTable(
            {"scrollX": true}
          );
        });


      });
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/tuts_script.js"></script>
<?php get_footer(); ?>
