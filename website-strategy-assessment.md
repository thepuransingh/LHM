# Love Wave Harmony — Website Strategy & Redesign Assessment

Prepared for: contact@lovewaveharmony.com
Platform: WordPress + Elementor
Live report (designed version): https://claude.ai/code/artifact/96ac3971-9a3f-4d40-bd2b-341cd64aae23

> **Methodology note:** this assessment is built from the platform (WordPress/Elementor), the stated goals, and common failure patterns in long-running Elementor music sites. The session that produced this document did not have network access to crawl lovewaveharmony.com live — check each audit point against the real site and adjust.

## Executive Summary

Love Wave Harmony has a real catalog and a name with built-in visual/motion equity ("wave," "harmony") that most artists have to invent from nothing. The current site isn't putting a visitor within one click of a song, isn't collecting emails, and doesn't look like it belongs to an active artist. The fix is structural: turn every page into a listening surface (native embeds, not just links), give releases and songs their own indexable pages instead of one long "Music" scroll, and build one owned channel — email — that survives algorithm changes on Spotify, Instagram, and TikTok.

## 1. Website Audit

- **Branding & first impression** — Default Elementor hero patterns don't cash the visual check the name writes. No recurring motif (waveform, color signature, type treatment) ties the site to your cover art or social grid.
- **Navigation & IA** — Likely flat (Home / About / Music / Contact) with one long "Music" page. No per-release or per-song URLs for search engines, curators, or bio links to land on.
- **UX/UI** — Unmodified Elementor widgets read as templated; vague CTAs ("Learn More") cost clicks that a specific verb ("Listen on Spotify") would convert.
- **Engagement & discovery** — If songs are outbound links rather than embedded native players, visitors leave the site to listen and most don't return. No smart-link page means no single link works across every platform.
- **Mobile** — Desktop-first Elementor layouts commonly break on phones: cropped heroes, non-responsive embeds, small tap targets, no persistent player — while most bio-link traffic is mobile.
- **Fan retention** — No email list, no news cadence, no countdown, no social proof. Nothing signals an active artist worth checking back on.

## 2. Homepage Redesign Strategy

Content hierarchy, top to bottom:

1. Hero (sized to content, not 100vh) — wordmark, one strong image/clip, one-line brand promise, "Listen Now" + "Watch" CTAs
2. Persistent listen bar (sticky after scroll)
3. Latest release spotlight — native embed + platform icons, auto-populated
4. Upcoming release / pre-save countdown (hidden when nothing's announced)
5. Artist story — short scannable bio + pull-quote, links to full bio/press kit
6. Discography grid — filterable, art-forward
7. Video — latest music/lyric video embedded
8. Press & social proof strip
9. Newsletter signup with a real incentive
10. Contact / collaborate
11. Footer — full platform links, social icons, sitemap, contact email

**Motion, used sparingly:** waveform section dividers/scroll indicator, cover-art hover lift, animated equalizer "now playing" indicator, consistent subtle scroll reveals, `prefers-reduced-motion` respected throughout.

## 3. Feature Recommendations

- **Player:** native Spotify/Apple embeds (count toward real streams/algorithm signals) instead of a custom player
- **Smart-link pages** per release listing every platform — use as the one social bio link
- **Pre-save countdown** for announced releases
- **Newsletter** (Mailchimp/ConvertKit) gated with a real incentive
- **Fan community** — a link out to Discord/Facebook group, not built inside WordPress
- **Social embeds** (Instagram/TikTok) to keep the homepage current
- **Press/media kit page** — bio, photos, logos, coverage, contact, downloadable PDF
- **Artist timeline** of real milestones
- **Testimonials/press quotes** strip
- **Routed contact form** (Press / Collaboration / Licensing / Fan mail) + mailto fallback

## 4. Content Strategy

- **Artist bio:** three lengths (one-line hook, ~100-word short, 300–500 word full) — hook → sound/influences → what the listener gets → recent achievement → CTA
- **Album pages:** cover art, release date, tracklist linking to song pages, credits, story, embedded player
- **Song pages:** one per single — title, art, release date, all platform links, lyrics, "behind the song" note (high-value SEO surface)
- **Release announcements:** repeatable template — teaser art, pre-save link, countdown
- **Blog/news:** studio updates, playlist placements, tour news, process posts, collaborator spotlights — written once, repurposed into newsletter/social
- **SEO:** `MusicGroup`/`MusicAlbum`/`MusicRecording` schema, long-tail genre/mood keywords, alt text everywhere, internal linking across songs/albums/blog

## 5. Visual Design Direction — confirmed: Soul/Motown

The brand is original Soul-Motown ballads, not generic indie-pop, so the direction locks to a cinematic, late-night, vinyl-era identity rather than a light neutral palette.

**Palette:** deep midnight plum `#1A1025` (main background), warm charcoal `#2A1E35` (cards, album sections), warm cream `#F7F0E6` (headlines/body text), dusty mauve `#C9B8C7` (muted text, captions), vintage gold `#D4A85C` (buttons, links, hover states, player progress bar — midnight text on gold for contrast). Plum reads as night and intimacy, gold as Motown vinyl luxury, cream keeps it readable — this is a deliberately single, dark, cinematic world rather than a page with a light/dark toggle.

**Typography:** Playfair Display for headlines and song titles (serif, romantic, editorial — 48–64px desktop, 32px mobile), Manrope for body/UI (clean sans, 16–18px). Two fonts only.

**Motifs:** a heart-and-waveform mark for the logo (a soundwave line running through a heart outline — literalizes "Lovewave"); vinyl-record cover art (jacket + exposed disc with grooves and a gold label) as the recurring visual unit for every album/song, so the catalog reads as a record collection rather than a stock image grid; thin gold rule dividers and sunburst-ray backgrounds borrowed from vintage Motown concert posters; a spinning-disc animation tied to the play state instead of a generic progress spinner.

**Hero imagery:** cinematic and blurred, darkened ~60% for text contrast, fixed on scroll with a plum-to-transparent gradient at the base — a vintage mic with bokeh lights or a slow-dance silhouette, never a bright stock-photo smile. Every other page stays flat plum with no imagery, to keep load times down.

- **Layout:** editorial, art-forward, asymmetric where it earns it; discography split into a small "Featured" set (large art) above a filterable "Complete Collection" grid (by mood: Romantic / Heartbreak / Devotional) rather than 17 equal tiles.

## 6. Technical Recommendations

- **Widgets/plugins:** Elementor Pro, ACF + Custom Post Type UI (Album/Song/Release types), Rank Math, WP Rocket, ShortPixel/Smush, Mailchimp/ConvertKit for Elementor Forms, UpdraftPlus
- **Performance:** lightweight base theme (Hello Elementor/Astra), lazy-loading, WebP/AVIF art, CDN (Cloudflare), prune unused plugins, audit nested-container bloat, target LCP < 2.5s
- **SEO:** XML sitemap, structured data, unique title/meta per song and album page, Search Console + Bing Webmaster Tools
- **Security:** keep core/theme/plugins current, Wordfence/Sucuri, 2FA, login-attempt limits, offsite backups, remove unused plugins/themes entirely
- **Analytics:** GA4 + GTM with outbound "listen" click events per platform, UTM-tagged bio/social links, Microsoft Clarity or Hotjar for on-page behavior

## 7. Fan Conversion Strategy

- **Visitor → follower:** platform-follow CTAs above the fold and after every section; treat "Follow" as distinct from "Play"
- **More streams:** consistent smart links, on-site native embeds, pre-save campaigns concentrating first-day streaming
- **Email growth:** incentivized signup at high-intent moments (after latest release, in the footer)
- **Repeat visits:** visible countdowns, a real content cadence, links to an active community

## 8. Implementation Roadmap

**Quick wins (1–2 weeks):** native player embeds, CTA rewrite, newsletter signup, image compression/caching, GA4 + Search Console, routed contact form.

**Medium-term (3–6 weeks):** Album/Song/Release post types, homepage rebuild, individual song pages with lyrics, press/media kit page, pre-save + countdown component, artist timeline.

**Long-term (2–4 months):** full visual identity sitewide, fan community/membership tier, ongoing SEO content calendar, UTM/attribution dashboard, reassess Elementor performance ceiling.

## 9. Estimated Priority Matrix

| Initiative | Priority | Effort | Timeframe |
|---|---|---|---|
| Native streaming embeds on homepage | High | Low | Week 1 |
| Specific, action-verb CTAs sitewide | High | Low | Week 1 |
| Newsletter signup with real incentive | High | Low | Week 1–2 |
| Image compression & caching | High | Low | Week 1–2 |
| GA4 + Search Console setup | High | Low | Week 1 |
| Smart-link pages per release | High | Medium | Week 2–4 |
| Album & song post types (ACF) | High | High | Week 3–6 |
| Individual song pages with lyrics | Medium | Medium | Week 4–6 |
| Homepage rebuild to new hierarchy | High | High | Week 4–6 |
| Press / media kit page | Medium | Medium | Week 4–6 |
| Pre-save + countdown component | Medium | Medium | Week 5–6 |
| Structured data (MusicGroup/Recording) | Medium | Low | Week 3–4 |
| Artist timeline section | Low | Medium | Month 2 |
| Full visual identity applied sitewide | Medium | High | Month 2–3 |
| Fan community / membership tier | Low | High | Month 3–4 |
| SEO content calendar (blog) | Medium | Medium | Ongoing from Month 2 |
| UTM / attribution dashboard | Low | Medium | Month 3 |
