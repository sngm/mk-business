# Beitragshinweise für mk-business

Danke, dass du zum mk-business Theme beiträgst!  
Dieses Dokument erklärt kurz den Ablauf für Änderungen, PRs und Code-Standards.

---

## Branch-Strategie
- **main**: stabile Version
- **develop**: aktueller Entwicklungsstand
- Feature-Branches: `feature/<kurze-beschreibung>`
- Bugfix-Branches: `fix/<kurze-beschreibung>`

---

## Commits
- Commit-Format: `feat:`, `fix:`, `refactor:`, `docs:`, `chore:`
- Präzise, kurze Beschreibungen; im Imperativ (z. B. „füge … hinzu“)

---

## Code-Standards
- PHP: PSR-12 + WordPress-Standards, Tabs (4 Spaces)
- JavaScript: ESM, kein jQuery
- CSS: SCSS mit Bootstrap 5 Utility-Klassen bevorzugt
- Barrierefreiheit nach WCAG 2.x AA
- Sicherheit: Escaping/Sanitizing konsequent umsetzen

---

## Vor einem Pull Request
1. Branch aktuell halten (`git pull --rebase develop`).
2. Linting/PHPCS prüfen (`composer run lint` falls vorhanden).
3. Build ausführen (SCSS/CSS, JS Bundles).
4. Alle relevanten Tests durchlaufen lassen (Responsivität, A11y, Performance).
5. **PR-Checkliste** in `.github/PULL_REQUEST_TEMPLATE.md` vollständig abarbeiten.

---

## Pull Requests
- PR-Titel klar und prägnant.
- Beschreibung mit Kontext und ggf. Screenshots.
- Nur relevante Änderungen in einem PR (keine gemischten Features/Fixes).
- PR-Checkliste im Template abhaken.

---

## Review & Merge
- Mindestens ein Review durch einen anderen Entwickler.
- Keine Self-Merges ohne vorheriges Review.
- Nach Merge ggf. Changelog aktualisieren.

---

## Fragen & Support
Für interne Rückfragen:  
- Kollege XY (Lead Dev)
- oder Ticket im internen Tracker anlegen
