<?php
// Use our own jQuery
add_action('wp_enqueue_scripts', 'nc_scripts');
function nc_scripts() {
  wp_deregister_script('jquery');
  if (iever('<=', 8)) {
    wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery-1.11.1.min.js', false, '1.11.1');
    wp_register_script('ie8', get_template_directory_uri().'/js/legacy/ie8.js', false, null);
  } else {
    wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery-2.1.1.min.js', false, '2.1.1');
  }
  wp_enqueue_script('jquery');
  wp_enqueue_script('ie8');
}


// Detects which version of Internet Explorer browser the user is using.
function iever($compare=false, $to=NULL){
  if (!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $m) || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])) {
    return false === $compare ? false : NULL;
  }
  if (false !== $compare && in_array($compare, array('<', '>', '<=', '>=', '==', '!=')) && in_array((int)$to, array(5,6,7,8,9,10))) {
      return eval('return ('.$m[1].$compare.$to.');');
  } else {
    return (int)$m[1];
  }
}
?>