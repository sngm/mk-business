<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>
</main>

<footer class="site-footer bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; <?php echo date_i18n('Y'); ?> <?php bloginfo('name'); ?></p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
