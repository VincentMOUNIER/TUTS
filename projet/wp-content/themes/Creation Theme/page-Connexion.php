<?php /* Template Name: Association Compte */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12" >
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
        <form>
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
