<?php /* Template Name: Mon Compte */ ?>
<?php
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
}
?>
<?php get_header('aide');
function child_theme_head_script() { ?>
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
  <?php }
  add_action( 'wp_head', 'child_theme_head_script' );?>
  <style>
  .inactive{
    display:none;
  }
  </style>
  <div class="container-fluid conteneur">

    <div class="row">

      <div class="col-lg-2 contenu aside">

        <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
      </div>

      <div class="col-lg-8 contenu texte_contenu">

        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="row">

                <div class="welcome col-lg-offset-2 col-lg-8">
                  <H1> Bonjour <?php $current_user = wp_get_current_user();
                  echo $current_user->display_name;?> </H1>
                  <h2> Bienvenue sur votre espace personnel ! </h2>
                </div>
              </div> <!--Fin Div Row-->


                <div class="row">
                  <div class="col-lg-8">
                  <h2 class="text-center"> Boite à outils </h2>
                  <div id="pdf-tools">
                    <?php
                    $upload_dir = wp_upload_dir();
                    // recursiveListTool va prendre en parametre la basedir (directory) et la baseurl ( url ) car elle va chercher les pdf
                    // uploadé via le menu de wordpress, il faut penser a definir comment choisir les bons pdf ( mettre un tool-*.pdf par exemple )
                    recursiveListTool($upload_dir['basedir'],$upload_dir['baseurl']);
                    ?>



                  </div> <!-- End div pdf tools -->
                  <div class="text-center" id="btn-offre"><a href="mes-offres" class="btn btn-default btn-lg" role="button"><H2>Mes Offres d'Experiences</H2>Pour consulter, créer, modifier ou supprimer des offres</a></div>
                </div>
                <div class="logo-upload col-lg-4 ">
                  <h2 class="text-center"> Logo </h2>
                  <?php
                  uploadLogo();
                  global $wpdb;
                  $id_user = get_current_user_id();
                  $result= $wpdb->get_row("SELECT * from {$wpdb->prefix}tuts_association WHERE id_user = '$id_user'");
                  if (($id_logo = $result->logo) != NULL) {
                    ?>
                    <?=wp_get_attachment_image($id_logo)?>
                    <?php
                  }
                  ?>
                  <br><button id="aShowForm"> Cliquez ici pour changer votre logo </button>
                  <form action="#" method="POST" enctype="multipart/form-data">

                    <?php
                    // UploadLogo va upload le logo si on a post le formulaire d'upload de logo ( Function.php )

                    wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' );

                    ?>
                    <div class="animated inactive fadeOutUp well" id="logo-form">
                    Choisir mon logo :
                    <input type="file" accept="image/*" name="my_image_upload" id="my_image_upload"> Taille conseillée : 150x150px <br>
                    <button type="submit">Valider</button>
                  </form>
                </div>
                </div> <!-- Fin duv Logo-upload-->
              </div> <!-- Fin div Row -->






            <?php endwhile; ?>

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
  document.getElementById("aShowForm").addEventListener("click", function(){
    var item = document.getElementById("logo-form");
    item.classList.toggle("inactive");
    item.classList.toggle("active");
    item.classList.toggle("fadeInDown");
    item.classList.toggle("fadeOutUp");
  });
  </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



  <script src="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
  <?php get_footer(); ?>
