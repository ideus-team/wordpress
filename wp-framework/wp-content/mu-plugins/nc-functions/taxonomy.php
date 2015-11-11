<?php
/*
// New taxonomy for Blog
add_action('init', 'nc_taxonomy_blog', 0);
function nc_taxonomy_blog() {
  $labels = array(
    'name'              => 'Blog Categories',
    'singular_name'     => 'Category',
    'search_items'      => 'Search Categories',
    'all_items'         => 'All Categories',
    'parent_item'       => 'Parent Category',
    'parent_item_colon' => 'Parent Category:',
    'edit_item'         => 'Edit Category',
    'view_item'         => 'View Category',
    'update_item'       => 'Update Category',
    'add_new_item'      => 'Add New Category',
    'new_item_name'     => 'New Category Name',
    'menu_name'         => 'Categories'
  );
  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_ui'           => true,
    'show_tagcloud'     => false,
    'hierarchical'      => true,
    'rewrite'           => array('slug' => 'blog-cat'),
    'query_var'         => true
  );
  register_taxonomy('blog-cat', 'blog', $args);
}
*/
?>