<?php
/**
 * midastouch functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, midastouch_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value).
 *     remove_filter( 'excerpt_length', 'midastouch_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see https://developer.wordpress.org/plugins/.
 *
 * @package WordPress
 * @subpackage Midas_Touch
 * @since Midas Touch 1.0
 */

/*
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/* Tell WordPress to run midastouch_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'midastouch_setup' );

if ( ! function_exists( 'midastouch_setup' ) ) :
	/**
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * To override midastouch_setup() in a child theme, add your own midastouch_setup to your child theme's
	 * functions.php file.
	 *
	 * @uses add_theme_support()        To add support for post thumbnails, custom headers and backgrounds, and automatic feed links.
	 * @uses register_nav_menus()       To add support for navigation menus.
	 * @uses add_editor_style()         To style the visual editor.
	 * @uses load_theme_textdomain()    For translation/localization support.
	 * @uses register_default_headers() To register the default custom header images provided with the theme.
	 * @uses set_post_thumbnail_size()  To set a custom post thumbnail size.
	 *
	 * @since Midas Touch 1.0
	 */
	function midastouch_setup() {

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Blue', 'midastouch' ),
					'slug'  => 'blue',
					'color' => '#0066cc',
				),
				array(
					'name'  => __( 'Black', 'midastouch' ),
					'slug'  => 'black',
					'color' => '#000',
				),
				array(
					'name'  => __( 'Medium Gray', 'midastouch' ),
					'slug'  => 'medium-gray',
					'color' => '#666',
				),
				array(
					'name'  => __( 'Light Gray', 'midastouch' ),
					'slug'  => 'light-gray',
					'color' => '#f1f1f1',
				),
				array(
					'name'  => __( 'White', 'midastouch' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
			)
		);

		// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
		add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

		// This theme uses post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 *
		 * Manual loading of text domain is not required after the introduction of
		 * just in time translation loading in WordPress version 4.6.
		 *
		 * @ticket 58318
		 */
		if ( version_compare( $GLOBALS['wp_version'], '4.6', '<' ) ) {
			load_theme_textdomain( 'midastouch', get_template_directory() . '/languages' );
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'midastouch' ),
			)
		);

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			array(
				// Let WordPress know what our default background color is.
				'default-color' => 'f1f1f1',
			)
		);

		// The custom header business starts here.

		$custom_header_support = array(
			/*
			 * The default image to use.
			 * The %s is a placeholder for the theme template directory URI.
			 */
			'default-image'       => '%s/images/headers/path.jpg',
			// The height and width of our custom header.
			/**
			 * Filters the Midas Touch default header image width.
			 *
			 * @since Midas Touch 1.0
			 *
			 * @param int The default header image width in pixels. Default 940.
			 */
			'width'               => apply_filters( 'midastouch_header_image_width', 940 ),
			/**
			 * Filters the Midas Touch default header image height.
			 *
			 * @since Midas Touch 1.0
			 *
			 * @param int The default header image height in pixels. Default 198.
			 */
			'height'              => apply_filters( 'midastouch_header_image_height', 198 ),
			// Support flexible heights.
			'flex-height'         => true,
			// Don't support text inside the header image.
			'header-text'         => false,
			// Callback for styling the header preview in the admin.
			'admin-head-callback' => 'midastouch_admin_header_style',
		);

		add_theme_support( 'custom-header', $custom_header_support );

		if ( ! function_exists( 'get_custom_header' ) ) {
			// This is all for compatibility with versions of WordPress prior to 3.4.
			define( 'HEADER_TEXTCOLOR', '' );
			define( 'NO_HEADER_TEXT', true );
			define( 'HEADER_IMAGE', $custom_header_support['default-image'] );
			define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
			define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
			add_custom_image_header( '', $custom_header_support['admin-head-callback'] );
			add_custom_background();
		}

		/*
		 * We'll be using post thumbnails for custom header images on posts and pages.
		 * We want them to be 940 pixels wide by 198 pixels tall.
		 * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
		 */
		set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

		// ...and thus ends the custom header business.

		// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
		register_default_headers(
			array(
				'berries'       => array(
					'url'           => '%s/images/headers/berries.jpg',
					'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Berries', 'midastouch' ),
				),
				'cherryblossom' => array(
					'url'           => '%s/images/headers/cherryblossoms.jpg',
					'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Cherry Blossoms', 'midastouch' ),
				),
				'concave'       => array(
					'url'           => '%s/images/headers/concave.jpg',
					'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Concave', 'midastouch' ),
				),
				'fern'          => array(
					'url'           => '%s/images/headers/fern.jpg',
					'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Fern', 'midastouch' ),
				),
				'forestfloor'   => array(
					'url'           => '%s/images/headers/forestfloor.jpg',
					'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Forest Floor', 'midastouch' ),
				),
				'inkwell'       => array(
					'url'           => '%s/images/headers/inkwell.jpg',
					'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Inkwell', 'midastouch' ),
				),
				'path'          => array(
					'url'           => '%s/images/headers/path.jpg',
					'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Path', 'midastouch' ),
				),
				'sunset'        => array(
					'url'           => '%s/images/headers/sunset.jpg',
					'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
					/* translators: Header image description. */
					'description'   => __( 'Sunset', 'midastouch' ),
				),
			)
		);
	}
endif;

if ( ! function_exists( 'midastouch_admin_header_style' ) ) :
	/**
	 * Style the header image displayed on the Appearance > Header admin panel.
	 *
	 * Referenced via add_custom_image_header() in midastouch_setup().
	 *
	 * @since Midas Touch 1.0
	 */
	function midastouch_admin_header_style() {
		?>
	<style type="text/css" id="midastouch-admin-header-css">
	/* Shows the same border as on front end */
	#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
	}
	/* If header-text was supported, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
	*/
	</style>
		<?php
	}
endif;


if ( ! function_exists( 'midastouch_header_image' ) ) :
	/**
	 * Custom header image markup displayed.
	 *
	 * @since Midas Touch 4.0
	 */
	function midastouch_header_image() {
		$attrs = array(
			'alt' => get_bloginfo( 'name', 'display' ),
		);

		// Compatibility with versions of WordPress prior to 3.4.
		if ( function_exists( 'get_custom_header' ) ) {
			$custom_header   = get_custom_header();
			$attrs['width']  = $custom_header->width;
			$attrs['height'] = $custom_header->height;
		} else {
			$attrs['width']  = HEADER_IMAGE_WIDTH;
			$attrs['height'] = HEADER_IMAGE_HEIGHT;
		}

		if ( function_exists( 'the_header_image_tag' ) ) {
			the_header_image_tag( $attrs );
			return;
		}

		?>
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( $attrs['width'] ); ?>" height="<?php echo esc_attr( $attrs['height'] ); ?>" alt="<?php echo esc_attr( $attrs['alt'] ); ?>" />
		<?php
	}
endif; // midastouch_header_image()

/**
 * Show a home link for our wp_nav_menu() fallback, wp_page_menu().
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Midas Touch 1.0
 *
 * @param array $args An optional array of arguments. @see wp_page_menu()
 */
function midastouch_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) ) {
		$args['show_home'] = true;
	}
	return $args;
}
add_filter( 'wp_page_menu_args', 'midastouch_page_menu_args' );

/**
 * Set the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Midas Touch 1.0
 *
 * @param int $length The number of excerpt characters.
 * @return int The filtered number of excerpt characters.
 */
function midastouch_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'midastouch_excerpt_length' );

if ( ! function_exists( 'midastouch_continue_reading_link' ) ) :
	/**
	 * Return a "Continue Reading" link for excerpts.
	 *
	 * @since Midas Touch 1.0
	 *
	 * @return string "Continue Reading" link.
	 */
	function midastouch_continue_reading_link() {
		return ' <a href="' . esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'midastouch' ) . '</a>';
	}
endif;

/**
 * Replace "[...]" with an ellipsis and midastouch_continue_reading_link().
 *
 * "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Midas Touch 1.0
 *
 * @param string $more The Read More text.
 * @return string The filtered Read More text.
 */
function midastouch_auto_excerpt_more( $more ) {
	if ( ! is_admin() ) {
		return ' &hellip;' . midastouch_continue_reading_link();
	}
	return $more;
}
add_filter( 'excerpt_more', 'midastouch_auto_excerpt_more' );

/**
 * Add a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Midas Touch 1.0
 *
 * @param string $output The "Continue Reading" link.
 * @return string Excerpt with a pretty "Continue Reading" link.
 */
function midastouch_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() && ! is_admin() ) {
		$output .= midastouch_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'midastouch_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Midas Touch's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Midas Touch 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since Midas Touch 1.0
 * @deprecated Deprecated in Midas Touch 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function midastouch_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backward compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) ) {
	add_filter( 'gallery_style', 'midastouch_remove_gallery_css' );
}

if ( ! function_exists( 'midastouch_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own midastouch_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Midas Touch 1.0
	 *
	 * @param WP_Comment $comment The comment object.
	 * @param array      $args    An array of arguments. @see get_comment_reply_link()
	 * @param int        $depth   The depth of the comment.
	 */
	function midastouch_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '':
			case 'comment':
				?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php
				/* translators: %s: Author display name. */
				printf( __( '%s <span class="says">says:</span>', 'midastouch' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
				?>
			</div><!-- .comment-author .vcard -->

				<?php
				$commenter = wp_get_current_commenter();
				if ( $commenter['comment_author_email'] ) {
					$moderation_note = __( 'Your comment is awaiting moderation.', 'midastouch' );
				} else {
					$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'midastouch' );
				}
				?>

				<?php if ( '0' === $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
			<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: Date, 2: Time. */
					printf( __( '%1$s at %2$s', 'midastouch' ), get_comment_date(), get_comment_time() );
				?>
					</a>
					<?php
					edit_comment_link( __( '(Edit)', 'midastouch' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->

				<div class="comment-body"><?php comment_text(); ?></div>

				<div class="reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>
				</div><!-- .reply -->
			</div><!-- #comment-##  -->

				<?php
				break;
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
		<p><?php _e( 'Pingback:', 'midastouch' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'midastouch' ), ' ' ); ?></p>
				<?php
				break;
		endswitch;
	}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override midastouch_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Midas Touch 1.0
 *
 * @uses register_sidebar()
 */
function midastouch_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar(
		array(
			'name'          => __( 'Primary Widget Area', 'midastouch' ),
			'id'            => 'primary-widget-area',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'midastouch' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Secondary Widget Area', 'midastouch' ),
			'id'            => 'secondary-widget-area',
			'description'   => __( 'An optional secondary widget area, displays below the primary widget area in your sidebar.', 'midastouch' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 3, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'First Footer Widget Area', 'midastouch' ),
			'id'            => 'first-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'midastouch' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 4, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Second Footer Widget Area', 'midastouch' ),
			'id'            => 'second-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'midastouch' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 5, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Third Footer Widget Area', 'midastouch' ),
			'id'            => 'third-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'midastouch' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 6, located in the footer. Empty by default.
	register_sidebar(
		array(
			'name'          => __( 'Fourth Footer Widget Area', 'midastouch' ),
			'id'            => 'fourth-footer-widget-area',
			'description'   => __( 'An optional widget area for your site footer.', 'midastouch' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
/** Register sidebars by running midastouch_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'midastouch_widgets_init' );

/**
 * Remove the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Midas Touch 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Midas Touch styling.
 *
 * @since Midas Touch 1.0
 */
function midastouch_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'midastouch_remove_recent_comments_style' );

if ( ! function_exists( 'midastouch_posted_on' ) ) :
	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since Midas Touch 1.0
	 */
	function midastouch_posted_on() {
		printf(
			/* translators: 1: CSS classes, 2: Date, 3: Author display name. */
			__( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'midastouch' ),
			'meta-prep meta-prep-author',
			sprintf(
				'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				get_the_date()
			),
			sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				/* translators: %s: Author display name. */
				esc_attr( sprintf( __( 'View all posts by %s', 'midastouch' ), get_the_author() ) ),
				get_the_author()
			)
		);
	}
endif;

if ( ! function_exists( 'midastouch_posted_in' ) ) :
	/**
	 * Print HTML with meta information for the current post (category, tags and permalink).
	 *
	 * @since Midas Touch 1.0
	 */
	function midastouch_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tags_list = get_the_tag_list( '', ', ' );

		if ( $tags_list && ! is_wp_error( $tags_list ) ) {
			/* translators: 1: Category name, 2: Tag name, 3: Post permalink, 4: Post title. */
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'midastouch' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			/* translators: 1: Category name, 3: Post permalink, 4: Post title. */
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'midastouch' );
		} else {
			/* translators: 3: Post permalink, 4: Post title. */
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'midastouch' );
		}

		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tags_list,
			esc_url( get_permalink() ),
			the_title_attribute( 'echo=0' )
		);
	}
endif;

/**
 * Retrieve the IDs for images in a gallery.
 *
 * @uses get_post_galleries() First, if available. Falls back to shortcode parsing,
 *                            then as last option uses a get_posts() call.
 *
 * @since Midas Touch 1.6.
 *
 * @return array List of image IDs from the post gallery.
 */
function midastouch_get_gallery_images() {
	$images = array();

	if ( function_exists( 'get_post_galleries' ) ) {
		$galleries = get_post_galleries( get_the_ID(), false );
		if ( isset( $galleries[0]['ids'] ) ) {
			$images = explode( ',', $galleries[0]['ids'] );
		}
	} else {
		$pattern = get_shortcode_regex();
		preg_match( "/$pattern/s", get_the_content(), $match );
		$atts = shortcode_parse_atts( $match[3] );
		if ( isset( $atts['ids'] ) ) {
			$images = explode( ',', $atts['ids'] );
		}
	}

	if ( ! $images ) {
		$images = get_posts(
			array(
				'fields'         => 'ids',
				'numberposts'    => 999,
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_mime_type' => 'image',
				'post_parent'    => get_the_ID(),
				'post_type'      => 'attachment',
			)
		);
	}

	return $images;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Midas Touch 2.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function midastouch_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'midastouch_widget_tag_cloud_args' );

/**
 * Enqueue scripts and styles for front end.
 *
 * @since Midas Touch 2.6
 */
function midastouch_scripts_styles() {
	// Theme block stylesheet.
	wp_enqueue_style( 'midastouch-block-style', get_template_directory_uri() . '/blocks.css', array(), '20230627' );
}
add_action( 'wp_enqueue_scripts', 'midastouch_scripts_styles' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Midas Touch 2.6
 */
function midastouch_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'midastouch-block-editor-style', get_template_directory_uri() . '/editor-blocks.css', array(), '20230627' );
}
add_action( 'enqueue_block_editor_assets', 'midastouch_block_editor_styles' );

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backward compatibility to support pre-5.2.0 WordPress versions.
	 *
	 * @since Midas Touch 2.9
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Midas Touch 2.9
		 */
		do_action( 'wp_body_open' );
	}
endif;



/* custom enqueue scripts*/

function midastouch_custom_scripts_styles() {
	wp_enqueue_script( 'midastouch-custom-jquery-ui-script', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-popper-script', get_template_directory_uri() . '/js/jquery-ui.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-owl-script', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-countdown-script', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-easing-script', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-aos-script', get_template_directory_uri() . '/js/aos.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-fancybox-script', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-sticky-script', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-isotope-script', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '20230627' );
	wp_enqueue_script( 'midastouch-custom-main-script', get_template_directory_uri() . '/js/main.js', array(), '20230627' );
	
	
	wp_enqueue_style( 'midastouch-custom-font-style', 'https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-font-style-css', get_template_directory_uri() . '/fonts/icomoon/style.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-jquery-style', get_template_directory_uri() . '/css/jquery-ui.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-owl-style', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-owl-theme-style', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-datepicker-style', get_template_directory_uri() . '/css/bootstrap-datepicker.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-fonticon-style', get_template_directory_uri() . '/fonts/flaticon/font/flaticon.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-aos-style', get_template_directory_uri() . '/css/aos.css', array(), '20230627' );
	wp_enqueue_style( 'midastouch-custom-style', get_template_directory_uri() . '/css/style.css', array(), '20230627' );
}
add_action( 'wp_enqueue_scripts', 'midastouch_custom_scripts_styles' );

/* custom enqueue scripts end */ 


/* acf header footer options */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}

/* custom menus header and footer */
function wpb_custom_new_menu() {
	register_nav_menu('header',__( 'Header' ));
	register_nav_menu('footer',__( 'Footer' ));
	register_nav_menu('visa',__( 'Visa' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );


/* Custom post type */

function create_posttype() {
  
    register_post_type( 'services',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Services' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/* */

/* visa custom post type */

function visa_posttype() {
  
    register_post_type( 'visa',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Visa' ),
                'singular_name' => __( 'Visa' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'visa'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'visa_posttype' );

/* */ 

add_filter( 'wpcf7_form_class_attr', 'custom_custom_form_class_attr' );

function custom_custom_form_class_attr( $class ) {
  $class .= ' card p-4 border-0 shadow border-radius-4';
  return $class;
}
