<?php /* Template Name: Creation Offre */ ?>
<?php acf_form_head(); ?>
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
      <div class="main page">
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <h3>Bonjour et bienvenue sur le site du projet TOUS unis TOUS solidaires</h3><br>
            <p>
              Je suis au regret de vous informer que cette fonctionnalité du site n'est pas encore accessible.<br>
              Si il est prévu que cette dernière doit fonctionner veuillez reporter ce bug en nous contactant au coordonnées présentes dans le pied de page.<br>
              Merci d'avance et bonne navigation :)<br>
              <button type="button" name="button" class=" btn btn-default"><a href="<?=get_page_link(80)?> ">Retour</a></button>
            </p>

          </div><!-- #content -->
        </div><!-- #primary -->
      </div>
    </div> <!-- Contenu -->

      <div class="col-lg-2 contenu aside">
        <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
      </div>
    </div>
    <!-- Row -->

    <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

    <div class="clear">

    </div>



  </div>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/offre.js"></script>

<?php get_footer(); ?>
