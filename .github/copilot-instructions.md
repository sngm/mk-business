# GitHub Copilot – Projektinstruktionen (mk-business)

## Kontext
- WordPress 6.8.*, klassisches Theme (Option Hybrid später), PHP 8.3.x, Apache.
- Theme: **mk-business** mit **Bootstrap 5** (ohne jQuery), Popper per npm/CDN.
- Plugins: **Ninja Firewall**, **Secure Custom Fields**.
- Ziel: saubere Core-nahe Umsetzung, Sicherheit & Performance first.
- Barrierefreiheit nach **WCAG 2.x AA**.

## Projekt- und Strukturübersicht
- `style.css` – Theme-Metadaten (Name, Author, Version etc.) und Haupt-CSS
- `index.php` – Haupt-Template
- `functions.php` – Bootstrapping, Setup, Enqueue
- `header.php` / `footer.php` – Standard-Header/Footer
- `template-parts/` – wiederverwendbare Template-Komponenten
- `assets/{css,js,images}/` – statische Dateien
- `inc/` – Setup, Hooks, Custom Funktionen
- `languages/` – Übersetzungsdateien

## Benennungen & Struktur
- PHP-Namespace/Prefix: `MKB\` bzw. Funktionspräfix `mkb_`.
- Textdomain: `mk-business`.
- Keine Logik direkt in `functions.php`; nur Bootstrapping.
- Template-Hierarchie einhalten (WordPress Template Hierarchy).

## Codestil
- PSR-12, Tabs (4 Spaces).
- Strikte Types (`declare(strict_types=1);`).
- PHPDoc bei Public APIs/Hooks.
- PHP, JS (ESM), SCSS bevorzugt.

## WordPress-Standards
- Styles/Scripts mit `wp_register_style|script` und Handles `mkb-…`.
- Dep: `bootstrap`, `popper`; `in_footer=true`, `defer` setzen.
- Theme-Supports: `title-tag`, `post-thumbnails`, `html5`, `responsive-embeds`, ggf. `editor-styles`.
- I18n mit Textdomain, keine harten Strings.
- Template-Parts mit `get_template_part()`.

## Sicherheit
- Output escapen (`esc_html`, `esc_attr`, `wp_kses_post`).
- Input sanitisieren (`sanitize_text_field`, `sanitize_key`).
- Nonces & `current_user_can()` nutzen.
- Kein Direktzugriff: `if (!defined('ABSPATH')) exit;`.
- Keine ungeprüften Metadaten/Optionen ausgeben.

## Performance
- Bootstrap 5 ohne jQuery; Popper nur wenn nötig.
- CSS/JS minifizieren; Version via `filemtime()`.
- Bilder mit `loading="lazy"` und `decoding="async"`.

## Barrierefreiheit (WCAG 2.x AA)
- Zielniveau **WCAG 2.2 AA**, inkl. neuer Kriterien (2.5.8, 2.4.11, 2.5.7).
- Semantisches HTML, ARIA nur ergänzend nach APG.
- Tastaturbedienbarkeit, sichtbare Fokus-Styles.
- Textkontrast: ≥ 4.5:1 (Normal), ≥ 3:1 (Groß).
- Accessible Names bei allen Controls.
- Formulare: Labels, Fieldsets, aussagekräftige Fehlermeldungen.
- H1 pro Seite, Skip-Link, sinnvolle Linktexte.
- Medien: Untertitel, `prefers-reduced-motion` beachten.
- Bootstrap-Komponenten mit korrekten Rollen/Zuständen.

## Bootstrap 5
- Utility-Klassen bevorzugen; eigene Klassen mit `mkb-`-Präfix.
- ARIA-Rollen korrekt.
- Grid & Spacing responsiv.

## PHP/JS Vorgaben
- PHP: `readonly`-Properties, Enums wo sinnvoll.
- JS: ESM, kein globaler Scope.
- Fetch statt jQuery AJAX.

## Admin/Customizer
- Settings API mit Cap-Check.
- Customizer nur wenn nötig, sonst eigene Options-Seite.

## Integration Points
- WordPress Core Hooks & Funktionen.
- Customizer API für Theme-Optionen.
- Template Tags für Content-Ausgabe.
- Widget Areas & Menüs.

## Tests & Qualitätssicherung
- Cross-Version-Tests in WordPress.
- Kompatibilität mit gängigen Plugins prüfen.
- Responsive Tests auf verschiedenen Geräten.
- HTML- und CSS-Validierung.
- Barrierefreiheits-Check (Keyboard-Navigation, Kontraste, Screenreader).

## Commits & Kommentare
- Commit-Format: `feat:`, `fix:`, `refactor:`.
- Kommentare: „Warum“, nicht „Was“.

## Was Copilot bevorzugt generieren soll
- Asset-Enqueue inkl. Deps, `defer`, `filemtime()`.
- Setup-Hooks: `after_setup_theme`, `wp_enqueue_scripts`, `init`.
- Template-Parts mit Escaping & I18n.
- Sanitize/Validate-Callbacks.
- Bootstrap-Komponenten ohne jQuery.

## Was Copilot vermeiden soll
- Kein jQuery, keine Inline-Scripte.
- Keine direkten SQL-Queries.
- Keine Ausgabe ungeprüfter Daten.

## Snippet-Wünsche
- Enqueue (PHP) mit Bootstrap & Popper.
- Template-Part mit Loop & `wp_kses_post()`.
- Options-Seite mit Settings API.

## Build & Development
- Styles: SCSS → CSS mit Sourcemaps in Dev, minifiziert in Prod.
- Scripts: ESM bundlen, Tree‑Shaking, getrennte Dev/Prod‑Builds.
- Watch: automatisches Rebuild bei Dateiänderungen.
- Lokale Vorschau: statischer Dev‑Server oder WP‑Instanz mit Live‑Reload.
- Artefakte: Ausgabe nach `assets/css` und `assets/js`, Dateinamen stabil halten.
- Versionierung: CSS/JS-Version via Dateizeitstempel (filemtime) an WP übergeben.

## Generierungsleitplanken (für Copilot)

### Enqueue (PHP)
- Child‑Theme‑sichere Pfade verwenden (**get_theme_file_uri/path**).
- **CSS und JS getrennt** versionieren (jeweils `filemtime` der Zieldatei).
- Skripte mit **`strategy: 'defer'`** laden (oder alternativ `wp_script_add_data( 'defer', true )`).
- **In Footer** laden, Abhängigkeiten korrekt setzen (Handles `bootstrap`, `popper`, `mkb-main`).
- Erst **registrieren**, dann **enqueue**; Handles immer mit Präfix **`mkb-`**.
- Keine jQuery‑Abhängigkeit; nur Popper falls benötigt.

### Template‑Parts (WP)
- Wiederverwendbare Komponenten via **`get_template_part()`** aus `template-parts/` (oder `parts/`).
- **Daten per `$args`** (WP ≥ 5.5) übergeben, nicht über Globals.
- In Listen/Teasern **`the_excerpt()`** statt vollem Content; Titel als Link mit korrektem Heading‑Level.
- Konsistentes Escaping (`esc_html`, `esc_attr`, `wp_kses_post`) und i18n mit Textdomain **`mk-business`**.
- A11y: Fokus‑Styles sichtbar, sinnvolle Linktexte, Landmark‑Struktur (`main`, `header`, `nav`).

### Settings API (Admin)
- Optionen unter eigenem Key (z. B. `mkb_theme_options`) registrieren.
- **`sanitize_callback`** bereitstellen; nur erlaubte Felder whitelisten.
- Eingabefelder mit gekoppelten **`<label>`**, Gruppen via `fieldset/legend`.
- **Capabilities** prüfen (`manage_options` o. ä.), Nonces einsetzen.
- Ausgabe im Admin **escapen**; Hilfetexte nicht nur farblich kennzeichnen.