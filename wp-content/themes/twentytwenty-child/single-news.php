<?php
/**
 *The template for displaying all single news
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package twentytwenty
 */
get_header();
?>
<div class="container">
  <?php the_post_thumbnail(); ?>
  <div class="title">
    <h1 class="h2"><?php the_title(); ?></h1>
  </div>
  <?php while( have_posts() ) : the_post();
  the_content();
  endwhile; ?>
</div>

<?php get_footer();
