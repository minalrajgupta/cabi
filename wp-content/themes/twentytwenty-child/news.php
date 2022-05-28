<?php 
/**
 *
 * Template Name: News Page
 *
 * @package twentytwenty
 */

get_header();
?>
<div class="container">
<div class="row">
    <h1 class="news-title">News</h1>
    <?php
    $args = array( 'post_type' => 'news', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="col-md-4">
                <div class="card">
                  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="featured image"></a>
                  <div class="card-body">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                    <p class="card-text"><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                  </div>
                  </div>
                </div>
        <?php endwhile; ?>
</div>
</div>
<?php get_footer();
