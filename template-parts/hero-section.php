<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>

<!-- Hero Section -->
<section class="hero py-5">
	<div class="container">
		<div class="hero-card bg-primary text-white rounded-4 p-5">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="hero-content pe-lg-4">
						<h1 class="display-4 fw-bold mb-4">
							<?php echo esc_html__('Websites & Online-Shops', 'mk-business'); ?>
						</h1>
						<div class="hero-features mb-4">
							<div class="d-flex align-items-center mb-3">
								<i class="bi bi-check-circle-fill me-3 fs-5" aria-hidden="true"></i>
								<span class="fs-6"><?php echo esc_html__('Ihr Internetauftritt', 'mk-business'); ?></span>
							</div>
							<div class="d-flex align-items-center mb-3">
								<i class="bi bi-check-circle-fill me-3 fs-5" aria-hidden="true"></i>
								<span class="fs-6"><?php echo esc_html__('Ihre Serviceleistungen', 'mk-business'); ?></span>
							</div>
							<div class="d-flex align-items-center mb-3">
								<i class="bi bi-check-circle-fill me-3 fs-5" aria-hidden="true"></i>
								<span class="fs-6"><?php echo esc_html__('Ihre Akquise und Projekte', 'mk-business'); ?></span>
							</div>
						</div>
						<a href="#contact" 
						   class="btn btn-light btn-lg px-4 py-3">
							<?php echo esc_html__('Kontakt aufnehmen', 'mk-business'); ?>
						</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="hero-image text-center mt-4 mt-lg-0">
						<img src="<?php echo esc_url(get_theme_file_uri('dev_assets/medienberater-mit-kunde-lachelt-in-kamera.png')); ?>" 
							 alt="<?php echo esc_attr__('Zwei Personen arbeiten gemeinsam am Laptop', 'mk-business'); ?>"
							 class="img-fluid rounded-3"
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
