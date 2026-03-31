<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineOptions({
    layout: PublicLayout,
});
</script>

<template>
    <Head title="Bespoke Weddings | Almond-Blossoms Events" />

    <div>
        <!-- ========================================== -->
        <!-- HERO SECTION                               -->
        <!-- ========================================== -->
        <section
            class="relative flex h-[85vh] w-full flex-col items-center justify-center overflow-hidden"
        >
            <div class="absolute inset-0 h-full w-full">
                <img
                    src="https://images.unsplash.com/photo-1697630240824-d46712423b39?q=80&w=2000&auto=format&fit=crop"
                    alt="Romantic Wedding Setup"
                    class="h-full w-full object-cover object-top"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-b from-brand-dark/40 via-brand-wine/20 to-brand-dark/70"
                ></div>
            </div>

            <div
                class="fade-up relative z-10 mx-auto mt-24 max-w-4xl px-4 text-center md:mt-16"
            >
                <span
                    class="mb-6 block text-[0.65rem] font-semibold tracking-[0.3em] text-brand-light uppercase"
                    >Almond-Blossoms Events</span
                >
                <h1
                    class="mb-6 font-serif text-5xl leading-[1.1] text-white drop-shadow-2xl md:text-7xl lg:text-8xl"
                >
                    Wedding Planning <br />
                    <span class="font-light text-brand-rose italic"
                        >Services</span
                    >
                </h1>
                <p
                    class="mx-auto max-w-2xl font-serif text-2xl leading-relaxed text-brand-light/90 italic drop-shadow-md md:text-3xl"
                >
                    Relaxed Celebrations & Cherished Memories
                </p>
            </div>

            <!-- Scroll Indicator -->
            <div
                class="fade-up pointer-events-none absolute bottom-10 left-1/2 z-10 hidden -translate-x-1/2 transform flex-col items-center opacity-80 sm:flex"
            >
                <div class="h-12 w-[1px] bg-brand-rose"></div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- INTRO PHILOSOPHY                           -->
        <!-- ========================================== -->
        <section
            class="border-b border-brand-rose/20 bg-brand-blush py-24 text-center lg:py-32"
        >
            <div class="mx-auto max-w-4xl px-6">
                <!-- Delicate Icon -->
                <svg
                    class="mx-auto mb-8 h-8 w-8 text-brand-rose opacity-80"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path
                        d="M12 22c4-4 8-6 8-12A8 8 0 0 0 4 10c0 6 4 8 8 12z"
                    ></path>
                    <path d="M12 22v-7"></path>
                </svg>
                <h2
                    class="mb-8 font-serif text-3xl leading-[1.4] font-light text-brand-wine md:text-5xl"
                >
                    We appreciate the fact that no two weddings are the same,
                    and that not everyone is in need of full wedding design and
                    planning services.
                </h2>
                <p
                    class="mx-auto max-w-2xl text-lg leading-relaxed font-light text-brand-wine/70"
                >
                    We therefore delight in encouraging you to choose the exact
                    services and products that best meet your unique needs and
                    preferences.
                </p>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- TIER I: FULL DAY PLANNING & DESIGN         -->
        <!-- ========================================== -->
        <section class="relative bg-brand-blush py-24 lg:py-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="flex flex-col items-start gap-16 lg:flex-row lg:gap-24"
                >
                    <!-- Image Left -->
                    <div class="w-full lg:sticky lg:top-32 lg:w-5/12">
                        <div
                            class="img-zoom-container group aspect-[3/4] w-full overflow-hidden rounded-sm shadow-2xl"
                        >
                            <!-- Note: Ensure Unsplash links resolve, swapped one for stability -->
                            <img
                                src="https://images.unsplash.com/photo-1511895426328-dc8714191300?q=80&w=1000&auto=format&fit=crop"
                                alt="Full Day Planning"
                                class="img-zoom h-full w-full object-cover"
                            />
                        </div>
                    </div>

                    <!-- Content Right -->
                    <div class="w-full lg:w-7/12">
                        <span
                            class="mb-4 block inline-block border-b border-brand-rose/30 pb-4 text-[0.65rem] font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >The Complete Experience</span
                        >
                        <h2
                            class="mb-8 font-serif text-5xl leading-tight text-brand-wine lg:text-6xl"
                        >
                            Full Day Planning <br /><span
                                class="font-light text-brand-mauve italic"
                                >& Design</span
                            >
                        </h2>

                        <p
                            class="mb-12 text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            This is a tailor-made service to your exact
                            requirements. We work intimately with our clients,
                            guiding them gracefully through each stage of the
                            planning process—from the initial design concept
                            right up to the day itself.
                        </p>

                        <!-- Haute Couture Menu List -->
                        <h4
                            class="mb-6 font-serif text-2xl text-brand-wine italic"
                        >
                            What to expect with this service:
                        </h4>
                        <ul
                            class="mb-16 flex flex-col border-t border-brand-rose/20"
                        >
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                A personal working file with consultation at a
                                time and place convenient to you.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                An in-depth meeting to go over your plans,
                                offering a wedding analysis and developing a
                                theme and style.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Production of a comprehensive budget
                                recommendation.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Organized, regular client meetings to ensure
                                absolute peace of mind.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                General administration management, providing
                                unlimited email and telephone support to the
                                wedding party.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Sourcing, negotiation, and complete management
                                of suppliers and venues.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Devising a meticulous timeline for the day with
                                precise tasks and duties.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Ceremony and reception setup to ensure the order
                                of events flows naturally.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                On-the-day support with an experienced wedding
                                planner to seamlessly coordinate everything.
                            </li>
                        </ul>

                        <!-- Investment Block -->
                        <div
                            class="border-l-4 border-brand-rose bg-brand-light p-10 lg:p-12"
                        >
                            <span
                                class="mb-4 block text-xs font-semibold tracking-widest text-brand-rose uppercase"
                                >Investment</span
                            >
                            <p
                                class="mb-6 text-sm leading-relaxed font-light text-brand-wine/80"
                            >
                                This is determined strictly after our
                                consultation and listed fully within our bespoke
                                proposal.
                            </p>
                            <div class="mb-8 flex items-end gap-4">
                                <span
                                    class="font-serif text-6xl leading-none text-brand-wine italic lg:text-7xl"
                                    >£4,000</span
                                >
                                <div class="flex flex-col pb-2">
                                    <span
                                        class="text-[0.65rem] font-semibold tracking-widest text-brand-rose uppercase"
                                        >Minimum Fee</span
                                    >
                                    <span
                                        class="text-xs font-light text-brand-wine/70"
                                        >Or 10% - 15% of your budget</span
                                    >
                                </div>
                            </div>
                            <Link
                                href="/contact"
                                class="inline-block rounded-sm bg-brand-wine px-10 py-4 text-xs font-semibold tracking-widest text-brand-blush uppercase shadow-xl transition-all hover:bg-brand-rose hover:text-white"
                            >
                                Schedule a Consultation Call
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- TIER II: FINAL THREE MONTHS                -->
        <!-- ========================================== -->
        <section class="relative bg-brand-light py-24 lg:py-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="flex flex-col-reverse items-start gap-16 lg:flex-row lg:gap-24"
                >
                    <!-- Content Left -->
                    <div class="w-full lg:w-7/12">
                        <span
                            class="mb-4 block w-max border-b border-brand-rose/30 pb-4 text-[0.65rem] font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >The Seamless Handoff</span
                        >
                        <h2
                            class="mb-8 font-serif text-5xl leading-tight text-brand-wine lg:text-6xl"
                        >
                            Final Three Months <br /><span
                                class="font-light text-brand-mauve italic"
                                >Co-ordination</span
                            >
                        </h2>

                        <p
                            class="mb-12 text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            We completely understand the stress that comes from
                            planning and trying to finalize details without
                            errors. This service is exclusively for couples who
                            need time to relax and simply enjoy a stress-free
                            countdown to the big day.
                        </p>

                        <h4
                            class="mb-6 font-serif text-2xl text-brand-wine italic"
                        >
                            What to expect with this service:
                        </h4>
                        <ul
                            class="mb-16 flex flex-col border-t border-brand-rose/20"
                        >
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                A comprehensive venue visit and consultation to
                                walk through every single detail of the wedding.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                An in-depth meeting to go over your existing
                                plans, offering a professional wedding analysis.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                General administration management providing
                                unlimited email and telephone support.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Written confirmation to all suppliers detailing
                                specific instructions and directions.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Expert recommendations on any suppliers not yet
                                booked.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Devising a flawless wedding day timeline
                                detailing all tasks and duties.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Providing an experienced wedding planner to
                                coordinate everything on the day.
                            </li>
                        </ul>

                        <!-- Investment Block -->
                        <div
                            class="border-l-4 border-brand-rose bg-brand-blush p-10 shadow-md lg:p-12"
                        >
                            <span
                                class="mb-4 block text-xs font-semibold tracking-widest text-brand-rose uppercase"
                                >Investment</span
                            >
                            <div class="mb-6 flex items-end gap-4">
                                <span
                                    class="mb-3 text-sm font-light tracking-widest text-brand-wine/70 uppercase"
                                    >From</span
                                >
                                <span
                                    class="font-serif text-6xl leading-none text-brand-wine italic lg:text-7xl"
                                    >£2,000</span
                                >
                            </div>
                            <p
                                class="mb-8 text-xs font-light tracking-widest text-brand-wine/70 uppercase"
                            >
                                Depending on size, complexity, and location
                            </p>

                            <Link
                                href="/contact"
                                class="inline-block rounded-sm border border-brand-wine bg-transparent px-10 py-4 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-all hover:bg-brand-wine hover:text-white"
                            >
                                Find out more
                            </Link>
                        </div>
                    </div>

                    <!-- Image Right -->
                    <div class="w-full lg:sticky lg:top-32 lg:w-5/12">
                        <div
                            class="img-zoom-container group aspect-[3/4] w-full overflow-hidden rounded-sm shadow-2xl"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=1000&auto=format&fit=crop"
                                alt="Three Months Coordination"
                                class="img-zoom h-full w-full object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- TIER III: ON THE DAY MANAGEMENT            -->
        <!-- ========================================== -->
        <section class="relative bg-brand-blush py-24 lg:py-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="flex flex-col items-start gap-16 lg:flex-row lg:gap-24"
                >
                    <!-- Image Left -->
                    <div class="w-full lg:sticky lg:top-32 lg:w-5/12">
                        <div
                            class="img-zoom-container group aspect-[3/4] w-full overflow-hidden rounded-sm shadow-2xl"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1000&auto=format&fit=crop"
                                alt="On The Day Management"
                                class="img-zoom h-full w-full object-cover"
                            />
                        </div>
                    </div>

                    <!-- Content Right -->
                    <div class="w-full lg:w-7/12">
                        <span
                            class="mb-4 block inline-block border-b border-brand-rose/30 pb-4 text-[0.65rem] font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >The Perfect Execution</span
                        >
                        <h2
                            class="mb-8 font-serif text-5xl leading-tight text-brand-wine lg:text-6xl"
                        >
                            On The Day <br /><span
                                class="font-light text-brand-mauve italic"
                                >Management</span
                            >
                        </h2>

                        <p
                            class="mb-12 text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            For couples marrying in a short time frame, or those
                            balancing busy schedules and commitments. We offer
                            professional behind-the-scenes support and
                            management to make the day run smoothly and entirely
                            according to your plan.
                        </p>

                        <h4
                            class="mb-6 font-serif text-2xl text-brand-wine italic"
                        >
                            What to expect with this service:
                        </h4>
                        <ul
                            class="mb-16 flex flex-col border-t border-brand-rose/20"
                        >
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Complete management of all suppliers and vendors
                                on the day.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                A preliminary site visit and consultations to
                                walk through all the wedding details.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                The creation of a flawless wedding timeline for
                                seamless day management.
                            </li>
                            <li
                                class="menu-list-item border-b border-brand-rose/20 py-4 text-sm font-light text-brand-wine/75"
                            >
                                Full ceremony and reception setup to ensure
                                aesthetic perfection.
                            </li>
                        </ul>

                        <!-- Investment Block -->
                        <div
                            class="border-l-4 border-brand-rose bg-brand-light p-10 shadow-md lg:p-12"
                        >
                            <span
                                class="mb-4 block text-xs font-semibold tracking-widest text-brand-rose uppercase"
                                >Investment</span
                            >
                            <div class="mb-6 flex items-end gap-4">
                                <span
                                    class="mb-3 text-sm font-light tracking-widest text-brand-wine/70 uppercase"
                                    >From</span
                                >
                                <span
                                    class="font-serif text-6xl leading-none text-brand-wine italic lg:text-7xl"
                                    >£1,000</span
                                >
                            </div>
                            <p
                                class="mb-8 max-w-sm text-xs leading-relaxed font-light tracking-widest text-brand-wine/70 uppercase"
                            >
                                This service is dependent on the level of
                                support and the logistics of the wedding.
                            </p>

                            <Link
                                href="/contact"
                                class="inline-block rounded-sm bg-brand-wine px-10 py-4 text-xs font-semibold tracking-widest text-brand-blush uppercase shadow-xl transition-all hover:bg-brand-rose hover:text-white"
                            >
                                Check Availability
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
