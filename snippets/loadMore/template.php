<div class="b-posts js-posts">

  <?php
  $posts = new WP_Query( array(
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => 10,
  ) );
  ?>
  <?php if ( $posts->have_posts() ) : ?>

    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

      <?php get_template_part( 'template-parts/content/post' ); ?>

    <?php endwhile; ?>

  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

</div>

<button class="b-loadMore js-loadMore" data-container=".js-posts" data-post_type="post" data-offset="10" data-count="10">
  Load More
</button>
