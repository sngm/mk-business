<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/hero-section'); ?>

    <!-- Feature Boxes -->
    <section class="features bg-body-secondary py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Wir erstellen Ihre nächste Website oder überarbeiten Ihre bestehende.</h2>
            </div>
            <div class="row">
                <?php get_template_part('template-parts/feature-boxes'); ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta py-5">
        <div class="container">
            <?php get_template_part('template-parts/cta-section'); ?>
        </div>
    </section>
    
    <!-- Process Steps -->
    <section class="process py-5">
        <div class="container">
            <h2 class="text-center mb-5">Neue Website - wie funktioniert das jetzt?</h2>
            <?php get_template_part('template-parts/process-steps'); ?>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services bg-body-secondary py-5">
        <div class="container">
            <h2 class="text-center mb-5">Was wir noch alles für Sie tun können</h2>
            <?php get_template_part('template-parts/services-grid'); ?>
        </div>
    </section>



    <!-- FAQ Section -->
    <section class="faq bg-body-secondary py-5">
        <div class="container">
            <h2 class="text-center mb-5">FAQs zur Erstellung einer Website</h2>
            <?php get_template_part('template-parts/faq-accordion'); ?>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact" class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php get_template_part('template-parts/contact-form'); ?>
                </div>
                <div class="col-md-4">
                    <?php get_template_part('template-parts/contact-info'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
