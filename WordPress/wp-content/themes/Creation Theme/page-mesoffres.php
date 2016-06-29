<?php /* Template Name: Mes Offres */ ?>
<?php
if ( !is_user_logged_in() ) {
  wp_redirect( get_permalink( $post->post_parent )); exit;
}
?>
<?php get_header('aide');
function child_theme_head_script() { ?>
	<link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" />
<?php }
add_action( 'wp_head', 'child_theme_head_script' );?>

<div class="row">
  <div class="col-lg-12">
    <div class="main page">
      <h1 class="post-title" id="titre"><?php the_title(); ?></h1>

      <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <div class=" text-center"><a href="creer-une-offre" class="btn btn-default btn-lg" role="button">Publier une offre</a></div>
            <?php
            // On va recuperer l'user pour filtrer les offres affichés par auteur
            $current_user = wp_get_current_user();

            // posts_per_page => -1 sert à lister toutes les offres ( sans se limiter à 5 par défaut )
            $args = array( 'posts_per_page'=>'-1', 'author' => $current_user->ID, 'post_type' => 'offre' );
            $myposts = get_posts( $args );
            ?>

            <table id="table-offre">

              <?php
            // setup_postdata sert à set la variable global $post ici pour apres la remettre comme avant avec wp_reset_postdata()
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            	<tr>
                <!-- ICI il va s'agir de creer un formulaire à chaque bouton/lien qui aura pour nom "post_id" et valeur l'id du post auquel il est lier  -->
                <td>
            		<a href="<?php the_permalink(); ?>"><?php echo get_field("titre_de_lexperience", $post->ID); ?></a>
              </td>
              <td>
                <form method="post" action="voir-inscrit" id="voir-inscrit">
                  <input type="hidden" name="post_id" value="<?php echo $post->ID ?>"/>
                <a href="#" onclick='document.getElementById("voir-inscrit").submit()' >Voir les inscrits</a>
              </form>
            </td>
            <td>
              <form method="post" action="modifier-offre" id="modif-offre">
                <input type="hidden" name="post_id" value="<?php echo $post->ID ?>"/>
              <a href="#" onclick='document.getElementById("modif-offre").submit()' >Modifier l'offre</a>
            </form>
          </td>
          <td>
            <form method="post" action="" id="modif-date">
              <input type="hidden" name="post_id" value="<?php echo $post->ID ?>"/>
            <a href="#" onclick='document.getElementById("modif-date").submit()' >Modifier les dates</a>
          </form>
        </td>
        </tr>

            <?php endforeach;
            wp_reset_postdata();?>
          </table>









          <?php endwhile; ?>

        </div><!-- #content -->
      </div><!-- #primary -->
    </div>
  </div>
</div>
<script>

</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



<script src="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
</div>
</div>
</div>
<?php get_footer(); ?>
