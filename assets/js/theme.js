/**
 * MK Business Theme JavaScript
 * @package mk-business
 */

// Feature Cards Animation
const initFeatureCards = () => {
	if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		return;
	}

	const cards = document.querySelectorAll('.features .card');

	const observerOptions = {
		threshold: 0.2,
		rootMargin: '0px'
	};

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('mkb-fade-in');
				observer.unobserve(entry.target);
			}
		});
	}, observerOptions);

	cards.forEach(card => observer.observe(card));
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
	initFeatureCards();
});
