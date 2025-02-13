<?php
$query_atts = array(
	'post_type' => 'post',
	'taxonomy'  => 'category',
	'term'      => get_query_var( 'cat' ),
	'orderby'   => 'date',
	'order'     => 'DESC',
	'per_page'  => 10,
	'template'  => 'post',
);

$query = new WP_Query(
	array(
		'post_type'      => $query_atts['post_type'],
		'tax_query' => array(
			array(
				'taxonomy' => $query_atts['taxonomy'],
				'terms'    => $query_atts['term'],
			),
		),
		'orderby'        => array(
			$query_atts['orderby'] => $query_atts['order'],
		),
		'posts_per_page' => $query_atts['per_page'],
	)
);

if ( $query->have_posts() ) :
?>

	<div class="b-posts">

		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			?>

			<?php get_template_part( 'template-parts/content/' . $query_atts['template'] ); ?>

		<?php endwhile; ?>

	</div>

	<?php if ( $query->found_posts > $query_atts['per_page'] && -1 !== $query_atts['per_page'] ) : ?>

		<button
			class="b-loadMore js-loadMore"
			type="button"
			data-container="<?php echo esc_attr( '.b-posts' ); ?>"
			data-orderby="<?php echo esc_attr( $query_atts['orderby'] ); ?>"
			data-order="<?php echo esc_attr( $query_atts['order'] ); ?>"
			data-post_type="<?php echo esc_attr( $query_atts['post_type'] ); ?>"
			data-taxonomy="<?php echo esc_attr( $query_atts['taxonomy'] ); ?>"
			data-term="<?php echo esc_attr( $query_atts['term'] ); ?>"
			data-offset="<?php echo esc_attr( $query_atts['per_page'] ); ?>"
			data-count="<?php echo esc_attr( $query_atts['per_page'] ); ?>"
			data-template="<?php echo esc_attr( $query_atts['template'] ); ?>"
		>Load More</button>

	<?php endif; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
