<?php function my_pre_save_post( $post_id ) {

    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }

    // Create a new post
    $post = array(
        'post_status'  => 'draft',
        'post_title'  => 'Title',
        'post_type'  => 'offre'
    );
    // TODO TITLE == Changer mettre un $_POST
    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    $_POST['post_id'] = $post_id;
    return $post_id;
}

add_filter('acf/pre_save_post' , 'my_pre_save_post' );

?>
