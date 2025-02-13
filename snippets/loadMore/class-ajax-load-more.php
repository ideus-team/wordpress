<?php
/**
 * Class AJAX_Load_More
 */

namespace iDeus\Theme;
use WP_Query;

if ( ! class_exists( 'iDeus\Theme\AJAX_Load_More' ) ) {
	/**
	 * AJAX request, action 'nc_load_more'
	 */
	class AJAX_Load_More {

		/**
		 * Class initialization
		 */
		public function __construct() {
			add_action( 'wp_ajax_nc_load_more', array( $this, 'ajax_callback' ) );
			add_action( 'wp_ajax_nopriv_nc_load_more', array( $this, 'ajax_callback' ) );
		}


		/**
		 * Processing AJAX request
		 */
		public function ajax_callback() {
			$result = array();

			if ( ! $_POST['postdata'] ) {
				$result['error'] = 'Empty postdata';
			} else {
				$args = wp_parse_args(
					$_POST['postdata'],
					array(
						'post_type' => 'post',
						'taxonomy'  => 'category',
						'term'      => 0,
						'orderby'   => 'date',
						'order'     => 'DESC',
						'offset'    => get_option( 'posts_per_page', 10 ),
						'count'     => get_option( 'posts_per_page', 10 ),
						'template'  => 'post',
					)
				);

				$result = array(
					'offset'  => $args['offset'],
					'content' => '',
				);

				if ( $args['taxonomy'] && $args['term'] ) {
					$tax_query = array(
						array(
							'taxonomy' => $args['taxonomy'],
							'terms'    => $args['term'],
						),
					);
				} else {
					$tax_query = array();
				}

				$query = new WP_Query( array(
					'post_type'      => $args['post_type'],
					'tax_query'      => $tax_query,
					'orderby'        => array(
						$args['orderby'] => $args['order'],
					),
					'posts_per_page' => $args['count'],
					'offset'         => $args['offset'],
				) );

				$result['total'] = $query->found_posts;

				while ( $query->have_posts() ) {
					$query->the_post();
					ob_start();
					get_template_part( 'template-parts/content/' . $args['template'] );
					$result['content'] .= ob_get_clean();
					$result['offset'] ++;
				}

				wp_reset_postdata();
			}

			if ( ! $result['error'] ) {
				wp_send_json_success( $result );
			} else {
				wp_send_json_error( $result );
			}
		}

	}
}
