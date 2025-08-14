<?php
declare(strict_types=1);

namespace MKB;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Theme Setup
 */
function theme_setup(): void
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	]);

	register_nav_menus([
		'primary' => esc_html__('Primary Menu', 'mk-business'),
	]);
}
add_action('after_setup_theme', __NAMESPACE__ . '\theme_setup');

/**
 * Enqueue scripts and styles
 */
function enqueue_assets(): void
{
	// Register Bootstrap Icons CSS
	wp_register_style(
		'mkb-bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		[],
		'1.11.3'
	);

	// Register Bootstrap CSS
	wp_register_style(
		'mkb-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
		[],
		'5.3.2'
	);

	// Register Theme CSS
	wp_register_style(
		'mkb-style',
		get_stylesheet_uri(),
		['mkb-bootstrap'],
		filemtime(get_stylesheet_directory() . '/style.css')
	);

	// Register Bootstrap Bundle (includes Popper)
	wp_register_script(
		'mkb-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
		[],
		'5.3.2',
		['in_footer' => true, 'strategy' => 'defer']
	);

	// Enqueue all assets
	wp_enqueue_style('mkb-bootstrap-icons');
	wp_enqueue_style('mkb-style');
	wp_enqueue_script('mkb-bootstrap');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets');
