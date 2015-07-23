<?php get_header(); ?>

<main class="l-contentText" role="main">
  <?php while (have_posts()) : the_post(); ?>
    <?php
    /* Get Custom Fields Example
    $meta = array(
      'text1' => get_post_meta(get_the_ID(), '_nc_text1', true),
      'text2' => get_post_meta(get_the_ID(), '_nc_text2', true),
    );
    */
    ?>
    <section class="b-contentText b-text">
      <?php the_content(); ?>
    </section>
  <?php endwhile; ?>

  <?php nc_pagenavi(); ?>
</main>

<?php get_footer(); ?>