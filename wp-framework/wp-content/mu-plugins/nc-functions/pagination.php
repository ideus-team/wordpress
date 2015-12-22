<?php
// Pagination (http://dimox.name/wordpress-pagination-without-a-plugin/)
function nc_pagenavi($args = array()) {
  global $wp_query, $wp_rewrite;

  $args = wp_parse_args(
    $args, array(
      'query' => $wp_query,
      'echo'  => true,
    )
  );

  $query = $args['query'];

  $pages = '';
  $max = $query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $found = true; // Show "Found N"
  $total = true; // Show "Page N of N"
  $a['mid_size'] = 1;
  $a['end_size'] = 3;
  $a['prev_text'] = '←';
  $a['next_text'] = '→';
  $a['type'] = 'array';
  $class = 'b-pagination';

  $search = array(
    'page-numbers',
    'prev',
    'next',
    'dots',
    'current',
    '/page/1/'
  );
  $replace = array(
    $class.'__link',
    '-type_prev',
    '-type_next',
    '-type_dots',
    '-state_current',
    ''
  );

  if ($max > 1) {
    $pages .= '<div class="'.$class.'">'."\r";

    if ($found) $pages .= '<span class="'.$class.'__total">Found '.$query->found_posts.'</span>'."\r";
    if ($total) $pages .= '<span class="'.$class.'__pages">Page '.$current.' of '.$max.'</span>'."\r";

    $pages .= '<ul class="'.$class.'__list">'."\r";
    $paginationList = str_replace($search, $replace, paginate_links($a));
    foreach ($paginationList as $value) {
      $pages .= '<li class="'.$class.'__item">'.$value.'</li>'."\r";
    }
    $pages .= '</ul>'."\r";

    $pages .= '</div>';
  }

  if ($args['echo']) {
    echo $pages;
  } else {
    return $pages;
  }
}
?>