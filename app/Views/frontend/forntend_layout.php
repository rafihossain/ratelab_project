<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/frontend/slick/slick.css">
<link rel="stylesheet" href="<?= base_url() ?>/frontend/slick/slick-theme.css">


<!-- banner start -->
<section class="bg-home bg_img" id="home" style="background-image: url('<?php echo base_url(); ?>/admin/uploads/banner_section/<?= $banner['image']; ?>');">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <div class="home-title">
                            <h2 class="mb-4 hero__title"><?= $banner['heading']; ?></h2>
                            <p class="hero__description"><?= $banner['subheading']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->
        </div>
    </div>
</section>
<!-- banner end -->


<?php
$explode = explode(',', $section['selected_section']);

for ($i = 0; $i < count($explode); $i++) {

    // echo $explode[$i];
    switch ($explode[$i]) {
        case "Category Section":
            category_section($category, $categorymodel);
            break;
        case "Why Choose Us":
            whychooseus_section($chooseushead, $chooseuscontent);
            break;
        case "Review":
            review_section($review_heading, $all_reviews);
            break;
        case "CTA Section":
            cta_section($ctasectionhead, $ctacontents);
            break;
        case "Testimonial":
            testimonial_section($titemhead, $titemcontents);
            break;
        case "Blog Section":
            blog_section($blog_section, $blog);
            break;
        default:
            echo "wrong";
    }
}

?>

<style>
    .slick-prev,
    .slick-next {
        background: black;
    }
</style>

<script src="<?= base_url(); ?>/frontend/slick/slick.min.js"></script>
<script>
    $(document).ready(function() {

        $('.testimonial-slider').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: '<div class="slick-prev"><i class="fas fa-long-arrow-alt-left"></i></div>',
            nextArrow: '<div class="slick-next"><i class="fas fa-long-arrow-alt-right"></i></div>',
        });

        // $('.testimonial-slider-new').slick({
        //     autoplay: false,
        //     slidesToShow: 3,
        //     prevArrow: '<div class="slick-prev"><i class="fas fa-long-arrow-alt-left"></i></div>',
        //     nextArrow: '<div class="slick-next"><i class="fas fa-long-arrow-alt-right"></i></div>',
        // });

        $('.testimonial-slider-new').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3 ,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        
    });
    
</script>

<?= $this->endSection() ?>