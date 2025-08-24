<?php declare(strict_types=1);

namespace MKB\JetFormBuilder;

if (!defined('ABSPATH')) {
	exit;
}

class Bootstrap_Integration
{
	public function __construct()
	{
		// Register filters for JetFormBuilder fields/buttons
		add_filter(
			'jet-form-builder/render/text-field/attributes',
			[$this, 'set_control_attributes'],
			10,
			2
		);

		add_filter(
			'jet-form-builder/render/action-button/attributes',
			[$this, 'set_submit_attributes'],
			10,
			2
		);
	}

	/**
	 * Adds 'form-control' class to standard input fields.
	 *
	 * @param array  $attrs Original attributes.
	 * @param object $block Block instance.
	 * @return array Modified attributes.
	 */
	public function set_control_attributes(array $attrs, object $block): array
	{
		$attrs['class'] = isset($attrs['class']) ? trim($attrs['class'] . ' form-control') : 'form-control';
		return $attrs;
	}

	/**
	 * Adds Bootstrap button classes to submit button.
	 *
	 * @param array  $attrs Original attributes.
	 * @param object $block Block instance.
	 * @return array Modified attributes.
	 */
	public function set_submit_attributes(array $attrs, object $block): array
	{
		$default_classes = 'btn btn-primary';
		$attrs['class'] = isset($attrs['class']) ? trim($attrs['class'] . ' ' . $default_classes) : $default_classes;
		return $attrs;
	}
}

// Instantiate integration
new Bootstrap_Integration();
