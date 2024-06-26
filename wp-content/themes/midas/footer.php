<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Midas_Touch
 * @since Midas Touch 1.0
 */
?>

<?php $footerContact = get_field('footer_contact_section','option');
$follow_us_section = get_field('follow_us_section', 'option');
$contact_us_section = get_field('contact_us_section', 'option');
$location_section = get_field('location_section', 'option');
$location = $location_section['location'];
$footer_logo = get_field('footer_logo','option');
$footer_logo_text = get_field('footer_logo_text','option');
?>
        <?php if(!is_page(168)) { ?> 
            <?php if($footerContact){ ?> 
                <div class="site-section" id="contact-section">
                    <div class="container">
                        <div class="row mx-1">
                            <div class="col-12 text-center">
                                <?php if($footerContact['heading']){ ?>    
                                    <p class="contact-us-title"> 
                                        <?php echo $footerContact['heading']; ?>
                                    </p>
                                <?php } 
                                if($footerContact['button']){ ?> 
                                    <a href="<?php echo $footerContact['button']['url']; ?>" class="btn contact-us-btn ml-3"><?php echo $footerContact['button']['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>    
            <?php } ?>
        <?php }?>
            <footer class="site-footer bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-xs-12">
                            <h2 class="footer-heading mb-4">Quick Links</h2>
                            <?php
                                wp_nav_menu( array( 
                                        'theme_location' => 'footer',
                                        'container'            => 'ul',
                                        'menu_class'           => 'list-unstyled', ) ); 
                            ?>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <?php if($follow_us_section){ ?> 
                                <div class="mb-4">
                                    <?php if($follow_us_section['follow_us_heading']){ ?> 
                                        <h2 class="footer-heading mb-3"><?php echo $follow_us_section['follow_us_heading']; ?></h2>
                                    <?php } ?>
                                    <a href="<?php echo $follow_us_section['facebook_link']; ?>" target="_blank" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                                    <a href="<?php echo $follow_us_section['instagram_link']; ?>" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                                    <a href="<?php echo $follow_us_section['youtube_link']; ?>" target="_blank" class="pl-3 pr-3"><span class="icon-youtube"></span></a>
                                    <a href="<?php echo $follow_us_section['google_link'] ?>" target="_blank" class="pl-3 pr-3"><span class="icon-google"></span></a>
                                </div>
                            <?php } ?>
                            <?php if($contact_us_section){ ?> 
                                <div>
                                    <h2 class="footer-heading mb-3"><?php echo $contact_us_section['contact_heading']; ?></h2>
                                    <?php if($contact_us_section['email']){ ?> 
                                        <div>Email: <a href="mailto:<?php echo $contact_us_section['email']; ?>"><?php echo $contact_us_section['email']; ?></a></div>
                                    <?php } ?>
                                    <?php if($contact_us_section['phone_link']){ ?> 
                                        <div>Phone: <a href="tel:<?php echo $contact_us_section['phone_link']; ?>"><?php echo $contact_us_section['phone']; ?></a></div>
                                    <?php } ?>
                                </div>
                            <?php } ?> 
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <h2 class="footer-heading mb-4">Visa</h2>
                            <?php
                                wp_nav_menu( array( 
                                        'theme_location' => 'visa',
                                        'container'            => 'ul',
                                        'menu_class'           => 'list-unstyled', ) ); 
                            ?>
                        </div>
                        
                        <div class="col-md-5 col-xs-12">
                            <div class="mb-5">
                                <?php if($location_section['location_heading']){ ?> 
                                    <h2 class="footer-heading mb-3"><?php echo $location_section['location_heading']; ?></h2>
                                <?php } ?>
                                <?php if($location){ ?> 
                                    <div class="row">
                                        <?php foreach ($location as $value) { ?>
                                            <div class="col-md-4 col-xs-12">
                                                <h6 class="mb-4 text-white"><?php echo $value['location_text']; ?></h6>
                                                <?php echo $value['location_iframe']; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <p><a href="index.php" class="text-warning" style="font-size:18px;"><img src="<?php echo $footer_logo['url']; ?>" alt="logo" height="20"> Midas Touch</a> <?php echo $footer_logo_text; ?></p>
                        </div>
                    </div>
                    <div class="row mt-3 text-left">
                        <div class="col-12">
                            <div class="border-top pt-5">
                                <p>Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <a href="https://wa.me/+918572877917" id="whatsAppBtn" title="Send a message"><span class="icon-whatsapp"></span></a>
        </div> 
        <!-- .site-wrap -->
 <?php if (is_front_page()){ ?> 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="row">
            <div class="col-5 d-lg-block d-none p-0">
                <img src="http://localhost/Midas/wp-content/uploads/2024/06/form-bg.jpg" class="img-fluid form-img" />
            </div>
            <div class="col p-0 ms-lg-0 ms-2">
                <?php echo do_shortcode('[contact-form-7 id="e895884" title="Popup form"]'); ?>  <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php } ?> 
        
        <script type="text/javascript">
            jQuery("body").prepend('<div id="loading-screen"><img src="images/loading-image.gif" alt="loading"></div>');
            jQuery(window).ready(function() {
                jQuery("#loading-screen").remove();
            });

            // jQuery(document).ready(function() {
            //     // var counter = 1;
            //     setInterval(function() {
            //         // (counter != 4) ? counter++ : counter=1;
            //         jQuery('#imageSliderText').css('background-image','url(http://localhost/Midas/wp-content/uploads/2024/05/slide-4.webp)');
            //         // jQuery('#imageSliderText').css('background-image','url(http://localhost/Midas/wp-content/uploads/2024/05/slide-'+counter+'.jpg)');
            //     }, 5000);
            // });


   //          jQuery(document).ready(function(){       
   // jQuery('#myModal').modal('show');
   //  }); 
jQuery(document).ready(function($) {
    // Check if the cookie 'modalShown' is not set
    if (document.cookie.indexOf('modalShown=1') === -1) {
        // If cookie is not set, show the modal
        $('#myModal').modal('show');
    }

    // When modal is hidden, set a cookie to prevent it from showing again
    $('#myModal').on('hidden.bs.modal', function () {
        document.cookie = 'modalShown=1; path=/';
    });
});


        </script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
