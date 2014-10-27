<?php
add_action('after_setup_theme', 'nc_setup');
function nc_setup() {
  remove_action('wp_head', 'wp_generator');
  //remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  //remove_action('wp_head', 'index_rel_link');
  //remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  //remove_action('wp_head', 'start_post_rel_link', 10, 0);
  //remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  //remove_action('wp_head', 'rel_canonical');

  /*
   * Switches default core markup for search form, comment form,
   * and comments to output valid HTML5.
   */
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));

  // Navigation
  register_nav_menus(array(
    'header'          => 'Navigation Top Menu',
    'footer'          => 'Navigation Bottom Menu'
  ));

  /*
   * This theme uses a custom image size for featured images, displayed on
   * "standard" posts and pages.
   */
  add_theme_support('post-thumbnails');
}
?>