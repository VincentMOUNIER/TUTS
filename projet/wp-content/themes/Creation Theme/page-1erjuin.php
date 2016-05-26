<?php /* Template Name: 1erjuin */ ?>
<?php get_header("1erjuin"); ?>
<div class="row">
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


  <script src="<?php bloginfo('template_url')?>/js/tuts_script.js"></script>
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>