<?php
function nc_thumbnail($args = array()) {
  $atts['ID']        = isset($args['ID'])        ? $args['ID']                       : get_the_ID();

  $atts['src']       = isset($args['src'])       ? trim($args['src'])                : '';
  $atts['alt']       = isset($args['alt'])       ? $args['alt']                      : '';
  $atts['class']     = isset($args['class'])     ? ' class="'.$args['class'].'"'     : '';
  $atts['width']     = isset($args['width'])     ? '&amp;w='.$args['width']          : '';
  $atts['height']    = isset($args['height'])    ? '&amp;h='.$args['height']         : '';
  $atts['alignment'] = isset($args['alignment']) ? '&amp;a='.$args['alignment']      : '';
  $atts['crop']      = isset($args['crop'])      ? '&amp;zc='.$args['crop']          : '';
  $atts['filters']   = isset($args['filters'])   ? '&amp;f='.$args['filters']        : '';

  $atts['link']      = isset($args['link'])      ? trim($args['link'])               : '';
  $atts['linkClass'] = isset($args['linkClass']) ? $args['linkClass']                : '';
  $atts['linkRel']   = isset($args['linkRel'])   ? ' rel="'.$args['linkRel'].'"'     : '';

  $atts['title']     = isset($args['title'])     ? $args['title']                    : '';

  $atts['echo']      = isset($args['echo'])      ? $args['echo']                     : true;

  if (empty($atts['src'])) {
    if (has_post_thumbnail($atts['ID'])) {
      $attachment_id = get_post_thumbnail_id($atts['ID']);
      $atts['src'] = wp_get_attachment_image_url($attachment_id, 'full');

      if (empty($atts['alt'])) {
        $attachment_alt = esc_attr(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
        $post_title = esc_attr(strip_tags(get_the_title($atts['ID'])));
        $atts['alt'] = ($attachment_alt) ? $attachment_alt : $post_title;
      }
    } else {
      return false;
    }
  }

  if ($atts['width'] || $atts['height']) {
    $thumb_url = get_site_url(null, '/thumb/?src='.$atts['src'].$atts['width'].$atts['height'].$atts['alignment'].$atts['crop'].$atts['filters']);
  } else {
    $thumb_url = $atts['src'];
  }
  $result = '<img'.$atts['class'].' src="'.$thumb_url.'" alt="'.$atts['alt'].'" />';

  $atts['link'] = (!$atts['link'] && $atts['linkClass']) ? $atts['src'] : $atts['link'];

  $title = $atts['title'] ? ' title="'.$atts['title'].'"' : '';

  if ($atts['link']) {
    $linkClass = ' class="'.$atts['linkClass'].'"';
    $result = '<a'.$linkClass.$atts['linkRel'].' href="'.$atts['link'].'"'.$title.'>'.$result.'</a>';
  }

  if ($atts['echo']) {
    echo $result;
  } else {
    return $result;
  }
}

add_filter('post_thumbnail_html', 'nc_remove_width_and_height', 10);
add_filter('image_send_to_editor', 'nc_remove_width_and_height', 10);
function nc_remove_width_and_height($html) {
  return preg_replace('/(height|width)="\d*"\s/', '', $html);
}
?>