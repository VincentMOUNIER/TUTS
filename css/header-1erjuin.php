<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

  <title><?php the_title(); ?></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
  <!-- leave this for stats -->

  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <?php wp_head(); ?>
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php //comments_popup_script(); <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/vitrine.css">
</head>

<body>
  <div class="page">

    <div class="container-fluid header">

      <div class="row">

        <!-- <div class="col-lg-2 logo">
          <img src="<?php bloginfo('template_url'); ?>/img/tuts.jpg" alt="Logo Tuts" id="logo" />
        </div> -->
          <div class="col-lg-6 col-lg-offset-3 titre" id="titre_header">
                <h1 >Tous unis <br>Tous solidaires</h1>
          </div>


        <div class="col-lg-3 bouton">
            <a href="association"><button type="button" class="btn btn-default bouton_haut">Association</button></a></br>
            <a href="aajouter"><button type="button" class="btn btn-default bouton_haut">Bénévole</button></a>
        </div>

      </div>
      <!-- row -->
    </div>
    <!-- container fluid -->
