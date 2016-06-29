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
                    ?>

                    <?php
                                // posts_per_page => -1 sert à lister toutes les offres ( sans se limiter à 5 par défaut )
                                $args = array( 'posts_per_page'=>'-1', 'post_type' => 'offre' );
                                $myposts = get_posts( $args );
                                ?>

                                  <?php
                                // setup_postdata sert à set la variable global $post ici pour apres la remettre comme avant avec wp_reset_postdata()
                                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                                    <!-- ICI il va s'agir de creer un formulaire à chaque bouton/lien qui aura pour nom "post_id" et valeur l'id du post auquel il est lier  -->








                                <?php

                                if (lieu() == FALSE) {

                                }
                                elseif (type_dexp() == FALSE) {
                                  echo "Rien trouvé";
                                }

                                
                               endforeach;
                                wp_reset_postdata();?>

                </div>


              </div>
              <!-- Row -->
              <div class="col-lg-2 contenu aside">
                <!-- <img src="<?php bloginfo('template_url'); ?>/img/aside_b.gif" alt="" id="aside_b"/> -->
              </div>

              <img alt="" class="img-responsive image_bas" src ="<?php bloginfo('template_url'); ?>/img/Bannierebas.png">

              <div class="clear">

              </div>



            </div>
            <!-- Container fluid -->


            <script src="bootstrap/js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            <?php get_footer(); ?>
