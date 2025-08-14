<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4">Websites & Online-Shops</h1>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-lg"></i> Ihr Internetauftritt</li>
                        <li><i class="bi bi-check-lg"></i> Ihre Serviceleistungen</li>
                        <li><i class="bi bi-check-lg"></i> Ihre Akquise und Projekte</li>
                    </ul>
                    <a href="#contact" class="btn btn-light">Kontakt aufnehmen</a>
                </div>
                <div class="col-md-6">
                    <?php echo wp_get_attachment_image(get_theme_mod('hero_image'), 'full', false, ['class' => 'img-fluid']); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Boxes -->
    <section class="features py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Wir erstellen Ihre nächste Website oder überarbeiten Ihre bestehende.</h2>
            </div>
            <div class="row">
                <?php get_template_part('template-parts/feature-boxes'); ?>
            </div>
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
    <section class="services py-5">
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
