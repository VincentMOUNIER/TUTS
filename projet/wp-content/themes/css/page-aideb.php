<?php /* Template Name: AideB */ ?>
<?php get_header('aideB'); ?>
<div class="container-fluid conteneur">

  <div class="row">

    <div class="col-lg-2 contenu aside">

      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
    </div>

    <div class="col-lg-8 contenu texte_contenu">
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

    <div class="col-lg-2 contenu aside">
      <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
    </div>
  </div>
  <!-- Row -->

    <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

  <div class="clear">

  </div>



</div>
  <!-- Container fluid -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/tuts_script.js"></script>

<?php get_footer(); ?>
