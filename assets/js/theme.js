/**
 * MK Business Theme JavaScript
 * @package mk-business
 */

// Theme Mode Management
class ThemeMode {
	constructor() {
		this.init();
	}

	init() {
		this.setupToggle();
		this.applyStoredTheme();
	}

	getStoredTheme() {
		return localStorage.getItem('mkb-theme-mode');
	}

	setStoredTheme(theme) {
		localStorage.setItem('mkb-theme-mode', theme);
	}

	getPreferredTheme() {
		const storedTheme = this.getStoredTheme();
		if (storedTheme) {
			return storedTheme;
		}
		return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
	}

	setTheme(theme) {
		if (theme === 'auto') {
			document.documentElement.removeAttribute('data-bs-theme');
		} else {
			document.documentElement.setAttribute('data-bs-theme', theme);
		}
	}

	applyStoredTheme() {
		const theme = this.getPreferredTheme();
		this.setTheme(theme);
		this.updateToggleIcon(theme);
	}

	updateToggleIcon(theme) {
		const toggle = document.getElementById('mkb-theme-toggle');
		if (!toggle) return;

		const icon = toggle.querySelector('i');
		if (!icon) return;

		icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
	}

	setupToggle() {
		const toggle = document.getElementById('mkb-theme-toggle');
		if (!toggle) return;

		toggle.addEventListener('click', () => {
			const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
			const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

			this.setStoredTheme(newTheme);
			this.setTheme(newTheme);
			this.updateToggleIcon(newTheme);
		});
	}
}

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
	new ThemeMode();
	initFeatureCards();
});

// Listen for system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
	const storedTheme = localStorage.getItem('mkb-theme-mode');
	if (!storedTheme) {
		new ThemeMode().applyStoredTheme();
	}
});
