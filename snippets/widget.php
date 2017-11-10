<?php
/**
 * Create blank widget
 */
add_action( 'widgets_init', 'nc_register_widgets' );
function nc_register_widgets() {
  register_widget( 'NC_Blank_Widget' );
}

class NC_Blank_Widget extends WP_Widget {

  /**
   * Constructs the new widget.
   *
   * @see WP_Widget::__construct()
   */
  function __construct() {
      // Instantiate the parent object.
      parent::__construct( 'nc_widget', 'Blank Widget' );
  }

  /**
   * The widget's HTML output.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Display arguments including before_title, after_title,
   *                        before_widget, and after_widget.
   * @param array $instance The settings for the particular instance of the widget.
   */
  function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];

    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    echo $args['after_widget'];
  }

  /**
   * The widget update handler.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance The new instance of the widget.
   * @param array $old_instance The old instance of the widget.
   * @return array The updated instance of the widget.
   */
  function update( $new_instance, $old_instance ) {
    return $new_instance;
  }

  /**
   * Output the admin widget options form HTML.
   *
   * @param array $instance The current widget settings.
   * @return string The HTML markup for the form.
   */
  function form( $instance ) {
    $title = @ $instance['title'] ?: '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
  }
}
