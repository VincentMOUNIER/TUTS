<?php

                /* Precreate custom type post : offre */
 function my_pre_save_post( $post_id ) {

    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }

    // Create a new post
    $post = array(
        'post_status'  => 'publish',
        'post_title'  => 'Offre-Title', 
        'post_type'  => 'offre'
    );
    // TODO TITLE == Changer post_title, mettre un $_POST ?
    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    $_POST['post_id'] = $post_id;
    return $post_id;
}

add_filter('acf/pre_save_post' , 'my_pre_save_post' );





                          /* ADD ACTION FOR LOGIN FAIL */

add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}




//           SLIDER-TOOL MON COMPTE


//fonction qui retourne l'extension d'un fichier
function recupextension ($filename)
{
  return substr(strrchr($filename, '.'), 1);
}

//fonction qui permet de compter le nombre d'images dans un dossier spécifié à l'appel de la fonction
function listTool(){

  $upload_dir = wp_upload_dir();
  $rep = $upload_dir['path'];
  $urlupload = $upload_dir['url'];

  echo "rep : ".$rep."\n";
  echo "urlupload : ".$urlupload."\n";

  if (is_dir($rep))
  {
    if ($rh = opendir($rep))
    {
      $i = 0;
      while (($file = readdir($rh)) !== false)
      {
        if ($file != '.' && $file != '..')
        {
          if (!is_dir($rep.$file) && (recupextension($file)=="pdf"))
          {




            echo '<div class="div-tools"><div class="img-tools"><a href="'.$urlupload."/".$file.'"><img src="'.$urlupload."/pdf1.png".'" width=100px height=100px/></a>';
            echo '<p class="text-center name-pdf"> '.$file.' </p></div></div>';

          }else {echo "prout";}
        }
      }
    }else { echo "opendir";}
  }else{ echo "lol";}
  }



  //TODO Fonction recursive pour afficher les tools dans la boite
  function recursiveListTool($path,$url) {

    if (is_dir($path))
    {
      if ($me = opendir($path))
      {

        while (($child = readdir($me)) !== false)
        {
          if ($child != '.' && $child != '..')
          {
            if (!is_dir($path.$child) && (recupextension($child)=="pdf"))
            {
              echo '<div class="div-tools"><div class="img-tools"><a href="'.$url."/".$child.'"><img src="'.get_template_directory_uri()."/img/pdf1.png".'" width=100px height=100px/></a>';
              echo '<p class="text-center name-pdf"> '.$child.' </p></div></div>';

            }
            recursiveListTool($path."/".$child,$url."/".$child);
          }
        }
      }
    }

  }


?>
