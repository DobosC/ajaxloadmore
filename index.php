<?php get_header()?>

<?php
$posts = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 2,
  'orderby' => 'date',
  'order' => 'DESC',
  'paged' => 1,
]);
?>

<?php if ($posts->have_posts()) : ?>
 <div class="publication-list">
    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
    
        <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    
        <p class="date-author">Posted: <?php the_date(); ?> by <?php the_author(); ?></p>
    
        <?php the_content(); ?>
    
        <p class="postmetadata">Filed in: <?php the_category(); ?> | Tagged: <?php the_tags(); ?> | <a href="<?php comments_link(); ?>" title="Leave a comment">Comments</a></p>
    
    <?php endwhile; ?>
 </div>
 
 <div class="btn__wrapper">
    <a href="#!" class="btn btn__primary" id="load-more">Load more</a>
 </div>
 
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer()?>
