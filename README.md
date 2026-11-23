# NYDLA WordPress

Lean custom WordPress theme for **NYDLA** — **New York Distance Learning Association** — on **NYDLA.com**, and future **NYDLA.biz** sponsor mini-sites.

- Theme display name: **NYDLA WordPress**
- Folder / text domain: `nydla-wordpress`
- Version: **1.0.1** — structure ready for page builds (no content migration)

No Elementor, GeneratePress, or page builders. Classic PHP templates + `theme.json` + block patterns.

## Activate

1. Copy this folder into `wp-content/themes/nydla-wordpress/`
2. Appearance → Themes → activate **NYDLA WordPress**
3. Appearance → Customize → Site Identity → upload a logo (optional)
4. Appearance → Menus:
   - Create a menu and assign to **Primary Navigation**
   - Optionally assign a menu to **Footer Navigation**
5. Settings → Reading → set a static front page when ready

Without a Primary menu, a simple fallback nav (Home / About / Sponsors / Podcasts / Events / Contact) is shown.

## Patterns

Block patterns live in `patterns/` and appear under the **NYDLA** category in the inserter:

| Pattern | File | Use |
| --- | --- | --- |
| Home hero (skyline) | `home-hero.php` | Front page hero |
| About / mission band | `about-mission.php` | About / mission |
| Sponsors grid shell | `sponsors-grid.php` | Sponsors page |
| Podcasts list shell | `podcasts-list.php` | Podcasts page |
| Events list shell | `events-list.php` | Events page |
| Contact / Join CTA band | `contact-join-cta.php` | Contact / join CTA |
| Mini-site hero shell | `mini-site-hero.php` | Future NYDLA.biz / vendor pages |

Compose pages from patterns — do not redesign per page.

## Assets

- CSS: `assets/css/main.css` (design tokens + chrome + pattern styles)
- JS: `assets/js/main.js` (mobile nav only, deferred)
- Images: `assets/images/skyline-*.svg` (placeholders for every empty media slot)

Custom image sizes: `nydla-hero`, `nydla-band`, `nydla-card`, `nydla-thumb`.

## Design tokens

Defined in `theme.json` and mirrored as CSS variables in `main.css`:

- Ink / Navy / Steel / Mist / Paper / Amber / Sky
- Display serif + system sans
- Wide layout `70rem`, content `42rem`

## What’s intentionally out of v1

- Real NYDLA copy, forms, membership wiring
- Content migration from nydla.org
- Hostinger / production deploy steps
