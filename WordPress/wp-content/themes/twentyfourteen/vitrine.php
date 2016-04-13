<?php
/*

Template Name: vitrine
*/

try {
  $bdd = new PDO('mysql:host=localhost;dbname=tuts;charset=utf8', 'root', 'root');
} catch (Exception $e) {
  die('erreur :'  . $e->getMessage());
}
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





  <style>
  html {
    position: relative;
    min-height: 100%;
    margin-top: 0px !important;
  }
  .carousel-fade .carousel-inner .item {
    opacity: 0;
    transition-property: opacity;
  }
  .carousel-fade .carousel-inner .active {
    opacity: 1;
  }
  .carousel-fade .carousel-inner .active.left,
  .carousel-fade .carousel-inner .active.right {
    left: 0;
    opacity: 0;
    z-index: 1;
  }
  .carousel-fade .carousel-inner .next.left,
  .carousel-fade .carousel-inner .prev.right {
    opacity: 1;
  }
  .carousel-fade .carousel-control {
    z-index: 2;
  }
  @media all and (transform-3d),
  (-webkit-transform-3d) {
    .carousel-fade .carousel-inner > .item.next,
    .carousel-fade .carousel-inner > .item.active.right {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.prev,
    .carousel-fade .carousel-inner > .item.active.left {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.next.left,
    .carousel-fade .carousel-inner > .item.prev.right,
    .carousel-fade .carousel-inner > .item.active {
      opacity: 1;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }
  }
  .item:nth-child(5) {
    background: url(https://raw.githubusercontent.com/VincentMOUNIER/TUTS/master/IMAGES/P1240169-2.JPG) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .item:nth-child(4) {
    background: url(https://raw.githubusercontent.com/VincentMOUNIER/TUTS/master/IMAGES/Emma%C3%BCs%20Connect-%20copyright%20Julien%20Bottriaux%20bd.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .item:nth-child(3) {
    background: url(https://github.com/VincentMOUNIER/TUTS/blob/master/IMAGES/20150607_160208-1.jpg?raw=true) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .item:nth-child(1) {
    background: url(https://github.com/VincentMOUNIER/TUTS/blob/master/IMAGES/IMG_7082.jpg?raw=true) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .item:nth-child(2) {
    background: url(https://github.com/VincentMOUNIER/TUTS/blob/master/IMAGES/Equipes%20mobiles-17.jpg?raw=true) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .carousel {
    z-index: -99;
  }
  .carousel .item {
    position: fixed;
    width: 100%;
    height: 100%;
  }
  .title {
    text-align: center;
    margin-top: 20px;
    padding: 10px;
    text-shadow: 2px 2px #000;
    color: #FFF;
  }
  .contentpost{
    background-color: rgba(191, 191, 191,0.8);
    border-radius: 50px;
  }
#content{
  margin-top: 5%;
  margin-bottom : 5%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #f5f5f5;
}

  </style>

  <script> $('.carousel').carousel(); </script>
</head>
<body>


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




  <div id="content" >
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <div class="post">

          <div class="post_content">
            <div class="container-fluid">
            <div class="row">
              <div class=" col-lg-6 col-md-6 col-xs-10 col-sm-10 col-xs-offset-1 col-md-offset-3 col-sm-offset-1 col-lg-offset-3 contentpost">
                <?php
                function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');
                the_content(); ?>
                <div class="row">
                  <div class="col-lg-6 col-md-8 col-xs-10 col-sm-10 col-xs-offset-1 col-md-offset-2 col-sm-offset-1 col-lg-offset-3 text-center">
                    <form action="#" method="post" class="form-horizontal">
                      <div class="form-group">

                        <div class="col-lg-8 col-md-8 col-xs-10 col-sm-10 col-xs-offset-1 col-md-offset-2 col-sm-offset-1 col-lg-offset-2">
                          <input type="email" id="mail" name="mail" class="form-control" placeholder="exemple@gmail.com">
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-default">Me prévenir</button>
                      </div>
                    </form>
                  </div>
                </div>
              <?php endwhile; ?> <?php endif; ?>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>





    <?php
    if (!empty($_POST['mail'])){
      $query=$bdd->prepare('select * from tuts_preinscription where mail=?');
      $query->execute(array($_POST['mail']));
      $row = $query->rowCount();
      $bdd->beginTransaction();

      if ($row > 0 ) {
        $alrdyexist = True ;
      } else {
        $alrdyexist = False ;
        $queryadd =$bdd->prepare('INSERT INTO `tuts_preinscription` (`mail`) VALUES(?);');
        $queryadd->execute(array($_POST['mail']));



      }
    }
    ?>


<footer class="footer">
<div class="container">
</div>
</footer>


  </body>
  </html>
