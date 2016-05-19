<?php /* Template Name: Inscription */ ?>
<?php get_header('aideB'); ?>
<div class="row">
  <div class="col-lg-12" >
    <div class="main page">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="post">
            <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
            <div class="post-content"> <?php the_content(); ?> </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="row" id="formulaire" >
    <form>
      <div class="col-lg-6 col-lg-offset-3">
        <div class="form-group">
          <label for="nom">Nom:</label>
          <input type="text" class="form-control" id="nom">
        </div>
        <div class="form-group">
          <label for="prenom">Prénom:</label>
          <input type="text" class="form-control" id="prenom">
        </div>
        <div class="form-group">
          <label for="email">Adresse mail :</label>
          <input type="text" class="form-control" id="email">
        </div>
        <div class="form-group">
          <label for="tel">Téléphone:</label>
          <input type="text" class="form-control" id="tel">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-6 ">Date choisie :</label>
        <div class="col-lg-5 ">
          <select class="form-control" name="date">
            <option >Choose a size</option>
            <option >Small (S)</option>
            <option >Medium (M)</option>
            <option >Large (L)</option>
            <option >Extra large (XL)</option>
          </select>
        </div>
      </div>
    </br>
        <div class="form-group">
          <label class="col-lg-6">Horaire choisie:</label>
          <div class="col-lg-5 ">
            <select class="form-control" name="horaire">
              <option >Choose a size</option>
              <option >Small (S)</option>
              <option >Medium (M)</option>
              <option >Large (L)</option>
              <option >Extra large (XL)</option>
            </select>
          </div>
        </div>
        <!-- <div class="row">
        Comment avez vous connu l'événement

        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Journaux
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Affiche
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Relation
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Internet
          </label>
        </div> -->
        </div>
      </div>
    </form>


  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
