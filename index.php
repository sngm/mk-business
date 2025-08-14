<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<div class="container py-5">
	<div class="row">
		<div class="col-12">
			<?php
			if (have_posts()):
				while (have_posts()):
					the_post();
					get_template_part('template-parts/content', get_post_type());
				endwhile;

				the_posts_navigation([
					'prev_text' => esc_html__('← Older posts', 'mk-business'),
					'next_text' => esc_html__('Newer posts →', 'mk-business'),
				]);
			else:
				get_template_part('template-parts/content', 'none');
			endif;
?>
		</div>
	</div>
</div>

<?php
get_footer();
