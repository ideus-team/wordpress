<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @link     https://github.com/WebDevStudios/CMB2
 */
if (file_exists(WPMU_PLUGIN_DIR.'/nc-lib/CMB2/init.php')) {
  require_once WPMU_PLUGIN_DIR.'/nc-lib/CMB2/init.php';
}

function nc_get_prefix() {
  $prefix = '_nc_';
  return $prefix;
}

/**
 * More examples in nc-lib/CMB2/example-functions.php
 */
/*
add_action('cmb2_init', 'nc_metabox_demo');
function nc_metabox_demo() {
  $prefix = nc_get_prefix();

  $cmb = new_cmb2_box(array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Test Metabox', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    // 'show_on'    => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ));

  $cmb->add_field(array(
    'name' => 'Text 1',
    'desc' => 'field description (optional)',
    'id'   => $prefix . 'text1',
    'type' => 'text',
  ));

  $cmb->add_field(array(
    'name' => 'Text 2',
    'desc' => 'field description (optional)',
    'id'   => $prefix . 'text2',
    'type' => 'text',
  ));

  $cmb_group = $cmb->add_field(array(
    'name'        => 'Links',
    'id'          => $prefix . 'group',
    'type'        => 'group',
    'description' => '',
    'options'     => array(
      'group_title'   => 'Entry {#}',
      'add_button'    => 'Add Another Entry',
      'remove_button' => 'Remove Entry',
      'sortable'      => true,
    ),
  ));

  $cmb->add_group_field($cmb_group, array(
    'name' => 'Text',
    'desc' => '',
    'id'   => 'text',
    'type' => 'text',
  ));
}
*/
?>