/**
 * Theme Mode Management
 * @package mk-business
 */

export class ThemeMode {
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
		// Dark mode first - default to dark if no preference
		return 'dark';
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
