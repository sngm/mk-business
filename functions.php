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
	// Register Theme CSS (compiled from SCSS)
	wp_register_style(
		'mkb-style',
		get_theme_file_uri('style.css'),
		[],
		filemtime(get_theme_file_path('style.css'))
	);

	// Register Bootstrap Icons CSS
	wp_register_style(
		'mkb-bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		[],
		'1.11.3'
	);

	// Register Bootstrap Bundle (includes Popper)
	wp_register_script(
		'mkb-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
		[],
		'5.3.2',
		['in_footer' => true, 'strategy' => 'defer']
	);

	// Register Theme JavaScript
	wp_register_script(
		'mkb-theme',
		get_theme_file_uri('assets/js/theme.js'),
		[],
		filemtime(get_theme_file_path('assets/js/theme.js')),
		['in_footer' => true, 'strategy' => 'defer']
	);

	// Enqueue all assets
	wp_enqueue_style('mkb-style');
	wp_enqueue_style('mkb-bootstrap-icons');
	wp_enqueue_script('mkb-bootstrap');
	wp_enqueue_script('mkb-theme');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets');

/**
 * Add data-bs-theme attribute to html element
 */
function add_theme_data_attribute(): void
{
	$theme_mode = get_theme_mod('mkb_theme_mode', 'auto');

	if ($theme_mode !== 'auto') {
		echo ' data-bs-theme="' . esc_attr($theme_mode) . '"';
	}
}

/**
 * Setup Customizer
 */
function customize_register(\WP_Customize_Manager $wp_customize): void
{
	// Theme Mode Section
	$wp_customize->add_section('mkb_theme_mode', [
		'title'    => esc_html__('Theme Mode', 'mk-business'),
		'priority' => 30,
	]);

	$wp_customize->add_setting('mkb_theme_mode', [
		'default'           => 'auto',
		'sanitize_callback' => 'sanitize_key',
	]);

	$wp_customize->add_control('mkb_theme_mode', [
		'label'   => esc_html__('Theme Mode', 'mk-business'),
		'section' => 'mkb_theme_mode',
		'type'    => 'select',
		'choices' => [
			'auto'  => esc_html__('Auto (System)', 'mk-business'),
			'light' => esc_html__('Light', 'mk-business'),
			'dark'  => esc_html__('Dark', 'mk-business'),
		],
	]);
}
add_action('customize_register', __NAMESPACE__ . '\customize_register');
