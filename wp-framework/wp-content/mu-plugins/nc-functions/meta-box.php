<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @link     https://github.com/WebDevStudios/CMB2
 */
if (file_exists(WPMU_PLUGIN_DIR.'/nc-lib/cmb2/init.php')) {
  require_once WPMU_PLUGIN_DIR.'/nc-lib/CMB2/init.php';
}


/**
 * More examples in nc-lib/CMB2/example-functions.php
 */
/*
add_action('cmb2_init', 'nc_register_about_page_metabox');
function nc_register_about_page_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_nc_';

  $cmb_about_page = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Test Metabox', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    // 'show_on'    => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $cmb_about_page->add_field( array(
    'name' => __( 'Test Text', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'text',
    'type' => 'text',
  ) );

}
*/