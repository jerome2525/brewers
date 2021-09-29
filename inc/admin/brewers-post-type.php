<?php
class Brewers_Post_Type {

  public function __construct() {
    $this->register_post_type();
  }

  public function create_post_type() {
    $brewers_labels = array(
        'name'                => _x( 'Brewers', 'Post Type General Name', 'brewers' ),
        'singular_name'       => _x( 'Brewer', 'Post Type Singular Name', 'brewers' ),
        'menu_name'           => __( 'Brewers', 'brewers' ),
        'parent_item_colon'   => __( 'Parent Brewers', 'brewers' ),
        'all_items'           => __( 'All Brewers', 'brewers' ),
        'view_item'           => __( 'View Brewers', 'brewers' ),
        'add_new_item'        => __( 'Add New Brewers', 'brewers' ),
        'add_new'             => __( 'Add New', 'brewers' ),
        'edit_item'           => __( 'Edit Brewers', 'brewers' ),
        'update_item'         => __( 'Update Brewers', 'brewers' ),
        'search_items'        => __( 'Search Brewers', 'brewers' ),
        'not_found'           => __( 'Not Found', 'brewers' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'brewers' ),
    );
     
    $brewers_args = array(
        'label'               => __( 'Brewers', 'brewers' ),
        'description'         => __( 'Brewers', 'brewers' ),
        'labels'              => $brewers_labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
        'menu_icon'           => 'dashicons-beer'
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'brewers', $brewers_args );
  }

  public function register_post_type() {
    add_action( 'init', array( $this, 'create_post_type' ) );
  }

}

$brewers_post_type = new Brewers_Post_Type();
?>