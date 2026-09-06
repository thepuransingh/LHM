# Elementor Build Guide — Lovewave Harmony Music

Maps the homepage prototype (`homepage-prototype.html`) to an actual WordPress + Elementor build. Section order matches the live prototype exactly.

## Before you start

**Plugins:**
- Elementor Pro — Theme Builder (header/footer), Popup Builder, Forms, Loop Grid, native video widget
- Advanced Custom Fields (or Pods) + Custom Post Type UI — powers the Music catalog as real data instead of hand-built tiles
- WP Rocket (or similar) — caching
- Rank Math (or Yoast) — SEO meta + schema
- ShortPixel or Smush — image compression (real uploaded photos, not the embedded base64 the prototype uses)

**Theme:** Hello Elementor — lightest possible base, leaves all styling to Elementor.

## Global Site Settings (Elementor → Site Settings)

**Global Colors**
| Token | Hex | Use |
|---|---|---|
| Paper / BG | `#1A1025` | Page background |
| Surface | `#2A1E35` | Cards, alternating sections |
| Text | `#F7F0E6` | Headings + body |
| Text Muted | `#C9B8C7` | Captions, subtitles |
| Accent (Gold) | `#D4A85C` | Buttons, links, hover states |
| Accent Ink | `#1A1025` | Text on gold buttons |

**Global Fonts:** Headings/song titles → Playfair Display. Body/UI → Manrope. Two fonts only.

**Layout:** 1140px boxed content width, page background set to Paper globally.

## Section-by-section

### 1. Header — Theme Builder → Header template
Full-width sticky section, 82%-opacity plum background. Three-column inner row: Site Logo widget | Nav Menu widget (Home/Music/Videos/Playlists/About/Contact) | Social Icons (Spotify, YouTube) + gold Button ("Follow").
- Sticky: Advanced → Motion Effects → Sticky = Top.
- The blur-behind-header effect needs one line of Custom CSS on the section (`backdrop-filter: blur(14px)`) — Elementor has no native control for it.
- **Mobile menu is free**: the Nav Menu widget auto-collapses into Elementor's built-in hamburger at whatever breakpoint you set (Advanced → Responsive). This replaces the prototype's hand-built JS toggle entirely — no code needed.

### 2. Hero
Full-width section, height sized to content (not 100vh) — roughly 600–650px desktop, auto height on mobile. Background: gradient overlay + Section Background video (Elementor supports a native looping muted background video here). Content: H1 Heading (Playfair Display), Text Editor sub-headline, two Buttons ("Listen to the Latest Single" gold, "Watch on YouTube" outline).

### 3. Listen Bar
Surface-color section. Row of 4 Button/Icon Box widgets (Spotify, Apple Music, YouTube Music, Amazon Music), wraps automatically on mobile. Plus one more Button, "Pre-save Next Single", linking to the DistroKid Hyperfollow URL.

### 4. Sticky mini-player
No native Elementor equivalent. Two options: skip for launch (cleanest), or port the prototype's custom HTML/CSS/JS into an Elementor HTML widget (works, but Elementor can't visually edit it). Recommendation: ship without it, revisit as a v2 polish item.

### 5. New Release Spotlight
Two-column section: Image widget (cover art) | Heading + Text Editor (story) + Icon List (the 3 instrumentation bullets) + a real embedded player + two Buttons. Because a live WordPress page has no sandbox restriction, the "player" can now be a genuine embedded Spotify `<iframe>` via Elementor's Embed widget — a real upgrade over the prototype's mock progress bar. The lyric excerpt reads well as Elementor's Blockquote widget (left gold border matches the site style).

### 6. Top 3 Songs
Three Icon Box widgets side by side (title, mood, description, "Read lyrics" link) — or a Loop Grid manually filtered to 3 selected posts, if you've already built the Release CPT below.

### 7. Music (Complete Collection) — the one section worth a real data model
- Custom Post Type: **Release** (via CPT UI)
- ACF fields on Release: Cover Image, Mood (or better, a real **Mood taxonomy**: Romantic / Heartbreak / Devotional), Release Year, Streaming Links, Lyrics Excerpt, Featured (true/false)
- Build with a **Loop Grid** (Elementor Pro) querying the Release CPT
- Using a taxonomy for Mood unlocks Loop Grid's **native filter buttons** — this replaces the prototype's hand-written JS filter with zero custom code
- Two Loop Grids (or one with a Featured flag) separate the pinned Featured row from the full Complete Collection grid

### 8. Videos
Three native **Video** widgets (Elementor's built-in YouTube widget) — paste each YouTube URL directly. On the real site these give true inline playback with YouTube's own thumbnail, unlike the prototype's click-through cards (which exist there only because the artifact preview's sandbox blocks framing external sites).

### 9. Playlists
Two Icon Box widgets per card — Spotify and YouTube — each linking to that mood's real playlist on the respective platform.

### 10. About
Two-column section: Image widget (the Rhodes piano/mic photo) | Text Editor (short + long bio) + Button ("License" → opens a Popup, see below).

### 11. Support & Contact
Two-column section: Text Editor + Button ("Support via PayPal" → your real PayPal.me link) | Text Editor with a direct mailto link for Business & Licensing.

### 12. Email Capture
Replace the prototype's `mailto:` workaround with a real **Elementor Pro Form** widget — Name + Email fields, "Action After Submit" → Email (to contact@lovewaveharmonymusic.com, subject "New Subscriber") and/or the Mailchimp integration if you connect that add-on. This is the actual fix for the one-more-step limitation I flagged earlier — a real form delivers silently in one click, no mail client required.

### 13. Footer — Theme Builder → Footer template
Same structure as the prototype: logo + tagline, Listen links, Site links, social icons row, copyright + IP notice in small print.

### 14. Lyrics / Privacy / License panels
Rebuild each as an **Elementor Pro Popup** (Popup Builder), set to open "On Click" for elements carrying a matching CSS class — no custom JS required.
**Recommendation:** give Privacy Policy and Licensing their own real WordPress pages instead of popups — better for SEO, easier to edit later, and shareable/bookmarkable as a direct URL. Save the popup pattern for the lyric excerpts, which don't need their own URLs.

## What Elementor solves for you (no custom code needed)
- Mobile hamburger nav — Nav Menu widget's built-in responsive behavior
- Real inline video/audio embeds — no sandbox restriction like the artifact preview
- Contact/signup form delivery — Elementor Forms
- Filterable catalog grid — Loop Grid's native taxonomy filter

## What still needs manual or custom work
- The sticky mini-player bar (skip for v1, or port as a custom HTML widget)
- The header's backdrop-blur (one line of Custom CSS)
- The vinyl-record placeholder art generator — delete entirely once real cover photos are uploaded; it was only ever a stand-in
