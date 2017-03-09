<?php
/**
 * TinyMCE Custom Styles
 */
add_filter('mce_buttons_2', 'nc_mce_buttons');
function nc_mce_buttons($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}

add_filter('tiny_mce_before_init', 'nc_mce_insert_formats');
function nc_mce_insert_formats($init_array) {
  $style_formats = array(
    array(
      'title'   => 'Quote',
      'inline'   => 'span',
      'classes' => '-style_quote',
      'wrapper' => false,
    ),
    array(
      'title'   => 'Yellow Block',
      'block'   => 'div',
      'classes' => '-style_block',
      'wrapper' => true,
    ),
    array(
      'title'   => 'Button',
      'inline'   => 'span',
      'classes' => '-style_button',
      'wrapper' => false,
    ),
  );
  $init_array['style_formats'] = json_encode($style_formats);

  return $init_array;
}
?>
