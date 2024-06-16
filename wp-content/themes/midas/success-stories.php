<?php
/**
 * Template Name: Success Stories
 *
 */
get_header();
$success_stories = get_field('success_stories');
?>

<div class="success-section site-section  bg-violet-150">
    <div class="tab-container container mb-10 mx-auto rounded-sm flex flex-col items-center justify-center text-slate-200 md:space-x-5 md:flex-row tab-div">

        <?php $i=1;
        foreach ($success_stories as $value) { ?>
            <button class="btn btn-primary text-bold mt-3" key=<?php echo $i; ?>><?php echo $value['heading']; ?></button>
        <?php $i++; } ?>
    </div>
    <div class="content-tabbing container">
        <?php $j=1; foreach ($success_stories as $value) { ?>
            <div class="panel text-center hidden" key="<?php echo $j; ?>">
                <div class="panel-content">
                <div class="performer-card row clearfix" id="gallery-section">
                    <?php foreach ($value['tabing_content'] as $value_content) { ?>
                        <div class="tab-con col-md-3 col-sm-6 mb-5">
                            <?php if($value_content['visa']){ ?>
                                <span class="study_visa"><?php echo $value_content['visa']; ?></span>
                                 <?php } ?>
                                <p class="my-1 text-black h4"><?php echo $value_content['name']; ?></p>
                                <a href="<?php echo $value_content['image']['url']; ?>" data-fancybox="group">
                                    <div class="gallery-image mb-3" style="background-image: url('<?php echo $value_content['image']['url']; ?>');"></div>
                                </a>
                                <span class="text-black h4"><?php echo $value_content['score']; ?></span>
                        </div>
                    <?php } ?>
                </div>
                </div>
            </div>

        <?php $j++; } ?>
    </div>

</div>

<?php get_footer(); ?>