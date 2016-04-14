<?php /* Template Name: Aide */ ?>
<?php get_header('aide'); ?>
<div class="row">
  <div class="col-lg-12" id="contenu">
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
