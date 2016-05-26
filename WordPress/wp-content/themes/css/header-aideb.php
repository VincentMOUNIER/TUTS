<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head profile="http://gmpg.org/xfn/11">

    <title><?php the_title(); ?></title>
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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" media="screen" />
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
                  <h1 >Tous unis <br>Tous solidaires</h1>
            </div>

          </div>

          <div class="col-lg-2 bouton">
            <a href="besoin-daide"><button type="button" class="btn btn-default">Besoin d'aide</button></a>
          </div>

        </div>
        <!-- row -->
      </div>
      <!-- container fluid -->
