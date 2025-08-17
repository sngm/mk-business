<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

// SCF/ACF: Prozessdaten aus Feldgruppe der Startseite holen
$process_group = get_field('process_section', get_the_ID());
$process_headline = isset($process_group['headline']) ? $process_group['headline'] : '';
$process_steps = !empty($process_group['prozesse']) && is_array($process_group['prozesse']) ? $process_group['prozesse'] : null;

if (!$process_headline && !$process_steps) {
	echo '<h2 class="text-center mb-5">' . esc_html__('Keine Inhalte vorhanden', 'mk-business') . '</h2>';
	return;
}

?>
<h2 class="text-center mb-5"><?php echo esc_html($process_headline ?: __('keine Inhalte vorhanden', 'mk-business')); ?></h2>
<?php if ($process_steps): ?>
<div class="process-steps">
	<?php foreach ($process_steps as $index => $step): ?>
		<div class="mkb-process-step process-step-<?php echo esc_attr($index + 1); ?> p-4 mb-4 rounded-3">
			<div class="row align-items-center">
				<div class="col-3 col-md-2">
					<div class="step-number display-1 text-white text-center">
						<?php echo esc_html($index + 1); ?>
					</div>
				</div>
				<div class="col-9 col-md-10">
					<h3 class="h4 text-white mb-2">
						<?php echo esc_html($step['title'] ?? $step['text'] ?? ''); ?>
					</h3>
					<?php if (!empty($step['description'])): ?>
						<p class="text-white-50 mb-0"><?php echo esc_html($step['description']); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
