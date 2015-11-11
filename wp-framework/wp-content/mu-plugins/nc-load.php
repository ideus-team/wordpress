<?php
/*
Plugin Name: WP-framework
Plugin URI: 
Description: Functions for WP-framework
Author: iDeus
Version: 
Author URI: http://ideus.biz
*/

// Admin cookie
require WPMU_PLUGIN_DIR.'/nc-functions/admin-cookie.php';

// body-class
require WPMU_PLUGIN_DIR.'/nc-functions/body-class.php';

// Mobile Detect
require WPMU_PLUGIN_DIR.'/nc-functions/mobile_detect.php';

// Alternative Walkers
require WPMU_PLUGIN_DIR.'/nc-functions/walkers.php';

// Pagination
require WPMU_PLUGIN_DIR.'/nc-functions/pagination.php';

// Thumbnail
require WPMU_PLUGIN_DIR.'/nc-functions/thumbnail.php';

// Custom Post Types
require WPMU_PLUGIN_DIR.'/nc-functions/post-type.php';

// Custom Taxonomies
require WPMU_PLUGIN_DIR.'/nc-functions/taxonomy.php';

// Metabox
require WPMU_PLUGIN_DIR.'/nc-functions/meta-box.php';
?>