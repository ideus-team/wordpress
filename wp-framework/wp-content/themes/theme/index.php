<?php get_header(); ?>

<main class="l-contentText" role="main">
  <?php while (have_posts()) : the_post(); ?>
    <?php
    /* Get Custom Fields Example
    $meta = array(
      'text1' => get_post_meta(get_the_ID(), nc_get_prefix().'text1', true),
      'text2' => get_post_meta(get_the_ID(), nc_get_prefix().'text2', true),
      'group' => get_post_meta(get_the_ID(), nc_get_prefix().'group', true),
    );
    */
    ?>
    <section class="b-contentText">
      <h2 class="b-contentText__title"><?php the_title(); ?></h2>
      <div class="b-contentText__content b-text"><?php the_content(); ?></div>
    </section>
  <?php endwhile; ?>

  <?php nc_pagenavi(); ?>
</main>

<?php get_footer(); ?>