<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}
?>

<div class="card bg-gradient-primary text-white rounded-4 shadow-lg border-0">
	<div class="row align-items-center g-0">
		<div class="col-md-8">
			<div class="p-5">
				<h2 class="display-5 fw-bold mb-3">
					<?php echo esc_html__('Bereit für den nächsten Schritt?', 'mk-business'); ?>
				</h2>
				<p class="lead mb-0">
					<?php echo esc_html__('Starten Sie Ihr Projekt mit uns – schnell, unkompliziert und persönlich.', 'mk-business'); ?>
				</p>
			</div>
		</div>
		<div class="col-md-4 d-flex justify-content-center align-items-center p-4">
			<a href="#contact" 
			   class="btn btn-light btn-lg text-primary fw-bold px-4 py-3 rounded-pill" 
			   aria-label="<?php echo esc_attr__('Jetzt Kontakt aufnehmen', 'mk-business'); ?>">
				<?php echo esc_html__('Jetzt Kontakt aufnehmen', 'mk-business'); ?>
			</a>
		</div>
	</div>
</div>
