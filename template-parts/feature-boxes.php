<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

// Get the selected posts from the Feature Liste field in the Feature Section group
$feature_section = get_field('feature_section', get_option('page_on_front'));
$selected_features = $feature_section['feature_liste'] ?? [];

// If no features are selected, use the default fallback content
if (empty($selected_features)) {
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
			<div class="card h-100 border-0 rounded-4 bg-secondary bg-opacity-10 mkb-service-card">
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
	<?php endforeach;
} else {
	// Loop through each selected feature post
	foreach ($selected_features as $post):
		// Setup post data to use WordPress template tags
		setup_postdata($post);

		// Get the image: either featured image or custom field icon_service
		$image_url = '';
		if (has_post_thumbnail($post)) {
			$image_url = get_the_post_thumbnail_url($post, 'medium');
		} elseif ($icon_url = get_field('icon_service', $post->ID)) {
			$image_url = $icon_url;
		}

		// Get the excerpt
		$description = has_excerpt($post) ? get_the_excerpt($post) : wp_trim_words(get_the_content(null, false, $post), 20);
		?>
		<div class="col-md-4 mb-4">
			<div class="card h-100 border-0 rounded-4 bg-secondary bg-opacity-10 mkb-service-card">
				<?php if (!empty($image_url)): ?>
					<div class="p-4 pe-5">
						<img src="<?php echo esc_url($image_url); ?>"
							 alt="<?php echo esc_attr(get_the_title($post)); ?>"
							 class="w-100 rounded-3"
							 style="height: 160px; object-fit: cover;"
							 width="300"
							 height="160"
							 loading="lazy"
							 decoding="async">
					</div>
				<?php endif; ?>
				<div class="card-body pt-0 px-4 pb-4">
					<h3 class="card-title h5 fw-bold mb-2"><?php echo esc_html(get_the_title($post)); ?></h3>
					<p class="card-text mb-0"><?php echo wp_kses_post($description); ?></p>
				</div>
			</div>
		</div>
	<?php endforeach;

	// Reset post data to avoid conflicts with the main query
	wp_reset_postdata();
}
?>
