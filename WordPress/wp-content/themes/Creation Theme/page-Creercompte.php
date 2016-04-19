<?php /* Template Name: Creation Compte */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <div class="row" id="formulaire" >
        <form action="confirmation" method="post">
          <div class="col-lg-6 col-lg-offset-3">
            <div class="form-group">
              <label for="email">Numéro d'identification:</label>
              <input type="text" class="form-control" name="reg_idnum">
            </div>
            <div class="form-group">
              <label for="email">Nom:</label>
              <input type="text" class="form-control" name="reg_name">
            </div>
            <div class="form-group">
              <label for="email">Adresse :</label>
              <input type="text" class="form-control" name="reg_addr">
            </div>
            <div class="form-group">
              <label for="email">Site Web:</label>
              <input type="text" class="form-control" name="reg_website">
            </div>
          </div>
          <div class="col-lg-6 col-lg-offset-3">
          <fieldset>
            <legend>Référent</legend>
            <div class="form-group">
              <label for="email">Nom Référent:</label>
              <input type="text" class="form-control" name="reg_ref_name">
            </div>
            <div class="form-group">
              <label for="email">Prénom référent:</label>
              <input type="text" class="form-control" name="reg_ref_pname">
            </div>
            <div class="form-group">
              <label for="email">Fonction Référent:</label>
              <input type="text" class="form-control" name="reg_ref_fonction">
            </div>
            <div class="form-group">
              <label for="email">Telephone Référent:</label>
              <input type="text" class="form-control" name="reg_ref_tel">
            </div>
            <div class="form-group">
              <label for="email">Email Référent:</label>
              <input type="email" class="form-control" name="reg_ref_mail">
            </div>
          </fieldset>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
          <fieldset>
            <legend>Description</legend>
            <div class="form-group">
              <label for="comment">Mission(s):</label>
              <textarea class="form-control" rows="5" name="reg_mission"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Activité:</label>
              <textarea class="form-control" rows="5" name="reg_act"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Valeurs/Fondamentaux:</label>
              <textarea class="form-control" rows="5" name="reg_val"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Projet(s):</label>
              <textarea class="form-control" rows="5" name="reg_projet"></textarea>
            </div>
            <div class="row">
              <label>Domaine(s) d'activité</label>
            </div>

            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Option 1">Option 1</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Option 2">Option 2</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="Option 3" disabled>Option 3</label>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Option 1</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Option 2</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="" disabled>Option 3</label>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Option 1</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Option 2</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="" disabled>Option 3</label>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Option 1</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="">Option 2</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="domain_group[]" value="" disabled>Option 3</label>
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
            <label><input type="checkbox" name ="usecond" value="">J'accepte les conditons ci dessus</label>
          </div>
        </br></br>
        <!-- TODO Faire le JS pour disable le button if not checked -->
      </fieldset>

      <p style="text-align: center;">

          <p style="text-align: center;"><button type="submit" class="btn btn-default" type="button">Finaliser l'inscription</button></p>
        </a>
      </p>
      <input type="hidden" name="form_confirm" value="1"/>
    </form>
    </div>
  </div>
</div>
</div>


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
