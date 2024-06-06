<?php
/**
 * Template Name: Services
 *
 */
get_header(); ?>

<section class="site-section service-page">
    <div class="container services-names">
        <div class="row">
            <?php
                $args = array(
                    'post_type'      => 'Services',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);
                $i = 1;
                while ( $loop->have_posts() ) {
                    $loop->the_post(); ?>
                
                <?php if($i == 1) { ?> 
                    <div class="col-md-12 col-sm-12"><a class="btn btn-primary w-100 p-5 mb-3 text-white service-name" id="ielts"  href="<?php echo get_the_permalink(); ?>"><strong><?php echo get_the_title(); ?></strong></a></div>
                <?php } else{ ?> 
                    <div class="col-md-6 col-sm-12"><a class="btn btn-primary w-100 p-5 mb-3 text-white service-name" id="pte" href="<?php echo get_the_permalink(); ?>"><strong><?php echo get_the_title(); ?></strong></a></div>
                <?php } ?>
                <?php $i++; ?>
            <?php } ?>   
        </div>
    </div>

</section>



<?php get_footer(); ?>