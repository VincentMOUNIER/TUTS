<?php /* Template Name: Association Compte */ ?>
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
      <div class="main page">
        <!--  Partie personnalisable WordPress-->
        <div class="col-lg-8">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="post">
                <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
                <div class="post-content"> <?php the_content(); ?> </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <!-- Partie identification -->
        <div class="col-lg-4" style="text-align: center; margin-top: 3  em;">
          <!--    <form>
          <label>Identifiant:</label></br>
          <input type="text"></br></br>
          <label>Mot de passe:</label></br>
          <input type="text"></br></br>
          <a href="publier-une-offre">Je ne suis pas encore inscrit</a></br></br>
          <a href="#">Identifiants oubliés</a></br></br>
          <p style="text-align: center;">
          <a href="mon-compte">
          <button class="btn btn-default" type="button">Connexion</button>
        </a>
      </p>
    </form> -->

    <!--
    POUR CUSTOMISER LE FORMULAIRE REGARDER :
    https://codex.wordpress.org/Customizing_the_Login_Form#Make_a_Custom_Login_Page -->

    <?php
    if ( !is_user_logged_in() ) {

      if ($_GET['login']=="failed") {
        echo '<p> Les identifiants sont incorrects </p>';
      }

      wp_login_form(array(

        'redirect' => site_url('index.php/page-association/mon-compte'),
        'label_username' => 'Identifiant',
        'label_log_in' => 'Se Connecter')); ?>
        <a href="creer-un-compte">Je ne suis pas encore inscrit</a></br></br>
        <a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>">Identifiants oubliés</a></br></br>
        <?php

      } else {
        $current_user = wp_get_current_user();?>

        <p> Bienvenue <?php echo $current_user->display_name ?> </p>
        <p> Cliquez <a href="mon-compte">ici</a> pour acceder à votre compte </p>
        <p><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Se deconnecter</a></p>
        <?php
      }// END if (!is_user_logged_in())

      ?>
    </div>


  </div>
  <!-- Row -->
  <div class="col-lg-2 contenu aside">
    <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
  </div>




</div>
<!-- Container fluid -->
<img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

<div class="clear">

</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<?php get_footer(); ?>
