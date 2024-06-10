<?php get_header(); ?>

<?php 
$banner_slider = get_field('banner_slider');
$banner_button = get_field('banner_link');

$study_tag = get_field('study_tags');
$study_heading = get_field('study_heading');
$study_image = get_field('study_image');

$welcome_content = get_field('welcome_content');

$services_heading = get_field('services_heading');

$why_choose_heading = get_field('why_choose_heading');
$why_choose_sub_heading = get_field('why_choose_sub_heading');
$why_us_content = get_field('why_us_content');

$application_heading = get_field('application_heading');
$application_images = get_field('application_images');

$certificateheading = get_field('certificateheading');
$certificate_images = get_field('certificate_images');

$star_performers_heading = get_field('star_performers_heading');
$star_performers_images = get_field('star_performers_images');

$faq_heading = get_field('faq_heading');
$faq_subheading = get_field('faq_subheading');
$faq_content = get_field('faq_content');
$faq_content_right = get_field('faq_content_right');

$review_heading = get_field('review_heading');
$review_content = get_field('review_content');

$communities_heading = get_field('communities_heading');
$communities = get_field('communities');

$gallery_heading = get_field('gallery_heading');
$gallery_url = get_field('gallery_url');
$gallery = get_field('gallery');
 ?>
<section class="site-blocks-cover overflow-hidden image-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 align-self-center">
                <div class="row">
                    <div class="col-md-12 col-sm-12 px-5 pt-5 image-slider-text" id="imageSliderText">
                        <div class="row">
                            <div class="container mt-lg-0 mt-4">
                                <div class="col-md-8 col-sm-12 my-5 pt-lg-5 pt-4 padding-top-none-xs">
                                    <?php if($banner_slider){ ?> 
                                        <div class="slider-info slide-one-item owl-carousel">
                                            <?php foreach ($banner_slider as $value) { ?>
                                                <div class="slide-item">
                                                    <h1><?php echo $value['heading']; ?></h1>
                                                    <?php echo $value['paragraph']; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php if($banner_button['url']){ ?> 
                                        <a href="<?php echo $banner_button['url'] ?>" class="btn btn-warning px-5 py-3  smoothscroll"><?php echo $banner_button['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 



<section class="site-section mt-5 pt-lg-0 pt-5 px-5 md:relative top-[100px] md:mb-[168px] z-100" id="about-section">
    <div class="container mt-lg-0 mt-5 pt-lg-0 pt-5">
        <?php if($welcome_content){ ?> 
            <div class="row mt-lg-0 mt-5 align-items-center">
                <div class="col-md-7 mr-auto mb-lg-0 mb-5 mt-lg-0 mt-5 pt-lg-0 pt-5">
                    <?php if($welcome_content['heading']){ ?> 
                        <h2 class="text-black mb-4 text-uppercase font-bold"><?php echo $welcome_content['heading']; ?></h2>
                    <?php } ?>
                    <?php if($welcome_content['paragraph']){ ?> 
                        <?php echo $welcome_content['paragraph']; ?>
                    <?php } ?>
                    <?php if($welcome_content['button']['url']){ ?> 
                        <a class="btn btn-primary text-bold mt-3" href="<?php echo $welcome_content['button']['url']; ?>"><?php echo $welcome_content['button']['title']; ?></a>
                    <?php } ?>
                    
                </div>
                <div class="col-md-5">
                    <div class="about-image-block">
                        <div class="image-box text-center mt-3">
                            <?php if($welcome_content['image']){ ?> 
                                <figure class="image">
                                    <img src="<?php echo $welcome_content['image']['url']; ?>" alt="About Image">
                                </figure>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
       
    </div>
</section>

<section class="services">
    <div class="px-5 md:relative ">
            <?php if($services_heading){ ?> 
                <h2 class=" text-uppercase text-center font-bold md:text-[36px] text-font24 md:max-w-[880px] mx-auto md:mt-[200px]">
                    <?php echo $services_heading; ?>
                </h2>
            <?php } ?>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-5 md:gap-8 max-w-[370px] md:max-w-[880px] m-auto mt-8 service-slider owl-style owl-style-md owl-carousel">

            <?php
                $args = array(
                    'post_type'      => 'Services',
                    'posts_per_page' => -1,
                );
                $loop = new WP_Query($args);
                while ( $loop->have_posts() ) {
                    $loop->the_post();
                    ?>
                     <div
                    class="max-w-180 lg:min-w-[272px] md:min-w-220 h-20 md:h-52 bg-pink-gradient flex justify-between md:flex-col items-center rounded-10 py-2 px-4 md:pt-8 md:pb-7 cursor-pointer">
                        <div class="flex flex-col justify-between md:items-center">
                            <div class="w-35px md:w-73 md:mb-[6px]"><span
                                    style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative"><span
                                        style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;padding-top:100%"></span><img
                                        alt="link-icon"
                                        src="http://localhost/Midas/wp-content/uploads/2024/05/1.webp"
                                        decoding="async" data-nimg="responsive"
                                        style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                                        sizes="100vw"
                                        ></span>
                            </div>
                            <h3 class="text-xs font-bold md:text-font22 text-center"><?php echo get_the_title(); ?></h3>
                        </div>
                        <div
                            class="shrink-0 md:bg-transparent w-6 md:w-fit h-6 md:h-fit flex items-center justify-center rounded-half self-end md:self-center">
                            <div class="flex items-center gap-2">
                                <p class="hidden md:block font-bold text-primary"><a href="<?php echo get_the_permalink(); ?>">Start Now</a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?> 
            </div>
    </div>
</section>

<section class="site-section mt-3" id="feature-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center mb-5">
                <?php if($why_choose_heading){ ?> 
                    <h2 class="text-black mb-2 text-uppercase font-bold"><?php echo $why_choose_heading; ?></h2>
                <?php } ?>
                <?php if($why_choose_sub_heading){ 
                    echo $why_choose_sub_heading;
                } ?>
            </div>
        </div>
        <?php if($why_us_content){ ?> 
            <div class="row">
                <?php foreach ($why_us_content as $value){ ?>
                    <div class="col-md-6 mb-4" >
                        <div class="card blog-entry p-3 midas-touch-card">
                            <?php if($value['image']){ ?> 
                                <figure>

                                    <img src="<?php echo $value['image']['url']; ?>" alt="Image" class="img-fluid">
                                </figure>
                            <?php } ?>
                            <div class="blog-entry-text mt-3">
                                <?php if($value['heading']){ ?> 
                                    <h3><?php $value['heading']; ?></h3>
                                <?php } ?>
                                <?php if($value['paragraph']){ 
                                    echo $value['paragraph'];
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>

<section>
    <div class="w-full bg-[#111430] p-[30px] md:p-[60px]">
        <div class="max-w-row mx-auto text-white">
            <div class="flex mb-8 items-center">
                <?php if($application_heading){ ?> 
                    <h2 class="text-[22px] md:text-[32px] font-bold grow text-center"><?php echo $application_heading; ?></h2>
                <?php } ?>
            </div>
            <div class="slick-slider slick-initialized" dir="ltr">
                <div class="slick-list">
                    <div class="nonloop-block-13 owl-style owl-style-md owl-carousel">
                        <?php foreach ($application_images as $value) { ?>
                            <div data-index="0" class="slick-slide" tabindex="-1" aria-hidden="true"
                            style="outline: none; width: 288px;">
                                <div>
                                    <div tabindex="-1" style="width:100%;display:inline-block">
                                        <div
                                            class="w-[290px] h-[286px] md:w-[280px] md:h-[430px] mx-auto mb-[20px] md:mb-0">
                                            <p><iframe width="250" height="450" src="https://www.youtube.com/embed/<?php echo $value['youtube_shorts'] ?>" title="" frameBorder="0"   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"  allowFullScreen><br>Powered by <a href="https://youtubeembedcode.com">how to embed a youtube video</a> and <a href="https://xn--sms-ln-utan-uc-pib.se/">nya sms lån utan uc</a></iframe></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="w-full p-[30px] md:p-[60px]">
        <div class="max-w-row mx-auto text-white">
            <div class="flex mb-8 items-center">
                <?php if($application_heading){ ?> 
                    <h2 class="text-[22px] text-black md:text-[32px] font-bold grow text-center"><?php echo $certificateheading; ?></h2>
                <?php } ?>
            </div>
            <div class="slick-slider slick-initialized" dir="ltr">
                <div class="slick-list">
                    <div class="nonloop-block-13 owl-style owl-style-md owl-carousel">
                        <?php foreach ($certificate_images as $value) { ?>
                            <div data-index="0" class="slick-slide" tabindex="-1" aria-hidden="true"
                            style="outline: none; width: 288px;">
                                <div>
                                    <div tabindex="-1" style="width:100%;display:inline-block">
                                        <div
                                            class="w-[290px] h-[286px] md:w-[280px] md:h-[430px] mx-auto mb-[20px] md:mb-0">
                                            <p><img src="<?php echo $value['images']['url']; ?>"></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="site-section bg-violet-150" id="faq-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="text-uppercase"><?php echo $faq_heading; ?></h2>
                <p class="mt-2"><?php echo $faq_subheading; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="accordion" id="faqAccordion">
                    <?php $i = 1; ?>
                    <?php foreach ($faq_content as $value) { ?>
                        <div class="card">
                            <div class="card-header d-flex justify-between align-items-center" id="heading-<?php echo $i; ?>">
                                <h5 class="font-size" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne"><?php echo $value['question']; ?></h5>
                                <img src="http://localhost/Midas/wp-content/uploads/2024/06/arrow-down.png" width="14"/>
                            </div>
                    
                            <div id="collapse-<?php echo $i; ?>" class="collapse" aria-labelledby="heading-<?php echo $i; ?>" data-parent="#faqAccordion">
                                <div class="card-body px-0">
                                    <?php echo $value['answer']; ?>
                                </div>
                            </div>
                        </div>

                    <?php
                    $i++;
                    } ?>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="accordion" id="faqAccordion">
                    <?php $j = 100; ?>
                    <?php foreach ($faq_content_right as $value) { ?>
                        <div class="card">
                            <div class="card-header d-flex justify-between align-items-center" id="heading-<?php echo $j; ?>">
                                <h5 class="font-size" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $j; ?>" aria-expanded="false" aria-controls="collapseOne"><?php echo $value['question']; ?></h5>
                                <img src="http://localhost/Midas/wp-content/uploads/2024/06/arrow-down.png" width="14"/>
                            </div>
                    
                            <div id="collapse-<?php echo $j; ?>" class="collapse" aria-labelledby="heading-<?php echo $j; ?>" data-parent="#faqAccordion">
                                <div class="card-body px">
                                    <?php echo $value['answer']; ?>
                                </div>
                            </div>
                        </div>

                    <?php
                    $j++;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="w-full p-[30px] md:p-[60px]">
        <div class="max-w-row mx-auto text-white">
            <div class="flex mb-8 items-center">
                <?php if($star_performers_heading){ ?> 
                    <h2 class="text-[22px] text-black md:text-[32px] font-bold grow text-center"><?php echo $star_performers_heading; ?></h2>
                <?php } ?>
            </div>
            <div class="slick-slider slick-initialized" dir="ltr">
                <div class="slick-list">
                    <div class="nonloop-block-13 owl-style owl-style-md owl-carousel">
                        <?php foreach ($star_performers_images as $value) { ?>
                            <div data-index="0" class="slick-slide mx-auto" tabindex="-1" aria-hidden="true"
                            style="outline: none; width: 288px;">
                                <div>
                                    <div tabindex="-1" style="width:100%;display:inline-block">
                                        <div
                                            class="w-[290px] h-[286px] md:w-[280px] md:h-[430px] mx-auto mb-[20px] md:mb-0">
                                            <p><img src="<?php echo $value['images']['url']; ?>"></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section mt-3 bg-violet-150" id="gallery-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="text-uppercase"><?php echo $gallery_heading; ?></h2>
            </div>
        </div>
        <div class="nonloop-block-13 owl-style owl-style-md owl-carousel">
            <?php foreach ($gallery as $value) { ?>
                <div class="performer-card mx-auto">
                    <span class="study_visa">Study Visa</span>
                    <!-- <span class="tourist_visa">Tourist Visa</span> -->
                    <p class="my-1 text-black">Gulshan</p>
                    <div class="gallery-image" style="background-image: url('<?php echo $value['images']['url'] ?>');"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>