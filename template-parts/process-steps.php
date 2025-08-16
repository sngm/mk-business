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

<div class="process-steps">
	<?php foreach ($steps as $index => $step): ?>
		<div class="mkb-process-step process-step-<?php echo esc_attr($index + 1); ?> p-4 mb-4 rounded-3">
			<div class="row align-items-center">
				<div class="col-3 col-md-2">
					<div class="step-number display-1 text-white text-center">
						<?php echo esc_html($step['number']); ?>
					</div>
				</div>
				<div class="col-9 col-md-10">
					<h3 class="h4 text-white mb-2"><?php echo esc_html($step['title']); ?></h3>
					<p class="text-white-50 mb-0"><?php echo esc_html($step['description']); ?></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
