<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
	exit;
}

$faqs = [
	[
		'question' => __('Wie lange dauert die Erstellung einer Website?', 'mk-business'),
		'answer'   => __('Die Dauer hängt von Umfang und Komplexität ab. Kleinere Websites können in 2-3 Wochen fertig sein, größere Projekte benötigen 6-8 Wochen.', 'mk-business'),
	],
	[
		'question' => __('Was kostet eine neue Website?', 'mk-business'),
		'answer'   => __('Die Kosten variieren je nach Funktionsumfang. In einem kostenlosen Erstgespräch ermitteln wir Ihre Anforderungen und erstellen ein individuelles Angebot.', 'mk-business'),
	],
	[
		'question' => __('Kann ich die Website später selbst pflegen?', 'mk-business'),
		'answer'   => __('Ja, Sie erhalten ein benutzerfreundliches Content-Management-System und eine Einweisung in die Pflege Ihrer Website.', 'mk-business'),
	],
];
?>

<div class="accordion" id="faqAccordion">
    <?php foreach ($faqs as $index => $faq):
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
                    <?php echo esc_html($faq['question']); ?>
                </button>
            </h3>
            <div id="<?php echo esc_attr($collapseId); ?>" 
                 class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" 
                 aria-labelledby="<?php echo esc_attr($headingId); ?>" 
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <?php echo esc_html($faq['answer']); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
