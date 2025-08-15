<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>

<div class="mkb-contact-form-wrapper bg-white rounded-3 shadow-sm p-4">
    <h3><?php echo esc_html__('Kontaktieren Sie uns', 'mk-business'); ?></h3>
    <p class="mb-4"><?php echo esc_html__('Füllen Sie das Formular aus und wir melden uns zeitnah bei Ihnen.', 'mk-business'); ?></p>
    
    <div class="mkb-form-placeholder">
        <!-- JetFormBuilder Shortcode wird hier eingefügt -->
        <?php echo do_shortcode('[jetformbuilder form="FORM_ID"]'); ?>
    </div>
</div>
<a href="#" class="btn btn-primary"><?php echo esc_html__('Absenden', 'mk-business'); ?></a>
