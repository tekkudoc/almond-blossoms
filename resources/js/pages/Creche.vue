<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Weddings & Events Crèche | Almond-Blossoms Events" />

    <div class="page-wrapper">
        <!-- ══════════════════════════════════ -->
        <!-- HERO                               -->
        <!-- ══════════════════════════════════ -->
        <section class="hero">
            <div class="hero-img"></div>

            <!-- Corner frames -->
            <span class="corner corner--tl"></span>
            <span class="corner corner--br"></span>

            <div class="hero-content">
                <span class="hero-eyebrow"
                    >Almond-Blossoms Events · Childcare Services</span
                >
                <p class="hero-quote">
                    "Where tiny guests are treated like VIPs."
                </p>
                <h1 class="hero-title">
                    Weddings &amp; Events<br />
                    <em>Crèche</em>
                </h1>
                <p class="hero-sub">
                    Providing a magical experience for your youngest guests
                </p>
            </div>

            <div class="hero-scroll">
                <div class="scroll-line"></div>
                <span>Discover</span>
            </div>
        </section>

        <!-- ══════════════════════════════════ -->
        <!-- INTRO                              -->
        <!-- ══════════════════════════════════ -->
        <section class="intro">
            <div class="intro-inner">
                <span class="section-label">Our Philosophy</span>
                <p class="drop-cap">
                    At Almond-Blossoms we understand that planning a wedding or
                    an event is an exciting time for joy, filled with
                    connections and celebrations. However, it can feel
                    overwhelming especially where children are involved, and can
                    bring challenges to parents in making sure that the children
                    are safe, entertained and happy in a fun environment.
                </p>
                <p>
                    Our professional wedding nanny and crèche service allows
                    your guests to feel relaxed, and have peace of mind while
                    the children are looked after by our professional nannies.
                    We provide crèche services that are bespoke childcare
                    solutions designed specifically for your wedding or event in
                    a nurturing environment.
                </p>
            </div>
        </section>

        <!-- ══════════════════════════════════ -->
        <!-- BESPOKE SOLUTIONS                  -->
        <!-- ══════════════════════════════════ -->
        <section class="bespoke">
            <div class="section-header">
                <span class="section-signature">Tailored Care</span>
                <h2 class="section-title">Beyond Basic Childcare</h2>
                <p class="section-body">
                    We go beyond basic childcare by offering bespoke crèche
                    solutions tailored precisely to your wedding or event.
                </p>
            </div>

            <div class="cards-grid">
                <div class="card">
                    <span class="card-num">01</span>
                    <div class="card-icon">🌸</div>
                    <h3>Babies</h3>
                    <p>
                        A completely quiet and calm space designed specifically
                        for the youngest guests to rest and feel secure
                        throughout the day.
                    </p>
                </div>
                <div class="card">
                    <span class="card-num">02</span>
                    <div class="card-icon">✨</div>
                    <h3>Toddlers &amp; Children</h3>
                    <p>
                        Highly engaging entertainment, creative activities, and
                        curated toys designed especially for toddlers and young
                        children.
                    </p>
                </div>
                <div class="card">
                    <span class="card-num">03</span>
                    <div class="card-icon">🎀</div>
                    <h3>Flexible Care</h3>
                    <p>
                        Continuous, flexible care throughout the entire duration
                        of your event, adapting seamlessly to your schedule and
                        needs.
                    </p>
                </div>
            </div>

            <div class="bespoke-quote">
                <p>
                    "Our crèche setups are styled to beautifully complement your
                    event's aesthetic, creating a warm and inviting space where
                    children feel secure, comfortable, and excited to play."
                </p>
            </div>
        </section>

        <!-- ══════════════════════════════════ -->
        <!-- SAFETY (dark)                      -->
        <!-- ══════════════════════════════════ -->
        <section class="safety">
            <div class="safety-inner">
                <div class="safety-left">
                    <span class="section-label"
                        >Standards &amp; Compliance</span
                    >
                    <h2>Safety &amp; Quality <em>Care</em></h2>
                    <p>
                        Our pricing is perfectly tailored based on the exact
                        number of children and their ages. We strictly follow
                        recommended childcare guidelines to ensure the absolute
                        highest standard of safety for every child in our care.
                    </p>
                    <span class="ofsted-badge"
                        >Based on Ofsted Child–Adult Ratios</span
                    >
                </div>

                <div class="ratios-card">
                    <div class="ratio-row">
                        <span class="ratio-age">0–2</span>
                        <span class="ratio-text"
                            >years — one adult to
                            <strong>three</strong> children</span
                        >
                    </div>
                    <div class="ratio-row">
                        <span class="ratio-age">2–3</span>
                        <span class="ratio-text"
                            >years — one adult to
                            <strong>four</strong> children</span
                        >
                    </div>
                    <div class="ratio-row">
                        <span class="ratio-age">4–8</span>
                        <span class="ratio-text"
                            >years — one adult to
                            <strong>six</strong> children</span
                        >
                    </div>
                    <div class="ratio-row">
                        <span class="ratio-age">9–12</span>
                        <span class="ratio-text"
                            >years — one adult to
                            <strong>eight</strong> children</span
                        >
                    </div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════ -->
        <!-- WEDDING NANNIES                    -->
        <!-- ══════════════════════════════════ -->
        <section class="nannies">
            <div class="nannies-inner">
                <div class="nannies-header">
                    <span class="section-signature"
                        >Let's Make it Mesmerise</span
                    >
                    <p class="section-body">
                        We offer flexible packages to suit different wedding
                        sizes and needs. Get in touch to receive a personalised
                        quote and let Almond-Blossoms take care of the little
                        ones so everyone can enjoy the big moments.
                    </p>
                </div>

                <div class="nannies-grid">
                    <!-- Left: story -->
                    <div class="nannies-left">
                        <span class="section-label"
                            >Our Most Popular Service</span
                        >
                        <h2>Wedding &amp; Events <br /><em>Nannies</em></h2>
                        <p>
                            Our aim is to allow you and your guests to have a
                            stress-free and fun experience by providing
                            exceptional, high quality and engaging childcare
                            services.
                        </p>
                        <p>
                            This service is designed for your children to have a
                            dedicated nanny for the day with all care given —
                            nappy changes, toileting, bath, and bedtime — as
                            well as engaging in fun activities and keeping
                            children entertained throughout.
                        </p>

                        <div class="pricing-box">
                            <span class="pricing-label">Investment</span>
                            <span class="pricing-value">Bespoke Pricing</span>
                            <Link href="/contact" class="pricing-cta"
                                >( Let's Plan )</Link
                            >
                        </div>
                    </div>

                    <!-- Right: checklist -->
                    <div class="checklist-card">
                        <h3>What to Expect</h3>
                        <span class="checklist-divider"
                            >Your children's safety is our top priority</span
                        >
                        <ul class="checklist">
                            <li>Qualified, DBS-checked nannies</li>
                            <li>First aid trained childcare professionals</li>
                            <li>
                                On-site childcare directly at your venue or a
                                nearby location
                            </li>
                            <li>
                                Age-appropriate activities, games, and crafts
                            </li>
                            <li>
                                A consistently calm, safe, and nurturing
                                environment
                            </li>
                            <li>
                                Flexible coverage from the ceremony through to
                                the evening
                            </li>
                            <li>
                                A beautifully designed children's space with
                                soft play areas, teepees, cosy corners, toys,
                                books, creative activities, and quiet sleep
                                areas for younger children
                            </li>
                        </ul>
                        <p class="checklist-footer">
                            All crèche services are designed with flexibility in
                            mind so your guests can visit and check on their
                            children at any time during the event
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════ -->
        <!-- FOOTER CTA                         -->
        <!-- ══════════════════════════════════ -->
        <section class="footer-cta">
            <div class="footer-cta-inner">
                <span class="section-label">Ready to Begin?</span>
                <h2>Let's Create Something<br />Truly Unforgettable</h2>
                <p>
                    Contact us today to discuss your event and receive a
                    personalised crèche package tailored just for you.
                </p>
                <Link href="/contact" class="btn-primary">Get In Touch</Link>
            </div>
        </section>
    </div>
</template>

<style scoped>
/* ─── Google Fonts (add to your app's global CSS or index.html if not already present) ─── */
/* @import url('https://fonts.googleapis.com/css2?family=Lavishly+Yours&family=Tangerine:wght@400;700&display=swap'); */
/* Georgia is a system font — no import needed. */

/* ─── Design tokens ─── */
.page-wrapper {
    --wine: #4a1c2f;
    --rose: #c4788f;
    --mauve: #9b6b7e;
    --blush: #f5e8ec;
    --light: #fdf6f8;
    --cream: #faf4ef;
    --dark: #2d0f1e;

    font-family: Georgia, 'Times New Roman', serif;
    color: var(--wine);
    overflow-x: hidden;
}

/* ─────────────────────────────────────── */
/* HERO                                    */
/* ─────────────────────────────────────── */
.hero {
    position: relative;
    height: 100svh;
    min-height: 700px;
    display: grid;
    place-items: center;
    overflow: hidden;
}

.hero-img {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            160deg,
            rgba(74, 28, 47, 0.62) 0%,
            rgba(74, 28, 47, 0.28) 60%,
            rgba(74, 28, 47, 0.55) 100%
        ),
        url('https://images.pexels.com/photos/8104206/pexels-photo-8104206.jpeg?w=1800&q=80')
            center / cover no-repeat;
    transform: scale(1.04);
    animation: heroZoom 18s ease-in-out infinite alternate;
}
@keyframes heroZoom {
    from {
        transform: scale(1.04);
    }
    to {
        transform: scale(1);
    }
}

/* Corner frame lines */
.corner {
    position: absolute;
    width: 110px;
    height: 110px;
    border-color: rgba(196, 120, 143, 0.5);
    border-style: solid;
    z-index: 2;
    pointer-events: none;
}
.corner--tl {
    top: 6.5rem;
    left: 3rem;
    border-width: 1px 0 0 1px;
}
.corner--br {
    bottom: 3rem;
    right: 3rem;
    border-width: 0 1px 1px 0;
}

.hero-content {
    position: relative;
    z-index: 3;
    text-align: center;
    padding: 2rem;
    max-width: 860px;
}

.hero-eyebrow {
    display: inline-block;
    font-weight: 300;
    font-size: 0.65rem;
    letter-spacing: 0.35em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 2rem;
    opacity: 0;
    animation: fadeUp 1s 0.4s forwards;
}
.hero-quote {
    font-family: 'Tangerine', cursive;
    font-size: clamp(3rem, 7vw, 6rem);
    color: rgba(245, 232, 236, 0.9);
    line-height: 1.1;
    margin-bottom: 1.5rem;
    opacity: 0;
    animation: fadeUp 1s 0.7s forwards;
}
.hero-title {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 300;
    font-size: clamp(2.4rem, 6vw, 5rem);
    color: #fff;
    line-height: 1.15;
    margin-bottom: 2rem;
    opacity: 0;
    animation: fadeUp 1s 1s forwards;
}
.hero-title em {
    font-style: italic;
    color: rgba(196, 120, 143, 0.9);
}
.hero-sub {
    font-weight: 200;
    font-size: 1rem;
    letter-spacing: 0.1em;
    color: rgba(255, 255, 255, 0.7);
    opacity: 0;
    animation: fadeUp 1s 1.3s forwards;
}

.hero-scroll {
    position: absolute;
    bottom: 2.5rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    opacity: 0;
    animation: fadeUp 1s 2s forwards;
}
.hero-scroll span {
    font-size: 0.55rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.4);
}
.scroll-line {
    width: 1px;
    height: 50px;
    background: linear-gradient(
        to bottom,
        rgba(196, 120, 143, 0.8),
        transparent
    );
    animation: scrollPulse 2.4s ease-in-out infinite;
}
@keyframes scrollPulse {
    0%,
    100% {
        opacity: 0.4;
        transform: scaleY(1);
    }
    50% {
        opacity: 1;
        transform: scaleY(0.6);
    }
}
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(28px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ─────────────────────────────────────── */
/* SHARED UTILITIES                        */
/* ─────────────────────────────────────── */
.section-label {
    display: inline-block;
    font-size: 0.6rem;
    font-weight: 500;
    letter-spacing: 0.35em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 1.5rem;
}
.section-signature {
    font-family: 'Tangerine', cursive;
    font-size: clamp(2.8rem, 5vw, 4.5rem);
    color: var(--rose);
    display: block;
    margin-bottom: 0.5rem;
}
.section-title {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 400;
    font-size: clamp(2rem, 4vw, 3.2rem);
    color: var(--wine);
}
.section-body {
    font-weight: 200;
    font-size: 0.95rem;
    line-height: 1.9;
    color: rgba(74, 28, 47, 0.65);
    max-width: 560px;
    margin: 1.5rem auto 0;
}

/* ─────────────────────────────────────── */
/* INTRO                                   */
/* ─────────────────────────────────────── */
.intro {
    background: var(--cream);
    padding: 8rem 2rem;
    position: relative;
}
.intro::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(
        to right,
        transparent,
        var(--rose),
        transparent
    );
}
.intro-inner {
    max-width: 780px;
    margin: 0 auto;
    text-align: center;
}
.intro-inner p {
    font-family: Georgia, 'Times New Roman', serif;
    font-size: 1.05rem;
    line-height: 2;
    color: rgba(74, 28, 47, 0.78);
    margin-bottom: 1.5rem;
    text-align: left;
}
.drop-cap::first-letter {
    font-family: 'Lavishly Yours', cursive;
}

/* ─────────────────────────────────────── */
/* BESPOKE                                 */
/* ─────────────────────────────────────── */
.bespoke {
    background: var(--light);
    padding: 8rem 2rem;
}
.section-header {
    text-align: center;
    margin-bottom: 5rem;
}
.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 2rem;
    max-width: 1100px;
    margin: 0 auto;
}
.card {
    background: var(--cream);
    border: 1px solid rgba(196, 120, 143, 0.18);
    padding: 3.5rem 2.5rem;
    text-align: center;
    position: relative;
    transition:
        transform 0.4s cubic-bezier(0.23, 1, 0.32, 1),
        box-shadow 0.4s;
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 24px 60px rgba(74, 28, 47, 0.1);
}
.card-num {
    font-family: 'Tangerine', cursive;
    font-style: italic;
    font-size: 5rem;
    color: rgba(196, 120, 143, 0.12);
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    line-height: 1;
    user-select: none;
}
.card-icon {
    font-size: 2rem;
    margin-bottom: 1.5rem;
}
.card h3 {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 500;
    font-size: 1.6rem;
    color: var(--wine);
    margin-bottom: 1rem;
}
.card p {
    font-weight: 200;
    font-size: 0.88rem;
    line-height: 1.85;
    color: rgba(74, 28, 47, 0.65);
}
.bespoke-quote {
    max-width: 700px;
    margin: 5rem auto 0;
    text-align: center;
    padding: 3rem;
    border-top: 1px solid rgba(196, 120, 143, 0.2);
    border-bottom: 1px solid rgba(196, 120, 143, 0.2);
}
.bespoke-quote p {
    font-family: Georgia, 'Times New Roman', serif;
    font-style: italic;
    font-weight: 300;
    font-size: 1.3rem;
    line-height: 1.75;
    color: var(--mauve);
}

/* ─────────────────────────────────────── */
/* SAFETY                                  */
/* ─────────────────────────────────────── */
.safety {
    background: var(--dark);
    padding: 8rem 2rem;
    position: relative;
    overflow: hidden;
}
.safety::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(
            ellipse 60% 80% at 10% 50%,
            rgba(196, 120, 143, 0.07) 0%,
            transparent 60%
        ),
        radial-gradient(
            ellipse 50% 60% at 90% 30%,
            rgba(196, 120, 143, 0.05) 0%,
            transparent 60%
        );
}
.safety-inner {
    position: relative;
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: center;
}
.safety-left .section-label {
    color: var(--rose);
}
.safety-left h2 {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 300;
    font-size: clamp(2rem, 4vw, 3rem);
    color: var(--blush);
    line-height: 1.2;
    margin: 1rem 0 1.5rem;
}
.safety-left h2 em {
    font-style: italic;
    color: var(--rose);
}
.safety-left p {
    font-weight: 200;
    font-size: 0.95rem;
    line-height: 1.9;
    color: rgba(245, 232, 236, 0.65);
    margin-bottom: 2rem;
}
.ofsted-badge {
    display: inline-block;
    border: 1px solid rgba(196, 120, 143, 0.3);
    padding: 0.6rem 1.2rem;
    font-size: 0.6rem;
    font-weight: 500;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--rose);
}
.ratios-card {
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(196, 120, 143, 0.2);
    padding: 3rem;
    backdrop-filter: blur(8px);
}
.ratio-row {
    display: flex;
    align-items: baseline;
    gap: 1.5rem;
    padding: 1.25rem 0;
    border-bottom: 1px solid rgba(196, 120, 143, 0.1);
}
.ratio-row:last-child {
    border-bottom: none;
    padding-bottom: 0;
}
.ratio-age {
    font-family: 'Tangerine', cursive;
    font-style: italic;
    font-size: 2.5rem;
    color: var(--rose);
    min-width: 80px;
    line-height: 1;
}
.ratio-text {
    font-weight: 200;
    font-size: 0.9rem;
    color: rgba(245, 232, 236, 0.7);
    line-height: 1.5;
}
.ratio-text strong {
    color: #fff;
    font-weight: 400;
}

/* ─────────────────────────────────────── */
/* NANNIES                                 */
/* ─────────────────────────────────────── */
.nannies {
    background: var(--blush);
    padding: 8rem 2rem;
}
.nannies-inner {
    max-width: 1100px;
    margin: 0 auto;
}
.nannies-header {
    text-align: center;
    margin-bottom: 6rem;
}
.nannies-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
}
.nannies-left h2 {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 400;
    font-size: clamp(2rem, 4vw, 3rem);
    color: var(--wine);
    line-height: 1.2;
    margin: 1rem 0 2rem;
}
.nannies-left h2 em {
    font-style: italic;
    color: var(--mauve);
    font-weight: 300;
}
.nannies-left p {
    font-weight: 200;
    font-size: 0.95rem;
    line-height: 1.9;
    color: rgba(74, 28, 47, 0.72);
    margin-bottom: 1.2rem;
}
.pricing-box {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    background: #fff;
    border: 1px solid rgba(196, 120, 143, 0.2);
    padding: 2rem 2.5rem;
    margin-top: 1.5rem;
    box-shadow: 0 12px 40px rgba(74, 28, 47, 0.07);
}
.pricing-label {
    font-size: 0.6rem;
    font-weight: 500;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 0.5rem;
}
.pricing-value {
    font-family: 'Lavishly Yours', cursive;
    font-style: italic;
    font-weight: 300;
    font-size: 1.8rem;
    color: var(--wine);
}
.pricing-cta {
    display: block;
    margin-top: 1rem;
    font-family: 'Tangerine', cursive;
    font-size: 2.2rem;
    color: var(--rose);
    text-decoration: none;
    transition: color 0.3s;
}
.pricing-cta:hover {
    color: var(--wine);
}

.checklist-card {
    background: #fff;
    border: 1px solid rgba(196, 120, 143, 0.15);
    padding: 3rem;
    box-shadow: 0 16px 60px rgba(74, 28, 47, 0.08);
}
.checklist-card h3 {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 500;
    font-size: 1.9rem;
    color: var(--wine);
    margin-bottom: 0.5rem;
}
.checklist-divider {
    display: block;
    font-size: 0.6rem;
    font-weight: 500;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: rgba(74, 28, 47, 0.45);
    border-bottom: 1px solid rgba(196, 120, 143, 0.2);
    padding-bottom: 1.25rem;
    margin-bottom: 2rem;
}
.checklist {
    list-style: none;
    padding: 0;
    margin: 0;
}
.checklist li {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 0.85rem 0;
    border-bottom: 1px solid rgba(196, 120, 143, 0.08);
    font-weight: 200;
    font-size: 0.9rem;
    line-height: 1.7;
    color: rgba(74, 28, 47, 0.8);
}
.checklist li:last-child {
    border-bottom: none;
}
.checklist li::before {
    content: '✦';
    color: var(--rose);
    flex-shrink: 0;
    margin-top: 0.15rem;
    font-size: 0.65rem;
}
.checklist-footer {
    margin-top: 1.5rem;
    padding-top: 1.25rem;
    border-top: 1px solid rgba(196, 120, 143, 0.15);
    font-size: 0.65rem;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(74, 28, 47, 0.5);
    text-align: center;
    line-height: 1.8;
}

/* ─────────────────────────────────────── */
/* FOOTER CTA                              */
/* ─────────────────────────────────────── */
.footer-cta {
    background: var(--wine);
    padding: 7rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.footer-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(
        ellipse 70% 60% at 50% 100%,
        rgba(196, 120, 143, 0.12) 0%,
        transparent 70%
    );
    pointer-events: none;
}
.footer-cta-inner {
    position: relative;
    z-index: 1;
}
.footer-cta .section-label {
    color: var(--rose);
    margin-bottom: 2rem;
}
.footer-cta h2 {
    font-family: 'Lavishly Yours', cursive;
    font-weight: 300;
    font-size: clamp(2.2rem, 5vw, 4rem);
    color: var(--blush);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}
.footer-cta p {
    font-weight: 200;
    font-size: 0.95rem;
    color: rgba(245, 232, 236, 0.6);
    max-width: 520px;
    margin: 0 auto 3rem;
    line-height: 1.9;
}
.btn-primary {
    display: inline-block;
    border: 1px solid var(--rose);
    padding: 1rem 3rem;
    font-weight: 300;
    font-size: 0.7rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--rose);
    text-decoration: none;
    transition:
        color 0.35s,
        background 0.35s;
}
.btn-primary:hover {
    color: #fff;
    background: var(--rose);
}

/* ─────────────────────────────────────── */
/* RESPONSIVE                              */
/* ─────────────────────────────────────── */
@media (max-width: 820px) {
    .safety-inner,
    .nannies-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    .corner {
        display: none;
    }
}
</style>
