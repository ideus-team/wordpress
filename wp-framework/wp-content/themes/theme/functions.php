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

  // Styles for editor
  add_editor_style('css/editor-style.css');

  // Navigation
  register_nav_menus(array(
    'header'  => 'Navigation Top Menu',
    'footer'  => 'Navigation Bottom Menu'
  ));

  /*
   * This theme uses a custom image size for featured images, displayed on
   * "standard" posts and pages.
   */
  add_theme_support('post-thumbnails');
}

// Styles
add_action('wp_enqueue_scripts', 'nc_styles');
function nc_styles() {
  $protocol = is_ssl() ? 'https' : 'http';
	//wp_enqueue_style('googlefonts', $protocol.'://fonts.googleapis.com/css?family=Lato:100,300,400,600,700,900|Open+Sans:400,300,600,700,800|');
  wp_enqueue_style('css-main', get_template_directory_uri().'/css/main.css', false, filemtime(get_template_directory().'/css/main.css'));
}

// Scripts
add_action('wp_enqueue_scripts', 'nc_scripts');
function nc_scripts() {
  wp_deregister_script('jquery');
  if (nc_iever('<=', 8)) {
    wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery-1.11.3.min.js', false, '1.11.3');
    wp_register_script('ie8', get_template_directory_uri().'/js/legacy/ie8.js', false, null);
  } else {
    wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery-2.1.4.min.js', false, '2.1.4');
  }
  wp_enqueue_script('jquery');
  wp_enqueue_script('ie8');
}


// Detects which version of Internet Explorer browser the user is using.
function nc_iever($compare=false, $to=NULL){
  if (!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $m) || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])) {
    return false === $compare ? false : NULL;
  }
  if (false !== $compare && in_array($compare, array('<', '>', '<=', '>=', '==', '!=')) && in_array((int)$to, array(5,6,7,8,9,10))) {
      return eval('return ('.$m[1].$compare.$to.');');
  } else {
    return (int)$m[1];
  }
}


// Modify except
add_filter('excerpt_more', 'nc_excerpt_more');
function nc_excerpt_more($more) {
  return '…';
}

add_filter('excerpt_length', 'nc_excerpt_length');
function nc_excerpt_length($length) {
	return 20;
}
?>