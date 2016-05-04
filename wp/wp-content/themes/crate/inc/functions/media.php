<?php
/**
 * This file contains the media functions for the theme (Gallery, Audio, Video).
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

/*===================================================================*/
/*  GALLERY FUNCTIONS
/*===================================================================*/
if ( !function_exists( 'bean_gallery' ) )
{
     function bean_gallery($postid, $imagesize = '', $layout = '', $orderby = '', $single = false )
     {
          $thumb_ID = get_post_thumbnail_id( $postid );
          $image_ids_raw = get_post_meta($postid, '_bean_image_ids', true);

          if( $image_ids_raw != '' )
          {
               $image_ids = explode(',', $image_ids_raw);
               $post_parent = null;
          } else {
               $image_ids = '';
               $post_parent = $postid;
          }

          // PULL THE IMAGE ATTACHMENTS
          $args = array(
               'exclude' => $thumb_ID,
               'include' => $image_ids,
               'numberposts' => -1,
               'orderby' => $orderby,
               'order' => 'ASC',
               'post_type' => 'attachment',
               'post_parent' => $post_parent,
               'post_mime_type' => 'image',
               'post_status' => null,
               );
          $attachments = get_posts($args);

          //IF THE FUNCTION'S LAYOUT IS CALLING FOR THE SLIDER
          if( $layout == 'slider' )
          {
               //TRANSFER RANDO META FOR TRUE/FALSE SLIDE RANDOMIZE
               if ( $orderby == 'rand') {
                    $orderby_slides = 1;
               } else {
                    $orderby_slides = 0;
               }
               ?>

               <div class="post-slider <?php //echo $animation; ?>">
                    <div id="slider-<?php echo $postid; ?>" class="flexslider" data-orderby-slides="<?php echo $orderby_slides; ?>">
                         <ul class="slides fadein">
                              <?php
                              if( !empty($attachments) )
                              {
                                   $i = 0;
                                   foreach( $attachments as $attachment )
                                   {
                                        $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                                        $caption = $attachment->post_excerpt;
                                        $caption = ($caption) ? "<div class='bean-slide-caption'>$caption</div>" : '';
                                        $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                                        echo "<li>$caption<img height='$src[2]' src='$src[0]' alt='$alt'/></li>";
                                   }
                         } // END if( !empty($attachments) )
                         ?>
                         </ul><!-- END .slides -->
                    </div><!-- END #slider-$postid -->
               </div><!-- END .post-slider -->

         <?php } // END if( $layout == 'slider' )

         //IF THE FUNCTION'S LAYOUT IS CALLING FOR STACKED IMAGES
         if( $layout == 'lightbox' )
         {
              if( !empty($attachments) )
              { 
                    $feat_image_post = get_post( get_post_thumbnail_id($postid) );
                    $feat_image_url = $feat_image_post->guid;
                    $feat_image_caption = $feat_image_post->post_excerpt;

                    echo "<a class='lightbox featured' rel='$postid' href='$feat_image_url' title='$feat_image_caption'>";
                         echo "<img class='lightbox-img' src='$feat_image_url'>";
                    echo "</a>";

                    $i = 1;
                    foreach( $attachments as $attachment )
                    {
                         $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                         $caption = $attachment->post_excerpt;

                         echo "<a class='lightbox hidden' rel='$postid' href='$src[0]' title='$caption'>";
                              // commenting this to improve initial page loading
                              // echo "<img class='lightbox-img' src='$src[0]'>";
                         echo "</a>";

                         $i++; 
                    }
                  } // END if( !empty($attachments) )

         } // END if( $layout == 'lightbox' )

     } // END function bean_gallery

} // END if ( !function_exists( 'bean_gallery' ) )




/*===================================================================*/
/*  AUDIO POST FORMAT FUNCTION
/*===================================================================*/
if ( !function_exists( 'bean_audio' ) )
{
     function bean_audio($postid)
     {
         //MP3 FROM POST/PORTFOLIO
          $mp3 = get_post_meta($postid, '_bean_audio_mp3', TRUE); ?>

          <div id="jp_container_<?php echo $postid; ?>" class="jp-audio fullwidth" data-file="<?php echo $mp3; ?>">
               <div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer">
               </div><!-- END .jquery_jplayer_<?php echo $postid; ?> -->
               <div class="jp-interface" style="display: none;">
                    <ul class="jp-controls">
                         <li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php _e( 'Play', 'bean' ); ?></span></a></li>
                         <li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php _e( 'Pause', 'bean' ); ?></span></a></li>
                    </ul><!-- END .jp-controls -->
                    <div class="jp-progress">
                         <div class="jp-seek-bar">
                              <div class="jp-play-bar"></div>
                         </div><!-- END .jp-seek-bar -->
                    </div><!-- END .jp-progress -->
               </div><!-- END .jp-interface -->
          </div><!-- END #jp_container_<?php echo $postid; ?> -->

          <?php
     } // END function bean_audio($postid)

} // END if ( !function_exists( 'bean_audio' ) )




/*===================================================================*/
/*  VIDEO POST FORMAT FUNCTION
/*===================================================================*/
if ( !function_exists( 'bean_video' ) )
{
     function bean_video($postid)
     {
          $m4v = get_post_meta($postid, '_bean_video_m4v', true);
          $poster = get_post_meta($postid, '_bean_video_poster', true);
          ?>

          <div id="jp_container_<?php echo $postid; ?>" class="jp-video fullwidth" data-file="<?php echo $m4v; ?>" data-poster="<?php echo $poster; ?>">
               <div class="jp-type-single">
                    <div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer">
                    </div><!-- END .jquery_jplayer_<?php echo $postid; ?> -->
                    <div class="jp-interface" style="display: none;">
                         <ul class="jp-controls">
                              <li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php _e( 'Play', 'bean' ); ?></span></a></li>
                              <li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php _e( 'Pause', 'bean' ); ?></span></a></li>
                         </ul><!-- END .jp-controls -->
                         <div class="jp-progress">
                              <div class="jp-seek-bar">
                                   <div class="jp-play-bar"></div>
                              </div><!-- END .jp-seek-bar -->
                         </div><!-- END .jp-progress -->
                    </div><!-- END .jp-interface -->
               </div><!-- END .jp-type-single -->
          </div><!-- END #jp_container_<?php echo $postid; ?> -->

          <?php
     } //END function bean_video($postid)

} //END if ( !function_exists( 'bean_video' ) )