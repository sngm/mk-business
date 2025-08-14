<?php declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
	->files()
	->name('*.php')
	->in(__DIR__)
	->exclude([
		'vendor',
		'node_modules',
		'dist',
		'build',
		'assets',
		'languages',
	]);

return (new PhpCsFixer\Config())
	->setRiskyAllowed(true)
	->setRules([
		'@PSR12'               => true,
		'declare_strict_types' => true,              // wir nutzen strict types
		'indentation_type'     => true,                  // Tabs als Einrückung
		'array_syntax'         => ['syntax' => 'short'],
		'single_quote'         => true,
		'no_unused_imports'    => true,
		'ordered_imports'      => [
			'imports_order'  => ['class', 'function', 'const'],
			'sort_algorithm' => 'alpha',
		],
		'no_trailing_whitespace' => true,
		'no_extra_blank_lines'   => [
			'tokens' => ['extra', 'throw', 'use', 'use_trait'],
		],
		'trailing_comma_in_multiline' => [
			'after_heredoc' => true,
			'elements'      => ['arrays'],
		],
		'binary_operator_spaces' => [
			'default'   => 'single_space',
			'operators' => ['=>' => 'align_single_space_minimal'],
		],
		'concat_space'                 => ['spacing' => 'one'],
		'phpdoc_align'                 => false,
		'phpdoc_to_comment'            => false,
		'phpdoc_scalar'                => true,
		'phpdoc_summary'               => false,
		'blank_line_after_namespace'   => true,
		'blank_line_after_opening_tag' => false,
	])
	->setIndent("\t")  // Tab als Zeichen
	->setLineEnding("\n")
	->setFinder($finder);
