<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

// Get featured image for current post
$hero_img_id = get_theme_mod('hero_image');
$hero_img_url = $hero_img_id ? wp_get_attachment_image_url($hero_img_id, 'full') : '';
$hero_img_alt = $hero_img_id ? get_post_meta($hero_img_id, '_wp_attachment_image_alt', true) : '';

if (!$hero_img_url) {
	// fallback: use post thumbnail if available
	if (has_post_thumbnail()) {
		$hero_img_url = get_the_post_thumbnail_url(null, 'full');
		$hero_img_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
	}
}

if (!$hero_img_url) {
	// fallback: use static placeholder
	$hero_img_url = esc_url(get_theme_file_uri('dev_assets/medienberater-mit-kunde-lachelt-in-kamera.png'));
	$hero_img_alt = esc_attr__('Zwei Personen arbeiten gemeinsam am Laptop', 'mk-business');
}
?>

<!-- Hero Section -->
<section class="hero py-5">
	<div class="container">
		<div class="hero-card bg-primary text-white rounded-4">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="hero-content p-4">
						<h1 class="display-4 fw-bold mb-4">
							<?php echo esc_html__('Websites & Online-Shops', 'mk-business'); ?>
						</h1>
						<ul class="hero-features list-unstyled mb-4">
							<li class="mb-3">
								<span class="fs-6"><?php echo esc_html__('Ihr Internetauftritt', 'mk-business'); ?></span>
							</li>
							<li class="mb-3">
								<span class="fs-6"><?php echo esc_html__('Ihre Serviceleistungen', 'mk-business'); ?></span>
							</li>
							<li class="mb-3">
								<span class="fs-6"><?php echo esc_html__('Ihre Akquise und Projekte', 'mk-business'); ?></span>
							</li>
						</ul>
						<a href="#contact" 
						   class="btn btn-light btn-lg px-4 py-3">
							<?php echo esc_html__('Kontakt aufnehmen', 'mk-business'); ?>
						</a>
					</div>
				</div>
				<div class="col-lg-6 p-0">
					<div class="hero-image h-100">
						<img src="<?php echo esc_url($hero_img_url); ?>"
							 alt="<?php echo esc_attr($hero_img_alt); ?>"
							 class="img-fluid w-100 h-100 object-fit-cover"
							 loading="eager"
							 decoding="async"
							 width="500"
							 height="400">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
