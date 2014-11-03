<?php
//Регистрируем новую таксономию для раздела «Вопросы и ответы»
add_action('init', 'nc_taxonomy_faq', 0);
function nc_taxonomy_faq() {
  $labels = array(
    'name'              => 'Категории',
    'singular_name'     => 'Категория',
    'search_items'      => 'Найти категорию',
    'all_items'         => 'Все категории',
    'parent_item'       => 'Родительская категория',
    'parent_item_colon' => 'Родительская категория:',
    'edit_item'         => 'Редактировать категорию',
    'view_item'         => 'Просмотреть категорию',
    'update_item'       => 'Обновить категорию',
    'add_new_item'      => 'Добавить новую категорию',
    'new_item_name'     => 'Название',
    'menu_name'         => 'Категории'
  ); 
  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => false,
    'show_ui'           => true,
    'show_tagcloud'     => false,
    'hierarchical'      => true,
    'rewrite'           => false
  );
  register_taxonomy('faq-category', 'faq', $args);
}
?>