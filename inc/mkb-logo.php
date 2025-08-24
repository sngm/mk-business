<?php
declare(strict_types=1);

namespace MKB;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Returns logo markup, optionally as inline SVG code.
 *
 * @return string
 */
function mkb_get_logo_markup(): string
{
	$logo_id = get_theme_mod('mkb_logo');
	$svg_inline = (bool) get_theme_mod('mkb_logo_svg_inline', false);

	if (!$logo_id) {
		return '';
	}

	$logo_url = wp_get_attachment_url($logo_id);
	$logo_mime = get_post_mime_type($logo_id);

	if ($svg_inline && $logo_mime === 'image/svg+xml') {
		$svg_path = get_attached_file($logo_id);
		if (is_readable($svg_path)) {
			$svg_code = file_get_contents($svg_path);
			if ($svg_code !== false && strpos($svg_code, '<svg') !== false) {
				$allowed_tags = [
					'svg' => [
						'xmlns'       => true,
						'viewBox'     => true,
						'width'       => true,
						'height'      => true,
						'fill'        => true,
						'aria-hidden' => true,
						'role'        => true,
						'class'       => true,
					],
					'g'     => ['fill' => true, 'class' => true],
					'path'  => ['d' => true, 'fill' => true, 'class' => true],
					'title' => [],
					'desc'  => [],
				];
				return wp_kses($svg_code, $allowed_tags);
			}
		}
		// Fallback: falls SVG nicht lesbar oder ungültig, gib <img> aus
	}
	$alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true) ?: get_bloginfo('name');
	return sprintf(
		'<img src="%s" alt="%s" class="mkb-logo me-2" width="150" height="48" loading="lazy" decoding="async">',
		esc_url($logo_url),
		esc_attr($alt)
	);
}
