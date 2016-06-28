<?php /* Template Name: Inscription Benevole */ ?>
<!-- En $_POST on a :

$_POST['offre_id'] = id du post de l'offre auquel le benevole s'inscrit

-->
<?php get_header('aide'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
      <div class="main page">
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
        <!-- Partie identification -->
        <div class="row" id="formulaire" >
          <form action="confirmer-benevole" method="post" id="idform" onsubmit="return verifAll(this)">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="form-group">
                <label> Je suis : </label>
                <input type="radio" name="reg_genre" value="Homme" id="reg_genre" checked>Homme
                <input type="radio" name="reg_genre" value="Femme" id="reg_genre">Femme
              </div>
              <div class="form-group">
                <label id="textinp1">Nom:</label>
                <input type="text" class="form-control" name="reg_nom" id="reg_nom">

              </div>

              <div class="form-group">
                <label for="email">Prenom</label>
                <input type="text" class="form-control" id="reg_prenom" name="reg_prenom" onblur="checkNom(this)">
              </div>
              <div class="form-group">
                <label for="email">Commune :</label>
                <input type="text" class="form-control" id="reg_addr" name="reg_addr">
                <!-- TODO Faire une liste déroulante de TOUTES LES COMMUNES ( c'est une liste exhaustive avec "autre" donc en brut ? -> si selectionnée ajout d'un input pour la commune ) -->
              </div>
              <div class="form-group">
                <label for="email">Address Mail:</label>
                <input type="text" class="form-control" id="reg_website" name="reg_website">
              </div>
            </div>

            <!-- <div class="col-lg-6 col-lg-offset-3">
            <fieldset>
            TODO Extraire les infos de l'offre (ACF) pour les mettre dans le formualaire
            <legend>Offre</legend>
            <div class="form-group">
            <label for="email">Date:</label>
            <input type="text" class="form-control"  id="reg_ref_name" name="reg_date">
            </div>
            <div class="form-group">
            <label for="email">Heure:</label>
            <input type="text" class="form-control" id="reg_ref_pname" name="reg_heure">
            </div>
            <div class="form-group">
            <label for="email">Déjà bénévolat:</label>
            <input type="text" class="form-control" id="reg_ref_fonction" name="reg_expbenevole">
            </div>
            <div class="form-group">
            <label for="email">Comment avez vous connu TUTS:</label>
            <input type="text" class="form-control" id="reg_ref_tel" name="reg_connututs">
            </div>
            <div class="form-group">
            <label for="email">Infos à nous transmettre:</label>
            <input type="text" class="form-control" id="reg_ref_tel" name="reg_info">
            </div>
            </fieldset>
            </div> -->

            <div class="col-lg-6 col-lg-offset-3">
              <fieldset>
                <legend id="charte">Charte</legend>
                <div class="row" id="charte_contenu">
                  <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                      <div class="post">
                        <div class="post-content"> <?php the_content(); ?> </div>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" id ="usecond"name ="usecond" value="">J'accepte les conditons ci dessus</label>
                </div>
              </br></br>
              <!-- TODO Faire le JS pour disable le button if not checked -->
            </fieldset>

            <p style="text-align: center;">

              <p style="text-align: center;"><button type="submit" class="btn btn-default" type="button" id="btsubmit" >Finaliser l'inscription</button></p>
            </p>
            <input type="hidden" name="form_confirm" value="1"/>
          </form>
        </div>
      </div>
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


            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            <?php get_footer(); ?>
