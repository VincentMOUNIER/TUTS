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
            <input type="hidden" name="post_id" value="<?php echo $_POST['post_id']?>">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="form-group">
                <label> Je suis : *</label>
                <input type="radio" name="reg_genre" value="Homme" id="reg_genre">Homme
                <input type="radio" name="reg_genre" value="Femme" id="reg_genre">Femme
              </div>
              <div class="form-group">
                <label id="textinp1">Nom : *</label>
                <input type="text" class="form-control" name="reg_nom" id="reg_nom">

              </div>

              <div class="form-group">
                <label for="email">Prenom</label>
                <input type="text" class="form-control" id="reg_prenom" name="reg_prenom" onblur="checkNom(this)">
              </div>
              <div class="form-group">
                <label for="email">Commune :</label>
                <select name="reg_commune" size="1" class="form-control">

                <option>Lyon</option>
                <option>Albigny-sur-Saône</option>
                <option>Bron</option>
                <option>Cailloux-sur-Fontaines</option>
                <option>Caluire-et-Cuire</option>
                <option>Champagne-au-Mont-d'Or</option>
                <option>Charbonnières-les-Bains</option>
                <option>Charly</option>
                <option>Chassieu</option>
                <option>Collonges-au-Mont-d'Or</option>
                <option>Corbas</option>
                <option>Couzon-au-Mont-d'Or</option>
                <option>Craponne</option>
                <option>Curis-au-Mont-d'Or</option>
                <option>Dardilly</option>
                <option>Décines-Charpieu</option>
                <option>Ecully</option>
                <option>Feyzin</option>
                <option>Fleurieu-sur-Saône</option>
                <option>Fontaines-Saint-Martin</option>
                <option>Fontaines-sur-Saône</option>
                <option>Francheville</option>
                <option>Genay</option>
                <option>Givors</option>
                <option>Grigny</option>
                <option>Irigny</option>
                <option>Jonage</option>
                <option>La Mulatière</option>
                <option>Limonest</option>
                <option>La Tour de Salvagny</option>
                <option>Lissieu</option>
                <option>Lyon</option>
                <option>Marcy-l'Etoile</option>
                <option>Meyzieu</option>
                <option>Mions</option>
                <option>Montanay</option>
                <option>Neuville-sur-Saône</option>
                <option>Oullins</option>
                <option>Pierre-Bénite</option>
                <option>Poleymieux-au-Mont-d'Or</option>
                <option>Quincieux</option>
                <option>Rillieux-la-Pape</option>
                <option>Rochetaillée-sur-Saône</option>
                <option>Saint-Cyr-au-Mont-d'Or</option>
                <option>Saint-Didier-au-Mont-d'Or</option>
                <option>Saint-Fons</option>
                <option>Saint-Genis-Laval</option>
                <option>Saint-Genis-les-Ollières</option>
                <option>Saint-Germain-au-Mont-d'Or</option>
                <option>Saint-Priest</option>
                <option>Saint-Romain-au-Mont-d'Or</option>
                <option>Sainte-Foy-lès-Lyon</option>
                <option>Sathonay-Camp</option>
                <option>Sathonay-Village</option>
                <option>Solaize</option>
                <option>Tassin-la-Demi-Lune</option>
                <option>Vaulx-en-Velin</option>
                <option>Vénissieux</option>
                <option>Vernaison</option>
                <option>Villeurbanne</option>
                <option>Autre</option>

              </select>
              </div>
              <div class="form-group">
                <label for="email">Adresse Mail : **</label>
                <input type="text" class="form-control" id="reg_mail" name="reg_mail" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Telephone : **</label>
                <input type="text" class="form-control" id="reg_tel" name="reg_telephone" class="form-control">
              </div>
              <p><i> ** : Un des deux champs est obligatoire.</i></p>

            </div>

            <?php //TODO offre.getHoraire à faire?>

            <div class="col-lg-6 col-lg-offset-3">
            <fieldset>



            <legend>Offre</legend>
            <div class="form-group">
            <label for="email">Date:</label>
            <select name="reg_date" class="form-control">
<?php   // Recuperation des données du repeater date d'une offre avec son post id
            if (have_rows("date", $_POST['post_id'])) {  // Cas d'un repeater "date" est le nom du repeater
                while (have_rows("date",$_POST['post_id']))  {
                  the_row();                                                    // On recupere chaque element du repeater : à savoir la date,
                  $date = get_sub_field('date');                                // l'heure de debut, l'heure de fin et le nb de places
                  echo '<option>';
                  echo $date;
                  echo '</option>';
                }
              }
?>


            </select>
            </div>
            <div class="form-group">
            <label for="email">Heure:</label>
            <select name="reg_heure" class="form-control">
              <option> 8h à 12h </option>
              <option> 12h à 14h </option>
              <option> 14h à 18h </option>
              <option> Après 18h </option>
            </select>



            </div>
            <div class="form-group">
            <label for="email">Avez-vous déjà été bénévole ?</label>
            <select name="reg_dejabene" class="form-control">
              <option> Non </option>
              <option> Oui </option>
            </select>
            </div>
            <div class="form-group">
            <label for="reg_cb_tuts">Comment avez vous connu l'événement ?</label>
            <div class="col-6-lg">
            <input type="checkbox" name="reg_cb_tuts[]" value="Bouche-à-oreille"> Bouche-à-oreille
            <input type="checkbox" name="reg_cb_tuts[]" value="Média"> Média
            <input type="checkbox" name="reg_cb_tuts[]" value="Site internet"> Site internet
            <input type="checkbox" name="reg_cb_tuts[]" value="Facebook"> Facebook
            <input type="checkbox" name="reg_cb_tuts[]" value="Twitter"> Twitter
            <input type="checkbox" name="reg_cb_tuts[]" value="Par une association"> Par une association
            <input type="checkbox" name="reg_cb_tuts[]" value="Par des représentants dans la rue"> Par des représentants dans la rue
            <input type="checkbox" name="reg_cb_tuts[]" value="Publicité urbaine"> Publicité urbaine
            </div>

            </div>
            <div class="form-group">
            <label for="email">Infos à nous transmettre : </label>
            <textarea name="reg_infos" rows="5" class="form-control"></textarea>
            </div>
            </fieldset>
            </div>

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
