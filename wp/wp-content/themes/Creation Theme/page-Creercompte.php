<?php /* Template Name: Creation Compte */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12" id="contenu">
    <div class="main page">
        <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
      <!-- Partie identification -->
      <div class="row" style="text-align: center; margin-top: 3  em;">
        <form>
          <div class="form-group">
              <label for="email">Numéro d'identification:</label>
              <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
              <label for="email">Nom:</label>
              <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
              <label for="email">Adresse :</label>
              <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
              <label for="email">Site Web:</label>
              <input type="text" class="form-control" id="email">
          </div>

          <fieldset>
            <legend>Référent</legend>
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
          <div class="form-group">
              <label for="email">Email Référent:</label>
              <input type="email" class="form-control" id="email">
          </div>
        </fieldset>
          <fielset>
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
                <label><input type="checkbox" value="">Option 1</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="">Option 2</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="" disabled>Option 3</label>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="checkbox">
                <label><input type="checkbox" value="">Option 1</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="">Option 2</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="" disabled>Option 3</label>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="checkbox">
                <label><input type="checkbox" value="">Option 1</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="">Option 2</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="" disabled>Option 3</label>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="checkbox">
                <label><input type="checkbox" value="">Option 1</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="">Option 2</label>
                </div>
                <div class="checkbox">
                <label><input type="checkbox" value="" disabled>Option 3</label>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset>
            <legend style="text-align: center;">Charte</legend>
            <div class="row" style="border: 1px solid black;">
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


  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
