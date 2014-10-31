<?php get_header(); ?>

<main class="l-contentText" role="main">
  <?php while (have_posts()) : the_post(); ?>
    <section class="b-contentText b-text">
      <?php the_content(); ?>
    </section>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>