<?php
// Get page URL by slug with Polylang support
function nc_page_link($slug) {
  $find_page = get_page_by_path($slug);

  if (!$find_page) {
    return null;
  }

  if (function_exists('pll_get_post')) {
    $page_translate_id = pll_get_post($find_page->ID);
    $page_link = get_page_link($page_translate_id);
  } else {
    $page_link = get_page_link($find_page->ID);
  }

  return $page_link;
}
?>
