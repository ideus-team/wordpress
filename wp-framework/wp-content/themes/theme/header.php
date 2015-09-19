<?php
switch (nc_device()) {
  case 'mobile':
    $viewport     = '1024px';
    $viewportMeta = '1024';
    break;
  case 'tablet':
    $viewport     = 'device-width';
    $viewportMeta = 'device-width';
    break;
  case 'desktop':
  default:
    $viewport     = 'device-width';
    $viewportMeta = 'device-width';
    break;
}
?>
<!doctype html>
<html class="-device_<?php echo nc_device(); ?> no-js" lang="">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title><?php wp_title('::', true, 'right'); ?><?php bloginfo('name'); ?></title>

  <!-- <meta property="og:image" content="<?php echo $BASE_URL; ?>/img/userfiles/og-image.png" /> -->

  <meta name="viewport" content="width=<?php echo $viewportMeta; ?>" />
  <style>
    @-ms-viewport {
      width: <?php echo $viewport; ?>;
    }
    @viewport {
      width: <?php echo $viewport; ?>;
    }
  </style>

  <link rel="shortcut icon" href="<?php echo site_url('/favicon.ico'); ?>" />
  <link rel="apple-touch-icon" href="<?php echo site_url('/apple-touch-icon.png'); ?>" />

  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
  <script>window.Modernizr || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/modernizr-2.8.3.min.js"><\/script>')</script>

  <?php wp_head(); ?>
  <?php get_template_part('tpl/scripts', 'header'); ?>
</head>
<body <?php body_class('-page_lang_en'); ?> id="%SiteURI%">
  <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <div class="l-wrapper">
    <header class="l-siteHeader" role="banner">
      <div class="b-siteHeader">
        <div class="l-siteLogo">
          <?php
            $siteLogo__iconURL = get_template_directory_uri().'/assets/img/blocks/l-siteLogo/l-siteLogo-logo.png';
            //$siteLogo__iconURL = (nc_device()=='mobile') ? get_template_directory_uri().'/assets/img/blocks/l-siteLogo/l-siteLogo-logo-mobile.png' : get_template_directory_uri().'/img/blocks/l-siteLogo/l-siteLogo-logo.png';
          ?>
          <?php if(is_front_page() && !is_paged()): ?>
            <h1 class="b-siteLogo" itemscope itemtype="http://schema.org/Organization">
              <a class="b-siteLogo__link" itemprop="url">
                <img class="b-siteLogo__icon" src="<?php echo $siteLogo__iconURL; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" itemprop="logo" />
              </a>
            </h1>
          <?php else: ?>
            <div class="b-siteLogo" itemscope itemtype="http://schema.org/Organization">
              <a class="b-siteLogo__link" href="<?php echo site_url('/'); ?>" itemprop="url">
                <img class="b-siteLogo__icon" src="<?php echo $siteLogo__iconURL; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" itemprop="logo" />
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
      </div>
    </header>

    <div class="l-content">