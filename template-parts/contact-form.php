<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>

<div class="card mkb-contact-form-wrapper">
	<div class="card-body p-4">
		<h3 class="card-title"><?php echo esc_html__('Kontaktieren Sie uns', 'mk-business'); ?></h3>
		<p class="mb-4"><?php echo esc_html__('Füllen Sie das Formular aus und wir melden uns zeitnah bei Ihnen.', 'mk-business'); ?></p>
		
		<div class="mkb-form-placeholder">
			<!-- JetFormBuilder Shortcode wird hier eingefügt -->
			<?php echo do_shortcode('[jet_fb_form form_id="127" submit_type="reload" required_mark="*" fields_layout="column" fields_label_tag="div" markup_type="div" enable_progress="" clear=""]'); ?>
		</div>
		<a href="#" class="btn btn-primary mt-4"><?php echo esc_html__('Absenden', 'mk-business'); ?></a>
	</div>
</div>
