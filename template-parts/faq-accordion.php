<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

// FAQ Query: CPT "faqs"
$faq_query = new WP_Query([
	'post_type'      => 'faq',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
]);

?>

<div class="accordion" id="faqAccordion">
	<?php if ($faq_query->have_posts()):
		$index = 0;
		while ($faq_query->have_posts()):
			$faq_query->the_post();
			$headingId = 'faqHeading' . $index;
			$collapseId = 'faqCollapse' . $index;
			?>
			<div class="accordion-item">
				<h3 class="accordion-header" id="<?php echo esc_attr($headingId); ?>">
					<button class="accordion-button <?php echo $index > 0 ? 'collapsed' : ''; ?>"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target="#<?php echo esc_attr($collapseId); ?>"
							aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
							aria-controls="<?php echo esc_attr($collapseId); ?>">
						<?php echo esc_html(get_the_title()); ?>
					</button>
				</h3>
				<div id="<?php echo esc_attr($collapseId); ?>"
					 class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>"
					 aria-labelledby="<?php echo esc_attr($headingId); ?>"
					 data-bs-parent="#faqAccordion">
					<div class="accordion-body">
						<?php echo wp_kses_post(get_the_content()); ?>
					</div>
				</div>
			</div>
			<?php
			$index++;
		endwhile;
		wp_reset_postdata();
	else: ?>
		<div class="accordion-item">
			<h3 class="accordion-header">
				<button class="accordion-button collapsed" type="button" disabled>
					<?php esc_html_e('Keine FAQs gefunden.', 'mk-business'); ?>
				</button>
			</h3>
		</div>
	<?php endif; ?>
</div>
