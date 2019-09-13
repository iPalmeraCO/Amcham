<?php /* Template Name: importardirectorio */
/*global $wpdb;
$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID, guid FROM $wpdb->posts WHERE post_title='%s' and post_type='attachment';", "alorica" )); 
if (empty($attachment)){
	echo "NO SE ENCONTRO";
}else{	
     update_post_meta( 1819, '_thumbnail_id', $attachment[0] );
}

die();

*/
$a = get_page_by_title( "SERVICIOS LOGÍSTICOS INTEGRADOS - SLI",OBJECT,'post' );
$page = get_page_by_title('About', OBJECT, 'post');
print_r($a);
var_dump($a);

die();

// Initialize the post ID to -1. This indicates no action has been taken.
$post_id = -1;

// Setup the author, slug, and title for the post
$author_id = 1;
//$slug = 'example-post';
$title = 'My Example Post juns';
$insert = true;
// If the page doesn't already exist, then create it
if( null == get_page_by_title( $title ) ) {

	// Set the page ID so that we know the page was created successfully
	$post_id = wp_insert_post(
		array(
			'comment_status'	=>	'closed',
			'ping_status'		=>	'closed',
			'post_author'		=>	$author_id,
			//'post_name'		=>	$slug,
			'post_title'		=>	$title,
			'post_status'		=>	'publish',
			'post_type'		=>	'post',
			'post_category' => array(10,39)
		)
	);

// Otherwise, we'll stop and set a flag
} else {

    // Arbitrarily use -2 to indicate that the page with the title already exists
    $post_id = -2;
    $insert = false;

} // end if

if ($insert){	
    add_post_meta( $post_id, 'direccion', "DIRECCION" );
}else {
	echo "NO INSERTO";
}



?>