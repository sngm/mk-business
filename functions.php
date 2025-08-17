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
 * Setup Customizer
 */
function customize_register(\WP_Customize_Manager $wp_customize): void
{
	// Hero Section
	$wp_customize->add_section('mkb_hero', [
		'title'    => esc_html__('Hero Section', 'mk-business'),
		'priority' => 25,
	]);

	$wp_customize->add_setting('hero_image', [
		'default'           => '',
		'sanitize_callback' => 'absint',
	]);

	$wp_customize->add_control(new \WP_Customize_Media_Control($wp_customize, 'hero_image', [
		'label'     => esc_html__('Hero Image', 'mk-business'),
		'section'   => 'mkb_hero',
		'mime_type' => 'image',
	]));

	// Logo Section
	$wp_customize->add_section('mkb_logo', [
		'title'    => esc_html__('Logo', 'mk-business'),
		'priority' => 20,
	]);

	$wp_customize->add_setting('mkb_logo', [
		'default'           => '',
		'sanitize_callback' => 'absint',
	]);

	$wp_customize->add_control(new \WP_Customize_Media_Control($wp_customize, 'mkb_logo', [
		'label'     => esc_html__('Logo', 'mk-business'),
		'section'   => 'mkb_logo',
		'mime_type' => 'image',
	]));

	// Theme Mode Section
	$wp_customize->add_section('mkb_theme_mode', [
		'title'    => esc_html__('Theme Mode', 'mk-business'),
		'priority' => 30,
	]);

	$wp_customize->add_setting('mkb_theme_mode', [
		'default'           => 'dark',
		'sanitize_callback' => 'sanitize_key',
	]);

	$wp_customize->add_control('mkb_theme_mode', [
		'label'       => esc_html__('Theme Mode', 'mk-business'),
		'description' => esc_html__('Dark mode is the default. Light mode can be selected manually.', 'mk-business'),
		'section'     => 'mkb_theme_mode',
		'type'        => 'select',
		'choices'     => [
			'dark'  => esc_html__('Dark (Default)', 'mk-business'),
			'light' => esc_html__('Light', 'mk-business'),
			'auto'  => esc_html__('Auto (System)', 'mk-business'),
		],
	]);
}
add_action('customize_register', __NAMESPACE__ . '\customize_register');

/**
 * Add data-bs-theme attribute to html element
 */
function add_theme_data_attribute(): void
{
	$theme_mode = get_theme_mod('mkb_theme_mode', 'dark');

	if ($theme_mode !== 'auto') {
		echo ' data-bs-theme="' . esc_attr($theme_mode) . '"';
	}
}

/**
 * Allow SVG upload for admins
 */
function mkb_allow_svg_upload($mimes)
{
	if (current_user_can('manage_options')) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}
add_filter('upload_mimes', __NAMESPACE__ . '\mkb_allow_svg_upload');

/**
 * Sanitize SVG uploads (optional: restrict to admins)
 */
function mkb_check_svg_upload($file)
{
	if (
		isset($file['type']) &&
		$file['type'] === 'image/svg+xml' &&
		!current_user_can('manage_options')
	) {
		$file['error'] = esc_html__('SVG uploads are only allowed for administrators.', 'mk-business');
	}
	return $file;
}
add_filter('wp_check_filetype_and_ext', __NAMESPACE__ . '\mkb_check_svg_upload', 10, 4);

/**
 * Disable Block Editor for selected CPTs and the static front page
 *
 * @param bool   $use_block_editor
 * @param string $post_type
 * @return bool
 */
function mkb_disable_block_editor_for_cpts($use_block_editor, $post_type)
{
	// CPTs für Classic Editor
	$cpts = [
		'faq',
		'leistung',
		// weitere CPTs hier ergänzen, z.B. 'portfolio', 'event'
	];

	// Prüfe, ob aktueller Beitrag die statische Startseite ist
	if (is_admin() && isset($_GET['post'])) {
		$front_page_id = (int) get_option('page_on_front');
		if ($front_page_id && (int) $_GET['post'] === $front_page_id) {
			return false;
		}
	}

	if (in_array($post_type, $cpts, true)) {
		return false;
	}
	return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', __NAMESPACE__ . '\mkb_disable_block_editor_for_cpts', 10, 2);
