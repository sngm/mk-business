<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

$steps = [
	[
		'number'      => '1',
		'title'       => __('Erstgespräch', 'mk-business'),
		'description' => __('In einem kostenlosen Gespräch lernen wir uns kennen und besprechen Ihre Anforderungen.', 'mk-business'),
	],
	[
		'number'      => '2',
		'title'       => __('Konzeption', 'mk-business'),
		'description' => __('Wir erstellen ein detailliertes Konzept und Design für Ihre neue Website.', 'mk-business'),
	],
	[
		'number'      => '3',
		'title'       => __('Umsetzung', 'mk-business'),
		'description' => __('Nach Ihrer Freigabe setzen wir das Projekt professionell um.', 'mk-business'),
	],
];
?>

<div class="row g-4">
    <?php foreach ($steps as $step): ?>
        <div class="col-md-4">
            <div class="process-step text-center position-relative">
                <div class="step-number display-1 text-primary mb-3">
                    <?php echo esc_html($step['number']); ?>
                </div>
                <h3 class="h4 mb-3"><?php echo esc_html($step['title']); ?></h3>
                <p class="mb-0"><?php echo esc_html($step['description']); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
