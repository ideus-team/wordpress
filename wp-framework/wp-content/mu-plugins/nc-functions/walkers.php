<?php
// Walker for wp_nav_menu
class nc_Walker_Nav_Menu extends Walker_Nav_Menu {
  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"".$args->menu_class."__submenu\">\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $id = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = '-id_' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . $args->menu_class .'__item ' . esc_attr( $class_names ) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title            : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target                : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn                   : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url                   : '';
    $atts['class']  = ! empty( $args->menu_class ) ? $args->menu_class . '__link' : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= (!empty($item->description)) ? '<span class="'.$args->menu_class.'__descr">'.$item->description.'</span>' : '';
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

// Walker for wp_list_pages
class nc_Walker_Page extends Walker_Page {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"".$args['nc_block_name']."__submenu\">\n";
  }

  function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
    if ( $depth ) {
      $indent = str_repeat( "\t", $depth );
    } else {
      $indent = '';
    }

    $css_class = array( $args['nc_block_name'].'__item', 'page_item', '-id_' . $page->ID );

    if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
      $css_class[] = 'page_item_has_children';
    }

    if ( ! empty( $current_page ) ) {
      $_current_page = get_post( $current_page );
      if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
        $css_class[] = 'current_page_ancestor';
      }
      if ( $page->ID == $current_page ) {
        $css_class[] = 'current_page_item';
      } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
        $css_class[] = 'current_page_parent';
      }
    } elseif ( $page->ID == get_option('page_for_posts') ) {
      $css_class[] = 'current_page_parent';
    }

    $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

    if ( '' === $page->post_title ) {
      /* translators: %d: ID of a post */
      $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
    }

    $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
    $args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

    /** This filter is documented in wp-includes/post-template.php */
    $output .= $indent . sprintf(
      '<li class="%s"><a class="'.$args['nc_block_name'].'__link" href="%s">%s%s%s</a>',
      $css_classes,
      get_permalink( $page->ID ),
      $args['link_before'],
      apply_filters( 'the_title', $page->post_title, $page->ID ),
      $args['link_after']
    );

    if ( ! empty( $args['show_date'] ) ) {
      if ( 'modified' == $args['show_date'] ) {
        $time = $page->post_modified;
      } else {
        $time = $page->post_date;
      }

      $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
      $output .= " " . mysql2date( $date_format, $time );
    }
  }
}
?>