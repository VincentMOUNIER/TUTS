<?php /* Template Name: traitement moteur */ ?>
<?php get_header('aide'); ?>
            <div class="container-fluid conteneur">

              <div class="row">

                <div class="col-lg-2 contenu aside">

                  <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_a.gif" alt="" id="aside_a"/> -->
                </div>

                <div class="col-lg-8 contenu texte_contenu">
                    <!--  Partie personnalisable WordPress-->
                    <h1 class="post-title" id="titre"><?php the_title(); ?></h1>
                    <?php

                    $base = '';
                    if (isset($_POST['date_d']))
                    {
                        $base .='Après le '.$_POST['date_d_select'].' Octobre 2016';
                    }
                    if (isset($_POST['date_f']))
                    {
                        $base .=', Avant le '.$_POST['date_f_select'].' Octobre 2016';
                    }
                    if (isset($_POST['lieu']))
                    {
                        $base .=', Sur la ville de '.$_POST['lieu_select'];
                    }
                    if (isset($_POST['type_exp']))
                    {
                        $base .=', une expérience du type : '.$_POST['type_exp_select'];
                    }
                    if (isset($_POST['dom_action']))
                    {
                        $base .=', un domaine d action du type : '.$_POST['dom_action_select'];
                    }
                    if (isset($_POST['horaire']))
                    {
                        $base .=', sur l horaire : '.$_POST['horaire_select'];
                    }
                    if (isset($_POST['access']))
                    {
                        $base .=', pour les '.$_POST['access_select'];
                    }
                        echo $base;
                        $args = array(
                        	'post_type'  => 'offre',
                        	'meta_query' => array(
                        		// 'relation' => 'OR',
                        		array(
                        			'key'     => 'moyen_dacces',
                        			'value'   => 'Bus',
                        			'compare' => '=',
                        		),

                        	),
                        );
                        $the_query = new WP_Query( $args );?>

                        <?php if ( $the_query->have_posts() ) : ?>

                      	<!-- pagination here -->

                      	<!-- the loop -->
                      	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                      		<h2><?php the_title(); ?></h2>
                      	<?php endwhile; ?>
                      	<!-- end of the loop -->

                      	<!-- pagination here -->

                      	<?php wp_reset_postdata(); ?>

                      <?php else : ?>
                      	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                      <?php endif; ?>

                                

                </div>


              </div>
              <!-- Row -->
              <div class="col-lg-2 contenu aside">

              </div>

              <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

              <div class="clear">

              </div>



            </div>
            <!-- Container fluid -->


            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            <?php get_footer(); ?>
