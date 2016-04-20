<?php /* Template Name: Test */ ?>
<?php get_header('test'); ?>
<div class="row accueil_text">
  <div class="container-fluid">
    <img class="img-responsive img_accueil" src="http://localhost:8888/TUTS/wp/wp-content/uploads/2016/04/IMG_7082.jpg">
  </div>
</div>
<div class="row accueil_texte">
  <div class="col-lg-12">
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



  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
