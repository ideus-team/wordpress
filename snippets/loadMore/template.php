<?php
$per_page = 10;
$posts = new WP_Query( array(
  'post_type'      => 'post',
  'orderby'        => array( 'date' => 'DESC' ),
  'posts_per_page' => $per_page,
) );

if ( $posts->have_posts() ) :
?>

  <div class="b-posts">

    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

      <?php get_template_part( 'template-parts/content/post' ); ?>

    <?php endwhile; ?>

  </div>

  <?php if ( $posts->found_posts > $per_page ) : ?>

    <button class="b-loadMore js-loadMore" type="button" data-container=".b-posts" data-post_type="post" data-offset="<?php echo $per_page; ?>" data-count="<?php echo $per_page; ?>">Load More</button>

  <?php endif; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
