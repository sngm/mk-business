<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

// Platzhalter-Bilder aus dev_assets/service-*.png
$features = [
	[
		'image'       => get_theme_file_uri('dev_assets/service-01.jpg'),
		'title'       => __('Neue Website', 'mk-business'),
		'description' => __('Ihre neue Website. Modernes Design, pflegbar und sicher.', 'mk-business'),
	],
	[
		'image'       => get_theme_file_uri('dev_assets/service-02.jpg'),
		'title'       => __('Redesign Ihrer alten Website', 'mk-business'),
		'description' => __('Manchmal reicht eine Überarbeitung Ihrer Website für frischen Wind.', 'mk-business'),
	],
	[
		'image'       => get_theme_file_uri('dev_assets/service-03.jpg'),
		'title'       => __('Bewertung & Empfehlungen', 'mk-business'),
		'description' => __('Sichten der bestehenden Website mit Empfehlungen für Sie', 'mk-business'),
	],
];

foreach ($features as $feature): ?>
	<div class="col-md-4 mb-4">
		<div class="card h-100 border-0 shadow-lg rounded-4 bg-secondary mkb-service-card">
			<?php if (!empty($feature['image'])): ?>
				<div class="p-4 pe-5">
					<img src="<?php echo esc_url($feature['image']); ?>"
						 alt="<?php echo esc_attr($feature['title']); ?>"
						 class="w-100 rounded-3"
						 style="height: 160px; object-fit: cover;"
						 width="300"
						 height="160"
						 loading="lazy"
						 decoding="async">
				</div>
			<?php endif; ?>
			<div class="card-body pt-0 px-4 pb-4">
				<h3 class="card-title h5 fw-bold mb-2"><?php echo esc_html($feature['title']); ?></h3>
				<p class="card-text mb-0"><?php echo esc_html($feature['description']); ?></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>
