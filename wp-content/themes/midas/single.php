<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Midas_Touch
 * @since Midas Touch 1.0
 */

get_header(); ?>

<div class="site-section">
 	<div class="container">
        <div class="row ">
            <div class="col-md-8 col-sm-12">
                <div class="tab-content" id="nav-tabContent">
                	<?php if ( have_posts() ) {
						while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
					    <?php endwhile;
                } ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="list-group service-list" >
                	<?php
                $args = array(
                    'post_type'      => 'Services',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);
                $i = 1;
                while ( $loop->have_posts() ) {
                    $loop->the_post(); ?>
                    <a class="list-group-item list-group-item-action" id=""  href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                	<?php } ?>   
                </div>
            </div>
        </div>
    </div>
</div>
		<!-- <div class="container"> -->
			<!-- <div class="content" role="main"> -->

			<?php
			/*
			 * Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			// get_template_part( 'loop', 'single' );
			?>

			<!-- </div> #content --> 
		<!-- </div> #container --> 

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
