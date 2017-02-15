<?php
$query = new WP_Query(array(
  'post_type'      => 'post',
  'orderby'        => 'date',
  'order'          => 'DESC',
  'posts_per_page' => 5
));
?>
<?php if($query->have_posts()): ?>

  <?php while($query->have_posts()): $query->the_post(); ?>

  <?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
