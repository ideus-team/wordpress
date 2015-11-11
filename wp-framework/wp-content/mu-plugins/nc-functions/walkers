<?php
class nc_Walker_Nav_Menu extends Walker {
  var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"".$args->menu_class."__submenu\">\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = '-id_' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . $args->menu_class .'__item ' . esc_attr( $class_names ) . '"' : '';

    $output .= $indent . '<li' . $value . $class_names .'>';

    $atts = array();
    $atts['title']        = ! empty( $item->attr_title )  ? $item->attr_title            : '';
    $atts['target']       = ! empty( $item->target )      ? $item->target                : '';
    $atts['rel']          = ! empty( $item->xfn )         ? $item->xfn                   : '';
    $atts['href']         = ! empty( $item->url )         ? $item->url                   : '';
    $atts['class']        = ! empty( $args->menu_class )  ? $args->menu_class . '__link' : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $item_output = $args->before;
    $item_output .= (!empty($item->url)) ? '<a'. $attributes .'>' : '';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= (!empty($item->description)) ? '<span class="'.$args->menu_class.'__descr">'.$item->description.'</span>' : '';
    $item_output .= (!empty($item->url)) ? '</a>' : '';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}
?>