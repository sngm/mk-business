/**
 * MK Business Theme Main Entry Point
 * @package mk-business
 */

// Import Bootstrap JS (all components)
import 'bootstrap';

// Import our theme modules
import { ThemeMode } from './modules/theme-mode';
import { initFeatureCards } from './modules/animations';

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
