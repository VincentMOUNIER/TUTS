<?php get_header(); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-3 contenu aside">

      <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/>
    </div>

    <div class="col-lg-6 contenu">
      <p>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="post">
          <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
          <div class="post-content"> <?php the_content(); ?> </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </p>
    </div>

    <div class="col-lg-3 contenu aside">
      <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/>
    </div>

  </div>
  <!-- Row -->
</div>
<!-- Container fluid -->
  <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/jquery.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>

<?php get_footer(); ?>
