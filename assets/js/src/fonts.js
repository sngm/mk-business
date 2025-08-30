/**
 * Font imports for Vite bundling using glob pattern
 * This ensures all referenced font files are included in the build
 * @package mk-business
 */

// Import all woff2 files from the fonts directory
const interTightFonts = import.meta.glob('../../fonts/inter-tight-v8-latin/*.woff2');
const interFonts = import.meta.glob('../../fonts/inter-v19-latin/*.woff2');

// Process all font imports
Object.values(interTightFonts).forEach(importFn => importFn());
Object.values(interFonts).forEach(importFn => importFn());
/* import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-regular.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-italic.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-500.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-500italic.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-600.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-600italic.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-700.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-700italic.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-800.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-800italic.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-900.woff2';
import '../../fonts/inter-tight-v8-latin/inter-tight-v8-latin-900italic.woff2'; */

// Inter fonts (all weights and styles)
/* import '../../fonts/inter-v19-latin/inter-v19-latin-100.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-100italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-200.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-200italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-300.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-300italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-regular.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-500.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-500italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-600.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-600italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-700.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-700italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-800.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-800italic.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-900.woff2';
import '../../fonts/inter-v19-latin/inter-v19-latin-900italic.woff2'; */
