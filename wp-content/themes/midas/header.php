<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage Midas_Touch
 * @since Midas Touch 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the site name.
	bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) {
	echo " | $site_description";
}

	// Add a page number if necessary:
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
	/* translators: %s: Page number. */
	echo esc_html( ' | ' . sprintf( __( 'Page %s', 'midastouch' ), max( $paged, $page ) ) );
}

?>
	</title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url( get_stylesheet_uri() ); ?>?ver=20240402" />
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">

<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
if ( is_singular() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>

<body <?php body_class(); ?> id="home-section" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<?php wp_body_open(); ?>

<?php $preHeader = get_field('pre_header', 'option'); 
$address = $preHeader['address'];
$email = $preHeader['email'];
$facebook_link = $preHeader['facebook_link'];
$instagram_link = $preHeader['instagram_link'];
$youtube_link = $preHeader['youtube_link'];
$google_link = $preHeader['google_link'];

$headerLogo = get_field('header_logo', 'option'); 
?>

        <div class="site-wrap">
            <?php if($preHeader){ ?>
                <div class="contact-wrap">
                    <div class="row mx-1">
                        <div class="col-md-1 col-sm-12"></div>
                        <div class="col-md-8 col-sm-12">
                            <div class="contact-info text-left"> <span class="mr-1 icon-home"></span> <?php echo $address; ?><a href="mailto:<?php echo $email; ?>"><span class="ml-2 mr-1 icon-envelope-open"></span> <?php echo $email; ?></a></div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="social-icons text-right">
                                <a href="<?php echo $facebook_link; ?>" target="_blank"><span class="mr-3 icon-facebook"></span></a>
                                <a href="<?php echo $instagram_link; ?>" target="_blank"><span class="mr-3 icon-instagram"></span></a>
                                <a href="<?php echo $youtube_link; ?>" target="_blank"><span class="mr-3 icon-youtube"></span></a>
                                <a href="<?php echo $google_link; ?>" target="_blank"><span class="mr-3 icon-google"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>


            <header class="site-navbar js-sticky-header site-navbar-target" role="banner" >
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-xl-3">
                            <?php if($headerLogo){ ?> 
                                <h1 class="mb-0 site-logo"><a href="<?php echo site_url(); ?>" class="h2 mb-0"> <img src="<?php echo $headerLogo['url']; ?>" alt="logo"> <span class="text-primary"></span> </a></h1>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-md-9 d-none d-xl-block">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <?php
                                    wp_nav_menu( array( 
                                        'theme_location' => 'header',
                                        'container'            => 'ul',
                                        'menu_class'           => 'site-menu main-menu js-clone-nav mr-auto d-none d-lg-block font-weight-bold', ) ); 
                                ?>
                            </nav>
                        </div>
                        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>
                    </div>
                </div>
            </header>

            <?php if (!is_front_page()){ ?> 
                <div id="background_img" class="row mx-0">
                    <div class="col-auto p-5 mt-3">
                      <h1 class="text-white p-lg-5 py-4 px-2 display-4 fw-semibold my-5">
                        <?php echo get_the_title(); ?>
                      </h1>
                    </div>
                </div>
            <?php } ?>