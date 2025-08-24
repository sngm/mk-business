<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

require_once get_theme_file_path('inc/class-mkb-bootstrap-navwalker.php');
?>
</main>

<footer class="site-footer bg-dark text-white py-4 mt-auto">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<span class="small">&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?></span>
			</div>
			<div class="col-md-6">
				<nav class="d-flex justify-content-end" aria-label="<?php esc_attr_e('Footer menu', 'mk-business'); ?>">
					<?php
					wp_nav_menu([
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'nav',
						'fallback_cb'    => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'          => 1,
						'walker'         => new \MKB\Bootstrap_Nav_Walker(),
					]);
?>
				</nav>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
