# PR-Checkliste (mk-business)

Bitte alles Relevante abhaken (oder „N/A“):

## Umfang & Basics
- [ ] Ticket/Issue verlinkt, Scope klar beschrieben
- [ ] Keine toten Dateien/Debug-Ausgaben/var_dump
- [ ] Naming konsistent: Handles/IDs/Klassen mit Präfix `mkb-`
- [ ] Textdomain korrekt: `mk-business`

## Templates & Struktur
- [ ] Template-Hierarchie eingehalten (WP-Standards)
- [ ] Wiederverwendbare Teile via `get_template_part()` (Ordner `template-parts/` oder `parts/`)
- [ ] Datenübergabe an Template-Parts über `$args` (WP ≥ 5.5)
- [ ] Eine H1 pro Seite, sinnvolle Überschriften-Hierarchie

## Enqueue & Assets
- [ ] CSS/JS via **registrieren → enqueue**; Child-Theme-sichere Pfade (`get_theme_file_uri/path`)
- [ ] Separate Versionen für CSS/JS über `filemtime`
- [ ] Scripts im Footer mit `strategy: 'defer'` (oder `wp_script_add_data`)
- [ ] Keine jQuery-Abhängigkeit; Popper nur wenn nötig
- [ ] Ausgabepfade: `assets/css` & `assets/js` (stabile Dateinamen)

## Sicherheit
- [ ] Output escaped (`esc_html`, `esc_attr`, `wp_kses_post`), URLs mit `esc_url`
- [ ] Input sanitisiert (z. B. `sanitize_text_field`, `sanitize_key`)
- [ ] Nonces und `current_user_can()` bei Write-/Admin-Operationen
- [ ] Kein Direktzugriff auf PHP-Dateien (`if (!defined('ABSPATH')) exit;`)
- [ ] Secure Custom Fields: Werte validiert + escaped

## Barrierefreiheit (WCAG 2.2 AA)
- [ ] Tastaturbedienbar (Tab-Reihenfolge korrekt, ESC/Enter/Space wo erwartet)
- [ ] Sichtbare Fokus-Styles; Fokus nicht verdeckt (2.4.7/2.4.11)
- [ ] Kontraste: Text ≥ 4.5:1, UI/Fokus ≥ 3:1
- [ ] Accessible Names/Labels für Controls; Linktexte aussagekräftig
- [ ] Skip-Link zu `#main`; Landmark-Struktur (`header/nav/main/footer`)
- [ ] Medien: Untertitel/Transkript vorhanden; `prefers-reduced-motion` respektiert

## Performance
- [ ] Unnötige Abhängigkeiten entfernt; Tree-Shaking aktiv
- [ ] Bilder: `loading="lazy"`, `decoding="async"`, passende Größen/Srcset
- [ ] Keine blockierenden Assets im `<head>` (außer notwendig)

## Internationalisierung
- [ ] Alle Strings übersetzbar mit Textdomain `mk-business`
- [ ] Platzhalter korrekt (`sprintf`, `number_format_i18n`, `date_i18n`)

## Admin/Customizer
- [ ] Settings API: `register_setting` mit `sanitize_callback`
- [ ] Felder mit `<label>` gekoppelt; Gruppen via `fieldset/legend`
- [ ] Capabilities geprüft (z. B. `manage_options`)

## JavaScript & CSS
- [ ] ESM-Module, kein globaler Scope (nur falls notwendig unter `window.mkb`)
- [ ] Bootstrap 5 Markup/ARIA gemäß APG; keine jQuery-Plugins
- [ ] SCSS/Utility-Klassen bevorzugt; keine Inline-Styles

## Build & Tests
- [ ] Dev/Prod-Builds laufen (Sourcemaps in Dev, minifiziert in Prod)
- [ ] HTML/CSS valide; Linting/PHPCS (WP-Standard) sauber
- [ ] Responsives Verhalten auf gängigen Breakpoints geprüft
- [ ] Relevante Browser/WP-Versionen getestet; Plugin-Kompatibilität grob verifiziert

## Sonstiges
- [ ] Changelog/README angepasst (falls nötig)
- [ ] Screenshots/GIFs im PR für UI-Änderungen
