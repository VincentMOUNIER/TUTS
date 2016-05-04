<?php /* Template Name: Inscription Benevole */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <div class="row" id="formulaire" >
        <form action="confirmation" method="post" id="idform" onsubmit="return verifAll(this)">
          <div class="col-lg-6 col-lg-offset-3">
              <div class="form-group">
                <label> Je suis : </label>
                <input type="radio" name="reg_type" value="association" id="reg_type_ass" checked>Une association
                <input type="radio" name="reg_type" value="collectif" id="reg_type_col">Un collectif
              </div>
              <div class="form-group">
                <label id="textinp1">Numéro d'identification:</label>
                <input type="text" class="form-control" name="reg_idnum" id="reg_idnum">
                <input type="hidden" class="form-control" name="reg_assref" id="reg_assref">
              </div>

            <div class="form-group">
              <label for="email">Nom:</label>
              <input type="text" class="form-control" id="reg_name" name="reg_name" onblur="checkNom(this)">
            </div>
            <div class="form-group">
              <label for="email">Adresse :</label>
              <input type="text" class="form-control" id="reg_addr" name="reg_addr">
            </div>
            <div class="form-group">
              <label for="email">Site Web:</label>
              <input type="text" class="form-control" id="reg_website" name="reg_website">
            </div>
          </div>

          <div class="col-lg-6 col-lg-offset-3">
          <fieldset>
            <legend>Référent</legend>
            <div class="form-group">
              <label for="email">Nom Référent:</label>
              <input type="text" class="form-control"  id="reg_ref_name" name="reg_ref_name">
            </div>
            <div class="form-group">
              <label for="email">Prénom référent:</label>
              <input type="text" class="form-control" id="reg_ref_pname" name="reg_ref_pname">
            </div>
            <div class="form-group">
              <label for="email">Fonction Référent:</label>
              <input type="text" class="form-control" id="reg_ref_fonction" name="reg_ref_fonction">
            </div>
            <div class="form-group">
              <label for="email">Telephone Référent:</label>
              <input type="text" class="form-control" id="reg_ref_tel" name="reg_ref_tel">
            </div>
            <div class="form-group">
              <label for="email">Email Référent:</label>
              <input type="email" class="form-control" id="reg_ref_mail" name="reg_ref_mail">
            </div>
          </fieldset>
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
        </a>
      </p>
      <input type="hidden" name="form_confirm" value="1"/>
    </form>
    </div>
  </div>
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

</div>
</div>
</div>
<?php get_footer(); ?>
