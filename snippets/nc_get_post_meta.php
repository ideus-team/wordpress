<?php

/**
 * Получаем значение метаполя, если передаем конкретный ключ
 * Получаем массив всех метаполей поста, если ключ не передаем
 *
 * Если функцию вызываем в цикле WP, $post_id не передаем
 *
 * @params [string $key] [int $post_id]
 * @returns array, string, false, null
 */
function nc_get_post_meta($key = '', $post_id = 0)
{
  $nc_prefix = nc_get_prefix();

  // Если $post_id  не было передано, получаем его внутри цикла WP
  $post_id = 0 ? get_the_ID() : absint($post_id);
  // Если $key был передан, добавляем префикс
  $key = '' ? '' : $nc_prefix . trim(strip_tags($key));

  // Если $post_id не удалось получить
  if (!is_int($post_id)) {
    die('No post id');
  }

  $meta = get_post_meta($post_id, $key, false);

  // Если $meta - массив значений
  if (is_array($meta)) {
    foreach ($meta as $k => $v) {
      $k = str_replace($nc_prefix, '', $k);
      // Получаем по ключам значения всех метабоксов
      $meta[$k] = $v[0];
    }
  }
  // Если $meta - пустой 
  if (empty($meta)) {
    die('No metafields values');
  }

  return $meta;
}

/*
// Примеры вызова в шаблоне

// Одно поле вне цикла WP
$slider_title = nc_get_post_meta('slider_title', 12);

// Одно поле внутри цикла WP
$slider_title = nc_get_post_meta('slider_title');

// Все поля внутри цикла WP
$meta = nc_get_post_meta();

// Все поля вне цикла WP
$meta = nc_get_post_meta('', 123);
*/

/*
// Было до этого

$meta = array(
  'productpower' => get_post_meta($postID, nc_get_prefix() . 'productpower', true),
  );
*/

?>