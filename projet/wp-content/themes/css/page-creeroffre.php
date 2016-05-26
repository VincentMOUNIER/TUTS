<?php /* Template Name: Creation Offre */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>

      <div class="row" id="formulaire" >
        <form>
          <div class="col-lg-6 col-lg-offset-3">
            <fieldset>
              <legend>Expérience</legend>

            <div class="form-group">
              <label for="email">Titre de l'expérience</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="comment">Définition:</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="row">
              <label>Type</label>
            </div>
            <div class="col-lg-4">
              <div class="checkbox">
                <label><input type="checkbox" value="">Option 1</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="">Option 2</label>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="checkbox">
                <label><input type="checkbox" value="">Option 3</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="">Option 4</label>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="checkbox">
                <label><input type="checkbox" value="">Option 5</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="">Option 6</label>
              </div>
            </div>
            <div class="row">
              <label>Accessibilité</label>
            </div>
            <div class="col-lg-12">
              <div class="checkbox">
                <label><input type="checkbox" value="">Mineur</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="">Handicap</label>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Adresse:</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="row">
              <label>Moyen d'accès</label>
            </div>
            <div class="col-lg-12">
              <div class="checkbox">
                <label><input type="checkbox" value="">Tram</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="">Bus</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="">Métro</label>
              </div>
            </div>


          </fieldset>



          </div>
          <div class="col-lg-6 col-lg-offset-3">
          <fieldset>
            <legend>Référent de l'expérience</legend>
            <div class="form-group">
              <label for="email">Nom Référent:</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="email">Prénom référent:</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="email">Fonction Référent:</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="email">Adresse Référent:</label>
              <input type="text" class="form-control" id="email">
            </div>
          </fieldset>
        </div>

        <div class="col-lg-6 col-lg-offset-3">
          <fieldset>
            <legend>Description</legend>

            <div class="form-group">
              <label for="comment">Mission(s):</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Activité:</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Valeurs/Fondamentaux:</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Projet(s):</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="row">
              <label>Domaine(s) d'activité</label>
            </div>

            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Accompagnement Social</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Citoyenneté et Droits de Humains</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="" >Culture</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Développement local</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Diversité Culturelle</label>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Economie Sociale et Solidaire</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Education</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Environnement</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Insertion</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Loisir</label>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Protection et Défense des animaux</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Santé</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Solidarité internationale et action humanitaire</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Sport</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Autre</label>
              </div>
            </div>

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
            <label><input type="checkbox" value="">J'accepte les conditons ci dessus</label>
          </div>
        </br></br>

      </fieldset>




      <p style="text-align: center;">
        <a href="mon-compte">
          <p style="text-align: center;"><a href="mon-compte"><button class="btn btn-default" type="button">Finaliser l'inscription</button></a></p>
        </a>
      </p>
    </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="cal.js"></script>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
