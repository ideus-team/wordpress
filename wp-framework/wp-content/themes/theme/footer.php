    </div><!--content-->

    <footer class="l-siteFooter" role="contentinfo">
      <div class="b-siteFooter">
        <div class="l-siteNavigationBottom" role="navigation">
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'footer',
            'container'       => false,
            'menu_class'      => 'b-bottomNavigation',
            'fallback_cb'     => false,
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 1,
            'walker'          => new nc_Walker_Nav_Menu
          ));
          ?>
        </div>

        <address class="l-siteCopyright vcard" itemscope itemtype="http://schema.org/Organization">
          <div class="b-siteCopyright">© <?php echo date('Y'); ?> <a rel="me" itemprop="name" class="b-siteCopyright__link fn n org url work" href="<?php echo site_url('/'); ?>"><?php bloginfo('name'); ?></a>. Все права защищены</div>
          <div class="b-developerCopyright">Разработано в <a rel="friend" class="b-developerCopyright__link" href="http://ideus.biz/" target="_blank">iDeus</a></div>
        </address>
      </div>
    </footer>
  </div><!--wrapper-->

  <?php wp_footer(); ?>
  <?php get_template_part('tpl/scripts', 'footer'); ?>
</body>
</html>
