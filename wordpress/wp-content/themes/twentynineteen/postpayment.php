<?php 
    /* Template Name: Receive PG Request */ 
 
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
    <table width="100%">
	<tr>
		<td>Advertisement Id:</td>
		<td>1231212</td>
		<td>Post Name:</td>
		<td>Assistant Professor</td>
	</tr>
	<tr>
		<td>Name:</td>
		<td>Alsigjhs Saleosk</td>
		<td>Mobile No.:</td>
		<td></td>
	</tr>
	<tr>
		<td>Email: </td>
		<td>ssjdks@sksjd.com</td>
		<td>Date of Birth:</td>
		<td>29/10/1980</td>
	</tr>
	<tr>
		<td>Department:</td>
		<td>Animal Sciences</td>
		<td>Category:</td>
		<td>General</td>
	</tr>
	<tr>
		<td>Payment Id:</td>
		<td>218218938928</td>
		<td>Payment Amount:</td>
		<td>600</td>
	</tr>
	<tr>
		<td>Transaction Id:</td>
		<td>218218938928</td>
		<td>Payment Date:</td>
		<td>29/01/2019</td>
	</tr>
    </table>
    </main><!-- .site-main -->
 
    <?php //get_sidebar( 'content-bottom' ); ?>
 
</div><!-- .content-area -->
 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
