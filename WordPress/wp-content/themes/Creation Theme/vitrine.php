<?php
/*

Template Name: vitrine
*/


?>


<!DOCTYPE html>
<html>
<head>



  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>





<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/vitrine.css"> <!-- CSS pour la page -->

<script src="<?php bloginfo('template_url'); ?>/js/tuts_script.js"></script> <!-- JS pour la page -->
</head>
<body>

<!-- debut carousel -->
  <div class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      </div>
      <div class="item">
      </div>
      <div class="item">
      </div>
      <div class="item">
      </div>
      <div class="item">
      </div>
    </div>
  </div>
<!-- fin carousel -->


  <div id="content" >
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <div class="post">

          <div class="post_content">
            <div class="container-fluid">
              <div class="row">
                <div class=" col-lg-6 col-md-6 col-xs-10 col-sm-10 col-xs-offset-1 col-md-offset-3 col-sm-offset-1 col-lg-offset-3 contentpost">
                  <!-- fonction php pour filtrer les balises <p> des <img> -->
                  <?php
                  function filter_ptags_on_images($content){
                    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
                  }

                  add_filter('the_content', 'filter_ptags_on_images');
                  the_content(); ?>

                <?php endwhile; ?> <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <footer class="footer">
      <div class="container">
      </div>
    </footer>



  </body>
  </html>
