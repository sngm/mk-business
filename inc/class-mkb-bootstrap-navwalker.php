<?php
declare(strict_types=1);

namespace MKB;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Bootstrap 5 Nav Walker for mk-business theme.
 *
 * Adds nav-item class to <li> and nav-link to <a>.
 */
class Bootstrap_Nav_Walker extends \Walker_Nav_Menu
{
	public function start_lvl(&$output, $depth = 0, $args = null): void
	{
		$output .= '<ul class="dropdown-menu">';
	}

	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0): void
	{
		$classes = empty($item->classes) ? [] : (array) $item->classes;
		$classes[] = 'nav-item';
		$class_names = join(' ', array_map('esc_attr', array_filter($classes)));
		$output .= sprintf(
			'<li class="%s">',
			$class_names
		);
		$output .= sprintf(
			'<a class="nav-link fw-medium" href="%s">%s</a>',
			esc_url($item->url),
			esc_html($item->title)
		);
	}

	public function end_el(&$output, $item, $depth = 0, $args = null): void
	{
		$output .= '</li>';
	}
}
