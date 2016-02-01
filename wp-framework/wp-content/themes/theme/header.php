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
<html class="l-html -device_<?php echo nc_device(); ?> no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">

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
<body <?php body_class('l-body'); ?>>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="l-wrapper">
    <header class="l-siteHeader" role="banner">
      <div class="b-siteHeader">
        <div class="l-siteLogo">
          <?php
            $siteLogo__iconURL = get_template_directory_uri().'/assets/img/blocks/siteLogo/siteLogo-logo.png';
            //$siteLogo__iconURL = (nc_device()=='mobile') ? get_template_directory_uri().'/assets/img/blocks/siteLogo/siteLogo-logo-mobile.png' : get_template_directory_uri().'/img/blocks/siteLogo/siteLogo-logo.png';
            $siteLogo__tag  = (is_front_page() && !is_paged()) ? 'h1' : 'div';
            $siteLogo__link = (is_front_page() && !is_paged()) ? '' : ' href="'.site_url('/').'"';
          ?>
          <<?php echo $siteLogo__tag; ?> class="b-siteLogo" itemscope itemtype="http://schema.org/Organization">
            <a class="b-siteLogo__link"<?php echo $siteLogo__link; ?> itemprop="url">
              <img class="b-siteLogo__icon" src="<?php echo $siteLogo__iconURL; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" itemprop="logo" />
            </a>
          </<?php echo $siteLogo__tag; ?>>
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