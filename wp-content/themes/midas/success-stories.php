<?php
/**
 * Template Name: Success Stories
 *
 */
get_header();
$image_slider = get_field('image_slider');
?>


<section>
    <div class="w-full p-[30px] md:p-[60px]">
        <div class="max-w-row mx-auto text-white">
            <div class="slick-slider slick-initialized" dir="ltr">
                <div class="slick-list">
                    <div class="success-stories owl-style owl-style-md owl-carousel">
                        <?php foreach ($image_slider as $value) { ?>
                            <div data-index="0" class="slick-slide" tabindex="-1" aria-hidden="true"
                            style="outline: none; width: 288px;">
                                <div>
                                    <div tabindex="-1" style="width:100%;display:inline-block">
                                        <div
                                            class="">
                                            <span
                                                style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%">
                                                <span
                                                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                                                    <?php if($value['images']['url']){ ?> 
                                                    <img
                                                        style="display:block;max-width:100%;width:250px;height:initial;background:none;opacity:1;border:0;border-radius:10px;margin:0;padding:0"
                                                        alt="" aria-hidden="true"
                                                        src="<?php echo $value['images']['url']; ?>">
                                                    <?php } ?>

                                                </span>
                                                
                                            </span>
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


<?php get_footer(); ?>