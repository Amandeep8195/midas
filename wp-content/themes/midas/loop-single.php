<?php
/**
 * The loop that displays a single post
 *
 * The loop displays the posts and the post content. See
 * https://developer.wordpress.org/themes/basics/the-loop/ to understand it and
 * https://developer.wordpress.org/themes/basics/template-tags/ to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Midas_Touch
 * @since Midas Touch 1.2
 */
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();
		?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'midastouch' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'midastouch' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php midastouch_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-link">' . __( 'Pages:', 'midastouch' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->

		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries. ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php
							/** This filter is documented in author.php */
							$author_bio_avatar_size = apply_filters( 'midastouch_author_bio_avatar_size', 60 );
							echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
							?>
							</div><!-- #author-avatar -->
							<div id="author-description">
							<h2>
							<?php
							/* translators: %s: Author display name. */
							printf( __( 'About %s', 'midastouch' ), get_the_author() );
							?>
							</h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php
									/* translators: %s: Author display name. */
									printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'midastouch' ), get_the_author() );
									?>
								</a>
							</div><!-- #author-link	-->
							</div><!-- #author-description -->
						</div><!-- #entry-author-info -->
	<?php endif; ?>

						<div class="entry-utility">
							<?php midastouch_posted_in(); ?>
							<?php edit_post_link( __( 'Edit', 'midastouch' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-utility -->
					</div><!-- #post-<?php the_ID(); ?> -->

					<div id="nav-below" class="navigation">
						<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'midastouch' ) . '</span> %title' ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'midastouch' ) . '</span>' ); ?></div>
					</div><!-- #nav-below -->

					<?php comments_template( '', true ); ?>

	<?php endwhile;
} // End of the loop. ?>
