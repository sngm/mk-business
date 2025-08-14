<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

$services = [
	[
		'icon'        => 'bi-window',
		'title'       => __('Webdesign', 'mk-business'),
		'description' => __('Moderne und benutzerfreundliche Websites.', 'mk-business'),
	],
	[
		'icon'        => 'bi-cart',
		'title'       => __('Online-Shops', 'mk-business'),
		'description' => __('WooCommerce und Shopware Lösungen.', 'mk-business'),
	],
	[
		'icon'        => 'bi-search',
		'title'       => __('SEO', 'mk-business'),
		'description' => __('Optimierung für Suchmaschinen.', 'mk-business'),
	],
	[
		'icon'        => 'bi-speedometer2',
		'title'       => __('Performance', 'mk-business'),
		'description' => __('Optimierung der Ladezeiten.', 'mk-business'),
	],
	[
		'icon'        => 'bi-shield-check',
		'title'       => __('Sicherheit', 'mk-business'),
		'description' => __('Schutz vor Angriffen & Wartung.', 'mk-business'),
	],
	[
		'icon'        => 'bi-phone',
		'title'       => __('Mobile First', 'mk-business'),
		'description' => __('Optimiert für alle Geräte.', 'mk-business'),
	],
];
?>

<div class="row g-4">
    <?php foreach ($services as $service): ?>
        <div class="col-md-6 col-lg-4">
            <div class="service-item p-4 bg-light rounded-3">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi <?php echo esc_attr($service['icon']); ?> text-primary me-3"></i>
                    <h3 class="h5 mb-0"><?php echo esc_html($service['title']); ?></h3>
                </div>
                <p class="mb-0"><?php echo esc_html($service['description']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
