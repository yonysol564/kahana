<?php 	

//--------------------------  E V E N T   P O S T   -----------------------------

function project_post_type() {

	$labels = array(
		'name'                  => _x( 'פרויקטים', 'Post Type General Name', 'kahana' ),
		'singular_name'         => _x( 'פרויקט', 'Post Type Singular Name', 'kahana' ),
		'menu_name'             => __( 'פרויקטים', 'kahana' ),
		'name_admin_bar'        => __( 'פרויקטים', 'kahana' ),
		'archives'              => __( 'Item Archives', 'kahana' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kahana' ),
		'all_items'             => __( 'כל הפרויקטיים', 'kahana' ),
		'add_new_item'          => __( 'Add New Item', 'kahana' ),
		'add_new'               => __( 'פרויקט חדש', 'kahana' ),
		'new_item'              => __( 'New Item', 'kahana' ),
		'edit_item'             => __( 'Edit Item', 'kahana' ),
		'update_item'           => __( 'Update Item', 'kahana' ),
		'view_item'             => __( 'View Item', 'kahana' ),
		'search_items'          => __( 'Search Item', 'kahana' ),
		'not_found'             => __( 'Not found', 'kahana' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kahana' ),
		'featured_image'        => __( 'Featured Image', 'kahana' ),
		'set_featured_image'    => __( 'Set featured image', 'kahana' ),
		'remove_featured_image' => __( 'Remove featured image', 'kahana' ),
		'use_featured_image'    => __( 'Use as featured image', 'kahana' ),
		'insert_into_item'      => __( 'Insert into item', 'kahana' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kahana' ),
		'items_list'            => __( 'Items list', 'kahana' ),
		'items_list_navigation' => __( 'Items list navigation', 'kahana' ),
		'filter_items_list'     => __( 'Filter items list', 'kahana' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'kahana' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies'            => array( 'genre','post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'menu_icon'             => 'dashicons-video-alt',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'project_post_type', 0 );

// Register Genres Taxonomy
function project_taxonomy() {
	$labels = array(
		'name'                       => _x( 'קטגוריות', 'Taxonomy General Name', 'kahana' ),
		'singular_name'              => _x( 'קטגוריה', 'Taxonomy Singular Name', 'kahana' ),
		'menu_name'                  => __( 'קטגוריות', 'kahana' ),
		'all_items'                  => __( 'All Items', 'kahana' ),
		'parent_item'                => __( 'Parent Item', 'kahana' ),
		'parent_item_colon'          => __( 'Parent Item:', 'kahana' ),
		'new_item_name'              => __( 'New Item Name', 'kahana' ),
		'add_new_item'               => __( 'Add New Item', 'kahana' ),
		'edit_item'                  => __( 'Edit Item', 'kahana' ),
		'update_item'                => __( 'Update Item', 'kahana' ),
		'view_item'                  => __( 'View Item', 'kahana' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'kahana' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'kahana' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'kahana' ),
		'popular_items'              => __( 'Popular Items', 'kahana' ),
		'search_items'               => __( 'Search Items', 'kahana' ),
		'not_found'                  => __( 'Not Found', 'kahana' ),
		'no_terms'                   => __( 'No items', 'kahana' ),
		'items_list'                 => __( 'Items list', 'kahana' ),
		'items_list_navigation'      => __( 'Items list navigation', 'kahana' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_cat', array( 'project' ), $args );
}
add_action( 'init', 'project_taxonomy', 0 );



?>
