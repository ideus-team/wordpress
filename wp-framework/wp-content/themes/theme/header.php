<?php
switch (nc_device()) {
  case 'mobile':
    $viewport = '640';
    break;
  case 'tablet':
    $viewport = '1024';
    break;
  case 'desktop':
  default:
    $viewport = 'device-width';
    break;
}
?>
<!DOCTYPE html>
<!--[if IE 7]>         <html class="-device_<?php echo nc_device(); ?> no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="-device_<?php echo nc_device(); ?> no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="-device_<?php echo nc_device(); ?> no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="-device_<?php echo nc_device(); ?> no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title><?php wp_title('::', true, 'right'); ?><?php bloginfo('name'); ?></title>

  <meta name="viewport" content="width=<?php echo $viewport; ?>" />
  <?php if((nc_device() == 'mobile') && nc_ie()): ?>
    <style>
      @-ms-viewport {
        width: <?php echo $viewport; ?>px;
      }
    </style>
  <?php endif; ?>

  <link rel="shortcut icon" href="<?php echo site_url('/favicon.ico'); ?>" />
  <link rel="apple-touch-icon" href="<?php echo site_url('/apple-touch-icon.png'); ?>" />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css?<?php echo filemtime(get_template_directory().'/css/main.css'); ?>" />

  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
  <script>window.Modernizr || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"><\/script>')</script>

  <?php wp_head(); ?>
  <?php get_template_part('scripts', 'header'); ?>
</head>
<body <?php body_class('-page_lang_en'); ?> id="%SiteURI%">
  <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <div class="l-wrapper">
    <header class="l-siteHeader" role="banner">
      <div class="l-siteLogo">
        <?php
          $siteLogo__iconURL = get_template_directory_uri().'/img/siteLogo__icon.png';
          //$siteLogo__iconURL = (nc_device()=='mobile') ? get_template_directory_uri().'/img/siteLogo__icon-mobile.png' : get_template_directory_uri().'/img/siteLogo__icon.png';
        ?>
        <?php if(is_front_page()): ?>
          <h1 class="b-siteLogo" itemscope itemtype="http://schema.org/Organization">
            <a class="b-siteLogo__link" itemprop="url">
              <img class="b-siteLogo__icon" src="<?php echo $siteLogo__iconURL; ?>" alt="<?php echo $siteName; ?>" title="<?php echo $siteName; ?>" itemprop="logo" />
            </a>
          </h1>
        <?php else: ?>
          <div class="b-siteLogo" itemscope itemtype="http://schema.org/Organization">
            <a class="b-siteLogo__link" href="<?php echo site_url('/'); ?>" itemprop="url">
              <img class="b-siteLogo__icon" src="<?php echo $siteLogo__iconURL; ?>" alt="<?php echo $siteName; ?>" title="<?php echo $siteName; ?>" itemprop="logo" />
            </a>
          </div>
        <?php endif; ?>
      </div>

      <?php get_search_form(); ?>

      <nav class="l-siteNavigation" role="navigation">
        <?php
        wp_nav_menu(array(
          'theme_location'  => 'header',
          'container'       => false,
          'menu_class'      => 'b-mainNavigation',
          'fallback_cb'     => false,
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          'depth'           => 1,
          'walker'          => new nc_Walker_Nav_Menu
        ));
        ?>
      </nav>
    </header>

    <div class="l-content">