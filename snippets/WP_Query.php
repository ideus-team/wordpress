<?php
/**
 * WP_Query example
 */
$query = new WP_Query(
	array(
		'post_type'      => 'post',
		'orderby'        => array( 'date' => 'DESC' ),
		'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
		'posts_per_page' => 5,
	)
);
if ( $query->have_posts() ) :
?>

	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		?>

	<?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
