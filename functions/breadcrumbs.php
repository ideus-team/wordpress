<?php
function nc_breadcrumbs() {
  /* === ОПЦИИ === */
  $text['home'] = 'Home'; // текст ссылки "Главная"
  $text['category'] = ' "%s" Category Archive'; // текст для страницы рубрики
  $text['search'] = 'Search Results for "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Posts with tag "%s"'; // текст для страницы тега
  $text['author'] = '%s'; // текст для страницы автора
  $text['404'] = 'Error 404'; // текст для страницы 404

  $show_current = 1; // 1 - показывать название текущей статьи/страницы/рубрики, 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_title = 1; // 1 - показывать подсказку (title) для ссылок, 0 - не показывать
  $delimiter = ''; // разделить между "крошками"
  $before = '<li class="b-breadcrumbs__item -state_current">'; // тег перед текущей "крошкой"
  $after = '</li>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_link = home_url('/');
  $link_before = '<li class="b-breadcrumbs__item" typeof="v:Breadcrumb">';
  $link_after = '</li>';
  $link_attr = ' rel="v:url" property="v:title"';
  $link = $link_before . '<a class="b-breadcrumbs__link"' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
  $parent_id = $parent_id_2 = $post->post_parent;
  $frontpage_id = get_option('page_on_front');

  if ( get_query_var('paged') ) {
    $pageNum = __('Page') . ' ' . get_query_var('paged');
    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
      $pageNum = '(' . $pageNum . ')';
    }
    $after = ' ' . $pageNum . $after;
  }

  if (is_home() || is_front_page()) {

    if ($show_on_home == 1) echo '<ul class="b-breadcrumbs"><li class="b-breadcrumbs__item"><a class="b-breadcrumbs__link" href="' . $home_link . '">' . $text['home'] . '</a></li></ul>';

  } else {

    echo '<ul class="b-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
    if ($show_home_link == 1) {
      echo '<li class="b-breadcrumbs__item"><a class="b-breadcrumbs__link" href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></li>';
      if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
    }

    if ( is_category() ) {
      $this_cat = get_category(get_query_var('cat'), false);
      if ($this_cat->parent != 0) {
        $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
        if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
        echo $cats;
      }
      if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

    } elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;

    } elseif ( is_day() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->name);
        if ($parent_id) {
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            if ($parent_id != $frontpage_id) {
              $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
            }
            $parent_id = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs)-1) echo $delimiter;
          }
        }
        if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $delimiter);
        if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
        echo $cats;
        if ($show_current == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      $cats = get_category_parents($cat, TRUE, $delimiter);
      $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
      $cats = str_replace('</a>', '</a>' . $link_after, $cats);
      if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
      echo $cats;
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $delimiter;
        }
      }
      if ($show_current == 1) {
        if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
        echo $before . get_the_title() . $after;
      }

    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;

    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;
    }

    echo '</ul><!-- .breadcrumbs -->';

  }
}
