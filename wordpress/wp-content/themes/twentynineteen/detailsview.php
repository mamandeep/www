<?php
    /* Template Name: Details View */ 
 
    get_header(); ?>
 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
 
            // Include the page content template.
            get_template_part( 'template-parts/content', 'page' );
 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
 
            // End of the loop.
        endwhile;
         $post = $_POST;

    //update_post_meta( $post['post_id'], 'post_data', $post );
?>
    </main><!-- .site-main -->
 
    <?php //get_sidebar( 'content-bottom' ); ?>
 
</div><!-- .content-area -->
 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
