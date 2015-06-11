<?php
/*
// New post type for Blog
add_action('init', 'nc_post_blog');
function nc_post_blog() {
  $labels = array(
    'name'               => 'Our Blog',
    'singular_name'      => 'Article',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Article',
    'edit_item'          => 'Edit Article',
    'new_item'           => 'New Article',
    'all_items'          => 'All Articles',
    'view_item'          => 'View Article',
    'search_items'       => 'Search Articles',
    'not_found'          => 'No articles found',
    'not_found_in_trash' => 'No articles found in Trash',
    'menu_name'          => 'Our Blog'
  );
  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_nav_menus'   => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => null,
    'menu_icon'           => null,
    'hierarchical'        => false,
    'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
    'taxonomies'          => array(),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true
  );
  register_post_type('blog', $args);
}
*/
?>