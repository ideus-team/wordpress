<?php
//seo заголовки начало
add_filter('wp_title', 'nc_title');
function nc_title() {
  global $page, $paged;
  $sep = " | "; # разделитель
  $newtitle = get_bloginfo('name'); # заголовок по умолчанию

  # Ошибка 404 #
  if (is_404()) {
    $newtitle = "Ошибка 404 — страница не найдена";
  }
  # Страница поста #
  if (is_single() || is_page()) {
    $newtitle = single_post_title("", false);
  }
  # Категории #
  if (is_category()) {
    $newtitle = single_cat_title("", false);
  }
  # Тэги #
  if (is_tag()) {
    $newtitle = single_tag_title("", false);
  }
  # Результаты поиска #
  if (is_search()) {
    $newtitle = "Результаты поиска: " . get_search_query();
  }
  # Taxonomy #
  if (is_tax()) {
    $curr_tax = get_taxonomy(get_query_var('taxonomy'));
    $curr_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); # current term data
    # if it's term
    if (!empty($curr_term)) {
      $newtitle = $curr_tax->label . $sep . $curr_term->name;
    } else {
      $newtitle = $curr_tax->label;
    }
  }
  # Добавить номер страницы, если нужно
  if ($paged >= 2 || $page >= 2) {
    $newtitle .= $sep . sprintf('Страница %s', max($paged, $page));
  }
  # Home &#038; Front Page #
  if (is_home() || is_front_page()) {
    if (get_bloginfo('description')) {
      $newtitle = get_bloginfo('name') . $sep . get_bloginfo('description');
    } else {
      $newtitle = get_bloginfo('name');
    }
  } elseif (is_feed()) {
    $newtitle = '';
  } else {
    $newtitle .=  $sep . get_bloginfo('name');
  }
  return $newtitle;
}
?>