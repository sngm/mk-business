<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>

<div class="mkb-contact-info p-4">
    <h3><?php echo esc_html__('Kontaktdaten', 'mk-business'); ?></h3>
    
    <ul class="list-unstyled mkb-contact-list">
        <li class="mb-3">
            <div class="d-flex align-items-center">
                <i class="bi bi-geo-alt text-primary me-3"></i>
                <div>
                    <strong><?php echo esc_html__('Adresse', 'mk-business'); ?></strong><br>
                    <address class="mb-0">
                        <?php echo esc_html__('Musterstraße 123', 'mk-business'); ?><br>
                        <?php echo esc_html__('12345 Musterstadt', 'mk-business'); ?>
                    </address>
                </div>
            </div>
        </li>
        <li class="mb-3">
            <div class="d-flex align-items-center">
                <i class="bi bi-telephone text-primary me-3"></i>
                <div>
                    <strong><?php echo esc_html__('Telefon', 'mk-business'); ?></strong><br>
                    <a href="tel:+49123456789" class="text-decoration-none">
                        +49 (0) 123 456789
                    </a>
                </div>
            </div>
        </li>
        <li>
            <div class="d-flex align-items-center">
                <i class="bi bi-envelope text-primary me-3"></i>
                <div>
                    <strong><?php echo esc_html__('E-Mail', 'mk-business'); ?></strong><br>
                    <a href="mailto:info@example.com" class="text-decoration-none">
                        info@example.com
                    </a>
                </div>
            </div>
        </li>
    </ul>
</div>
