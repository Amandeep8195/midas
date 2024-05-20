<?php
/**
 * Template Name: Contactus
 *
 */
get_header();
$contact_us = get_field('contact_us');
?>


 <div class="container-fluid py-lg-5 py-4 bg-lightblue">
        <div class="container">
          <div class="row mx-0 align-items-center flex-lg-row flex-column-reverse justify-content-around">
            <?php if($contact_us){ ?> 
                <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                  <h1 class="text_black"><?php echo $contact_us['heading']; ?></h1>
                  <p class="text-secondary my-3">
                    <?php echo $contact_us['sub_heading']; ?>
                  </p>
                  <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-column">
                      <span class="fw-semibold text_black">Mail To:</span>
                      <a
                        href="Mailto: <?php echo $contact_us['email']; ?>"
                        class="text-decoration-none text-secondary small"
                        ><?php echo $contact_us['email']; ?></a
                      >
                    </div>

                    <div class="d-flex flex-column">
                      <span class="fw-semibold text_black">Call Us:</span>
                      <a
                        href="tel:+9118003091790"
                        class="text-decoration-none text-secondary small"
                        ><?php echo $contact_us['phone_no']; ?></a
                      >
                    </div>

                    <div class="d-flex flex-column">
                      <span class="fw-semibold text_black">Ambala Office Address:</span>
                      <span class="text-secondary small fw-normal"
                        ><?php echo $contact_us['ambala_office_address']; ?></span
                      >
                    </div>
                    <div class="d-flex flex-column">
                      <span class="fw-semibold text_black"
                        >Fatahgarh Sahib Office Address:</span
                      >
                      <span class="text-secondary small fw-normal"
                        ><?php echo $contact_us['fatahgarh_sahib_office_address']; ?></span
                      >
                    </div>
                    <div class="d-flex flex-column">
                      <span class="fw-semibold text_black">Sirsa Office Address:</span>
                      <span class="text-secondary small fw-normal"
                        ><?php echo $contact_us['fatahgarh_sahib_office_address']; ?></span
                      >
                    </div>
                  </div>
                </div>
            <?php } ?>

            <div class="col-lg-5 col-12">


                <?php echo do_shortcode('[contact-form-7 id="3e97ca4" title="Contact Us form"]'); ?>
              <!-- <form action="" class="card p-4 border-0 shadow rounded-4">
                <h3 class="mb-1">Get in Touch</h3>
                <span class="text-secondary small"
                  >You can reach us everytime</span
                >
                <div class="d-flex gap-3 mt-4">
                  <div class="w-50">
                    <input
                      type="text"
                      class="form-control rounded-pill contact-input"
                      placeholder="Full name"
                    />
                  </div>
                  <div class="w-50">
                    <input
                      type="text"
                      class="form-control rounded-pill contact-input"
                      placeholder="Phone"
                    />
                  </div>
                </div>
                <div class="d-flex mt-3">
                  <div class="w-100">
                    <input
                      type="text"
                      class="form-control rounded-pill contact-input"
                      placeholder="Email Address"
                    />
                  </div>
                </div>
                <div class="d-flex mt-3">
                  <div class="w-100">
                    <input
                      type="text"
                      class="form-control rounded-pill contact-input"
                      placeholder="Subject"
                    />
                  </div>
                </div>
                <div class="d-flex mt-3">
                  <div class="w-100">
                    <textarea
                      id=""
                      rows="5"
                      class="form-control rounded-4 contact-input"
                      placeholder="How can we help?"
                    ></textarea>
                  </div>
                </div>
                <button class="btn btn-primary rounded-pill mt-3">
                  Submit
                </button>
              </form> -->
            </div>
          </div>
        </div>
      </div>

<?php get_footer(); ?>