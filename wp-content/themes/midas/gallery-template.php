<?php
/**
 * Template Name: Gallery
 *
 */
get_header();
?>
<?php $gallery = get_field('gallery'); ?>
<section class="site-section success-stories-page" data-aos="fade">
    <div class="container">
        <div class="row clearfix">
            <?php if($gallery){ ?> 
                <?php foreach ($gallery as $value) { ?>             
                    <div class="col-md-4 col-sm-6 mb-5">
                        <div class="team-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['url']; ?>"></a>
                                </figure>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>