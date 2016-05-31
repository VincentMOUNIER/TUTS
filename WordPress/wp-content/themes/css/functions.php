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

            if (!is_dir($path.$child) && (substr($child,0,5)=="outil") &&(recupextension($child)=="pdf"))
            {
              echo '<div class="div-tools"><div class="img-tools"><a href="'.$url."/".$child.'"><img src="'.get_template_directory_uri()."/img/pdf1.png".'" width=100px height=100px/>';
              echo '<p class="text-center name-pdf"> '.$child.' </p></a></div></div>';

            }
            recursiveListTool($path."/".$child,$url."/".$child);
          }
        }
      }
    }

  }




function uploadLogo(){  //TODO Mettre une limitation de image size 

  // Check that the nonce is valid, and the user can edit this post.
  if (
  	isset( $_POST['my_image_upload_nonce'] )
  	&& wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )

  ) {
  	// The nonce was valid

  	// These files need to be included as dependencies when on the front end.
  	require_once( ABSPATH . 'wp-admin/includes/image.php' );
  	require_once( ABSPATH . 'wp-admin/includes/file.php' );
  	require_once( ABSPATH . 'wp-admin/includes/media.php' );

  	// Let WordPress handle the upload.
  	// Remember, 'my_image_upload' is the name of our file input in our form above.
  	$attachment_id = media_handle_upload( 'my_image_upload', 0 );
    $id_user = get_current_user_id();
    global $wpdb;

    $wpdb->update(
    "{$wpdb->prefix}tuts_association",
    array('logo' => $attachment_id),
    array('id_user' => $id_user)
    );


  	if ( is_wp_error( $attachment_id ) ) {
  		echo $attachment_id->get_error_message();
  	} else {
  		// The image was uploaded successfully!
  	}

  } else {

  	// The security check failed, maybe show the user an error.
  }
}
?>
