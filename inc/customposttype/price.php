<?php
// Register Custom Post Type
function prices_section() {

	$labels = array(
		'name'                  => _x( 'Price', 'Post Type General Name', 'neogymtextdomain' ),
		'singular_name'         => _x( 'Price', 'Post Type Singular Name', 'neogymtextdomain' ),
		'menu_name'             => __( 'Price', 'neogymtextdomain' ),
		'name_admin_bar'        => __( 'Price', 'neogymtextdomain' ),
		'archives'              => __( 'Price Archives', 'neogymtextdomain' ),
		'attributes'            => __( 'Price Attributes', 'neogymtextdomain' ),
		'parent_item_colon'     => __( 'Parent Price:', 'neogymtextdomain' ),
		'all_items'             => __( 'All Price', 'neogymtextdomain' ),
		'add_new_item'          => __( 'Add New Price', 'neogymtextdomain' ),
		'add_new'               => __( 'Add New Price', 'neogymtextdomain' ),
		'new_item'              => __( 'New Price', 'neogymtextdomain' ),
		'edit_item'             => __( 'Edit Price', 'neogymtextdomain' ),
		'update_item'           => __( 'Update Price', 'neogymtextdomain' ),
		'view_item'             => __( 'View Price', 'neogymtextdomain' ),
		'view_items'            => __( 'View Price', 'neogymtextdomain' ),
		'search_items'          => __( 'Search Price', 'neogymtextdomain' ),
		'not_found'             => __( 'Not found Price', 'neogymtextdomain' ),
		'not_found_in_trash'    => __( 'Price Not found in Trash', 'neogymtextdomain' ),
		'featured_image'        => __( 'Price Image', 'neogymtextdomain' ),
		'set_featured_image'    => __( 'Set Price image', 'neogymtextdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'neogymtextdomain' ),
		'use_featured_image'    => __( 'Use as Price image', 'neogymtextdomain' ),
		'insert_into_item'      => __( 'Insert into Price', 'neogymtextdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Price', 'neogymtextdomain' ),
		'items_list'            => __( 'Price list', 'neogymtextdomain' ),
		'items_list_navigation' => __( 'Price list navigation', 'neogymtextdomain' ),
		'filter_items_list'     => __( 'Filter Price list', 'neogymtextdomain' ),
	);
	$args = array(
		'label'                 => __( 'Price', 'neogymtextdomain' ),
		'description'           => __( 'Post Type Description', 'neogymtextdomain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'package_price', $args );

}
add_action( 'init', 'prices_section', 0 );

?>