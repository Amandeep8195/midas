<?php
/**
 * Template Name: Visa Consultation
 *
 */
get_header(); ?>

<section class="site-section service-page">
    <div class="container services-names">
        <div class="row">
            <div class="flex flex-lg-row flex-column justify-content-between gap-3 mt-3 success-stories  owl-carousel">
            <?php
                $args = array(
                    'post_type'      => 'visa',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);
                $i = 1;
                while ( $loop->have_posts() ) {
                    $loop->the_post(); 
                 $id = get_the_ID();
                    $icon = get_field('post_image', $id);?>
                    <div class="flex align-items-center flag-card">
                        <a class="text-black my-3" href="<?php echo get_the_permalink(); ?>">
                        <?php if($icon){ ?> 
                            <img decoding="async" src="<?php echo $icon['url']; ?>" alt="Canada" width="60">
                        <?php }else{ ?> 
                            <img decoding="async" src="http://localhost/Midas/wp-content/uploads/2024/07/ielts-img.jpg" alt="Canada" width="60">
                        <?php } ?>
                    </a>
                        <a class="text-black my-3" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </div>
                <?php $i++; ?>
            <?php } ?>
            </div>   
        </div>
    </div>

</section>



<?php get_footer(); ?>