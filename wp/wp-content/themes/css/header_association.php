<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css"  charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/vitrine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/tuts_script.js"></script>
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>
  <title><?php the_title(); ?></title>
</head>
<body>
  <div class="page">

    <div class="container-fluid header">

      <div class="row">

        <div class="col-lg-2 logo">
          <img src="<?php bloginfo('template_url'); ?>/img/tuts.jpg" alt="Logo Tuts" id="logo" />
        </div>

        <div class="col-lg-8 titre">
          <div class="col-lg-6 col-lg-offset-3" id="titre_header">
                <h1 >Tous Unis Tous Solidaires</h1>
          </div>

        </div>

        <div class="col-lg-2">

          <a href="#"><button type="button" name="button">Besoin d'aide</button></a>

        </div>

      </div>
      <!-- row -->
    </div>
    <!-- container fluid -->
