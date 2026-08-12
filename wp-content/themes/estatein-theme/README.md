# Estatein WordPress Theme

Dark-themed real estate website — pixel-matched from Figma.

## Design Tokens
- Background: `#141414` / `#1a1a1a`
- Card bg:     `#1e1e1e` / `#262626`
- Accent:      `#703BF7` (purple)
- Font:        Urbanist (Google Fonts)

## Breakpoints
| View    | Width  |
|---------|--------|
| Desktop | 1920px |
| Laptop  | 1440px |
| Mobile  | 390px  |

## Installation
1. Upload the `estatein-theme` folder to `/wp-content/themes/`
2. Activate in **Appearance → Themes**
3. Set Homepage: **Settings → Reading → Static Page → Front Page**
4. Add properties via the **Properties** CPT in the WP admin

## Customizer Options
Go to **Appearance → Customize**:
- **Hero Section** — tag text, title, description, CTAs, stats
- **CTA / Newsletter** — title, description, button text

## Property Custom Fields (meta keys)
| Key                   | Description         |
|-----------------------|---------------------|
| `_property_price`     | Numeric price       |
| `_property_status`    | For Sale / For Rent |
| `_property_beds`      | Bedrooms count      |
| `_property_baths`     | Bathrooms count     |
| `_property_area`      | Area in m²          |
| `_property_location`  | City, State         |
| `_property_featured`  | 1 = show on homepage|

Use **Advanced Custom Fields** (ACF) or any meta plugin to add these fields.

## Menus
Register these menu locations:
- Primary Navigation
- Footer – Home / About / Properties / Services / Contact

## Assets
- `assets/css/main.css` — all styles
- `assets/js/main.js`   — mobile nav, counters, AJAX newsletter
