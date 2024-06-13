<?php
/**
 * Template Name: Aboutus
 *
 */
get_header();
?>

<?php 

$about_us_section = get_field('about_us_section');
$founder_ceo = get_field('founder_ceo');
$founder_ceo_second = get_field('founder_ceo_second');

?>

<div class="container py-lg-5 py-4">
        <?php if($about_us_section){ ?> 
            <div class="row mx-0 mb-lg-0 mb-2">
              <div class="col-12">
                <div class="text-start">
                  <p class="mb-0"><?php echo $about_us_section['pre_heading']; ?></p>
                  <h1 class="fw-bolder primary-color display-4"><?php echo $about_us_section['heading']; ?></h1>
                </div>
              </div>
            </div>
            <div
              class="row mx-0 flex-lg-row flex-column-reverse gap-3"
            >
              <div class="col-lg-7 col-12">
                <?php echo $about_us_section['content']; ?>
              </div>
              <div class="col-lg col-12">
                <img
                  src="<?php echo $about_us_section['image']['url']; ?>"
                  class="img-fluid border-radius-4 shadow"
                  alt=""
                />
              </div>
            </div>
        <?php } ?>
        <?php if($founder_ceo){ ?>
            <div
              class="row mx-0 p-lg-5 p-md-5 p-4 align-items-center gap-4 flex-row card border-0 bg-light border-radius-4 my-lg-5 my-4"
            >
              <div class="col-lg-4 col-12 p-0">
                <img
                  src="<?php echo $founder_ceo['image']['url']; ?>"
                  class="img-fluid border-radius-4 shadow"
                  alt=""
                />
              </div>
              <div class="col-lg col-12">
                <div class="">
                  <p class="mb-0 fw-semibold"><?php echo $founder_ceo['pre_heading']; ?></p>
                  <h1 class="fw-bolder primary-color display-5">
                    <?php echo $founder_ceo['heading']; ?>
                  </h1>
                </div>
                <?php echo $founder_ceo['content']; ?>
              </div>
            </div>
        <?php } ?>
        <?php if($founder_ceo_second){ ?>
            <div
              class="row mx-0 p-lg-5 p-md-5 p-4 align-items-center gap-4 flex-row-reverse card border-0 bg-light border-radius-4"
            >
              <div class="col-lg-4 col-12 p-0">
                <img
                  src="<?php echo $founder_ceo_second['image']['url']; ?>"
                  class="img-fluid border-radius-4 shadow"
                  alt=""
                />
              </div>
              <div class="col-lg col-12">
                <div class="">
                  <p class="mb-0 fw-semibold"><?php echo $founder_ceo_second['pre_heading']; ?></p>
                  <h1 class="fw-bolder primary-color display-5"><?php echo $founder_ceo_second['heading']; ?></h1>
                </div>
                <?php echo $founder_ceo_second['content']; ?>
              </div>
            </div>
        <?php } ?>
      </div>

<?php get_footer(); ?>

