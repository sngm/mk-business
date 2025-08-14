<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

$features = [
	[
		'icon'        => 'bi-laptop',
		'title'       => __('Responsive Design', 'mk-business'),
		'description' => __('Ihre Website passt sich optimal an alle Geräte an - vom Smartphone bis zum Desktop.', 'mk-business'),
	],
	[
		'icon'        => 'bi-shield-check',
		'title'       => __('Sicherheit & Performance', 'mk-business'),
		'description' => __('Modernste Technologien sorgen für schnelle Ladezeiten und höchste Sicherheit.', 'mk-business'),
	],
	[
		'icon'        => 'bi-graph-up',
		'title'       => __('SEO-Optimierung', 'mk-business'),
		'description' => __('Bessere Sichtbarkeit in Suchmaschinen durch professionelle Optimierung.', 'mk-business'),
	],
];

foreach ($features as $feature): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <i class="bi <?php echo esc_attr($feature['icon']); ?> display-4 text-primary mb-3"></i>
                <h3 class="card-title h4"><?php echo esc_html($feature['title']); ?></h3>
                <p class="card-text"><?php echo esc_html($feature['description']); ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
