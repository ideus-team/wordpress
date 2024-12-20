<?php
$post_type = 'post';
$category  = get_query_var( 'cat' );
$orderby   = 'date';
$order     = 'DESC';
$per_page  = 10;
$template  = 'post';

$query = new WP_Query( array(
	'post_type'      => $post_type,
	'cat'            => $category,
	'orderby'        => array( $orderby => $order ),
	'posts_per_page' => $per_page,
) );

if ( $query->have_posts() ) :
?>

	<div class="b-posts">

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

			<?php get_template_part( 'template-parts/content/' . $template ); ?>

		<?php endwhile; ?>

	</div>

	<?php if ( $query->found_posts > $per_page && -1 !== $per_page ) : ?>

		<button class="b-loadMore js-loadMore" type="button" data-container=".b-posts" data-orderby="<?php echo esc_attr( $orderby ); ?>" data-order="<?php echo esc_attr( $order ); ?>" data-post_type="<?php echo esc_attr( $post_type ); ?>" data-category="<?php echo esc_attr( $category ); ?>" data-offset="<?php echo esc_attr( $per_page ); ?>" data-count="<?php echo esc_attr( $per_page ); ?>" data-template="<?php echo esc_attr( $template ); ?>">Load More</button>

	<?php endif; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
