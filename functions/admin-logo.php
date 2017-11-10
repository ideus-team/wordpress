<?php
/*
 * Add own logo to login page
 */
add_action( 'login_enqueue_scripts', 'nc_admin_logo' );
function nc_admin_logo() { ?>
  <style>
    .login #login h1 a {background-image: url(<?php echo get_theme_file_uri( 'assets/img/admin/login-logo.png' ); ?>);}
  </style>
<?php
}
