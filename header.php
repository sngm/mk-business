<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?><?php \MKB\add_theme_data_attribute(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main">
    <?php esc_html_e('Skip to content', 'mk-business'); ?>
</a>

<header class="site-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <?php if (has_custom_logo()): ?>
                <div class="navbar-brand">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else: ?>
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="primaryNav">
                <?php
				wp_nav_menu([
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'navbar-nav me-auto',
					'fallback_cb'    => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'          => 2,
				]);
?>
                
                <!-- Theme Mode Toggle -->
                <div class="mkb-theme-toggle ms-3">
                    <button type="button" 
                            class="btn btn-outline-secondary" 
                            id="mkb-theme-toggle"
                            aria-label="<?php esc_attr_e('Toggle theme mode', 'mk-business'); ?>">
                        <i class="bi bi-circle-half" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>

<main id="main" class="site-main">
</header>

<main id="main" class="site-main">
