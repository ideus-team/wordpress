<?php
add_action('login_enqueue_scripts', 'nc_login_logo');
function nc_login_logo() { ?>
  <style>
    .login #login h1 a {background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/admin/login-logo.png);}
  </style>
<?php
}
?>