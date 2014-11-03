<?php
//Регистрируем новый тип записи для раздела «Вопросы и ответы»
add_action('init', 'nc_post_faq');
function nc_post_faq() {
  $labels = array(
    'name'               => 'Вопросы и ответы',
    'singular_name'      => 'Вопрос',
    'add_new'            => 'Добавить новый',
    'add_new_item'       => 'Добавить новый вопрос',
    'edit_item'          => 'Редактировать вопрос',
    'new_item'           => 'Новый вопрос',
    'all_items'          => 'Все вопросы',
    'view_item'          => 'Посмотреть вопрос',
    'search_items'       => 'Найти вопрос',
    'not_found'          => 'Вопросов не найдено',
    'not_found_in_trash' => 'В корзине вопросов не найдено',
    'menu_name'          => 'FAQ'
  );
  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_nav_menus'   => false,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => null,
    'menu_icon'           => null,
    'hierarchical'        => false,
    'supports'            => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'taxonomies'          => array(),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true
  );
  register_post_type('faq', $args);
}
?>