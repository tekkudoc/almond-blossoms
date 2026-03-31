<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
</script>

<template>
    <Head title="Home | Almond-Blossoms Events" />

    <PublicLayout>
        <!-- HERO SECTION -->
        <section
            class="relative flex h-screen w-full items-center justify-center overflow-hidden"
        >
            <div class="absolute inset-0 h-full w-full">
                <!-- Unsplash Fine Art Placeholder -->
                <img
                    src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format&fit=crop"
                    alt="Luxurious Wedding Reception Details"
                    class="h-full w-full object-cover object-center"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-b from-brand-dark/60 via-brand-wine/30 to-brand-dark/80"
                ></div>
            </div>

            <!-- Hero Content -->
            <div
                class="fade-up relative z-10 mx-auto mt-16 max-w-5xl px-4 text-center"
            >
                <span
                    class="mb-5 block text-sm font-medium tracking-[0.25em] text-brand-light uppercase"
                    >Essex & Across U.K.</span
                >

                <h1
                    class="mb-6 font-serif text-5xl leading-[1.1] text-white drop-shadow-lg md:text-7xl lg:text-8xl"
                >
                    Authentic
                    <span class="font-light text-brand-rose italic">&</span>
                    Sensational<br />Weddings
                </h1>

                <p
                    class="mx-auto mb-12 max-w-2xl text-lg leading-relaxed font-light text-brand-light/90 drop-shadow-md md:text-xl"
                >
                    We design and plan uniquely exquisite days for busy
                    professionals, ensuring a stress-free journey filled with
                    memories to cherish.
                </p>

                <Link
                    href="/services"
                    class="inline-block rounded-sm border border-brand-wine bg-brand-wine/80 px-10 py-4 text-sm font-semibold tracking-[0.15em] text-white uppercase shadow-xl backdrop-blur-md transition-all duration-600 hover:-translate-y-1 hover:border-brand-blush hover:bg-brand-blush hover:text-brand-wine hover:shadow-2xl"
                >
                    Discover Our Services
                </Link>
            </div>

            <!-- Scroll Indicator -->
            <div
                class="fade-up absolute bottom-10 left-1/2 z-10 hidden -translate-x-1/2 transform flex-col items-center opacity-60 sm:flex"
            >
                <span
                    class="mb-2 text-[0.65rem] tracking-[0.3em] text-white uppercase"
                    >Scroll</span
                >
                <div
                    class="h-12 w-[1px] bg-gradient-to-b from-brand-rose to-transparent"
                ></div>
            </div>
        </section>

        <!-- REDESIGNED STEP 2: OUR PHILOSOPHY -->
        <section class="relative bg-brand-blush py-24 lg:py-40">
            <div class="mx-auto max-w-6xl px-6 lg:px-12">
                <!-- Center Poetic Intro -->
                <div class="mx-auto mb-16 max-w-4xl text-center">
                    <svg
                        class="mx-auto mb-6 h-8 w-8 text-brand-rose opacity-80"
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

                    <span
                        class="text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >Our Philosophy</span
                    >
                    <h2
                        class="mt-6 font-serif text-4xl leading-tight text-brand-wine drop-shadow-sm md:text-5xl lg:text-6xl"
                    >
                        Every event has a
                        <span class="font-light text-brand-mauve italic"
                            >love story</span
                        >
                        <br />that needs to be celebrated.
                    </h2>
                </div>

                <!-- Editorial Columns Text -->
                <div
                    class="mb-20 gap-16 text-justify leading-relaxed font-light text-brand-wine/80 md:columns-2"
                >
                    <p class="mb-6 md:mb-0">
                        <span
                            class="float-left mt-1 mr-3 font-serif text-5xl leading-none text-brand-rose italic"
                            >Y</span
                        >our wedding day is one of the most memorable events in
                        your journey through life, an occasion celebrated by
                        all. From our very first meeting, we will help you build
                        a clear, breathtaking vision of your event, seamlessly
                        working towards your desired outcome. Every couple is
                        beautifully unique, and we believe your celebration
                        should reflect exactly that.
                    </p>
                    <p>
                        We specialize solely in organizing, planning,
                        coordinating, and designing flawless events. We approach
                        your day with sheer sophistication, offering
                        personalized services tailored to your preference. Our
                        goal is to provide a calm, relaxed experience—taking the
                        pressure off you so you can be fully present while we
                        craft an unforgettable memory.
                    </p>
                </div>

                <!-- Cinematic Landscape Gallery -->
                <div
                    class="img-zoom-container group relative aspect-[21/9] w-full overflow-hidden rounded-sm bg-brand-light shadow-xl md:aspect-[24/9]"
                >
                    <img
                        src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=2000&auto=format&fit=crop"
                        alt="Breathtaking Wedding Scene"
                        class="img-zoom h-full w-full object-cover"
                    />

                    <!-- Floating Signature Box -->
                    <div
                        class="absolute right-0 bottom-0 flex max-w-xs translate-y-2 transform flex-col items-center bg-brand-blush/90 p-6 text-center backdrop-blur-md transition-transform duration-1000 group-hover:translate-y-0 md:right-8 md:bottom-8 lg:p-8"
                    >
                        <p
                            class="mb-2 text-[0.65rem] font-semibold tracking-[0.25em] text-brand-wine uppercase"
                        >
                            Founder & Lead Planner
                        </p>

                        <!-- CSS-based Signature -->
                        <div
                            class="my-2 -rotate-2 font-signature text-5xl leading-none text-brand-rose/90"
                        >
                            Judith
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- THE SERVICES (Interactive Accordion Overlay) -->
        <section class="border-y border-brand-rose/10 bg-brand-light py-24">
            <!-- Section Header -->
            <div class="mb-16 px-6 text-center">
                <span
                    class="text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                    >Bespoke Planning</span
                >
                <h2
                    class="mt-4 font-serif text-4xl text-brand-wine lg:text-5xl"
                >
                    Curated Services
                </h2>
                <p class="mx-auto mt-6 max-w-xl font-light text-brand-wine/70">
                    Tailor-made services granting you the flexibility to choose
                    the exact level of support your special day requires.
                </p>
            </div>

            <!-- The Immersive Accordion Container -->
            <div
                class="mx-auto flex h-[800px] w-full max-w-[100rem] flex-col gap-2 px-2 md:flex-row md:gap-1 md:px-4"
            >
                <!-- Service 1: Wedding Planning -->
                <Link
                    href="/wedding"
                    class="group relative flex-1 overflow-hidden rounded-sm bg-brand-dark transition-all duration-[800ms] ease-in-out hover:w-[50%] md:w-1/3 md:flex-none md:rounded-none"
                >
                    <img
                        src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop"
                        alt="Wedding Planning"
                        class="absolute inset-0 h-full w-full scale-100 object-cover opacity-60 transition-opacity duration-[800ms] group-hover:scale-105 group-hover:opacity-80"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-wine/40 to-transparent opacity-80 transition-opacity duration-700 group-hover:opacity-90"
                    ></div>

                    <!-- Content Positioning -->
                    <div
                        class="absolute inset-0 flex flex-col justify-end p-8 md:p-12"
                    >
                        <span
                            class="mb-4 font-serif text-4xl text-brand-mauve italic opacity-50 transition-all duration-700 group-hover:-translate-y-2 group-hover:opacity-100 md:text-5xl"
                            >01.</span
                        >
                        <h3
                            class="mb-4 transform font-serif text-3xl whitespace-nowrap text-brand-blush transition-transform duration-700 group-hover:-translate-y-2 md:text-4xl"
                        >
                            Wedding Planning
                        </h3>

                        <div
                            class="transition-[grid-template-rows] duration-700 ease-in-out group-hover:grid-rows-[1fr] md:grid md:grid-rows-[0fr]"
                        >
                            <div class="overflow-hidden">
                                <p
                                    class="mb-6 max-w-sm text-sm leading-relaxed font-light text-brand-light/80 opacity-100 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:text-base md:opacity-0"
                                >
                                    From full conceptual planning to on-the-day
                                    management, crafting your epic celebration
                                    from start to finish so you can live in the
                                    moment.
                                </p>
                                <span
                                    class="inline-flex items-center gap-3 text-xs tracking-widest text-brand-light uppercase opacity-100 transition-opacity delay-200 duration-700 group-hover:opacity-100 md:opacity-0"
                                >
                                    Discover
                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                                        ></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </Link>

                <!-- Service 2: Luxury Events -->
                <Link
                    href="/celebrations"
                    class="group relative flex-1 overflow-hidden rounded-sm bg-brand-dark transition-all duration-[800ms] ease-in-out hover:w-[50%] md:w-1/3 md:flex-none md:rounded-none"
                >
                    <img
                        src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?q=80&w=1200&auto=format&fit=crop"
                        alt="Luxury Events"
                        class="absolute inset-0 h-full w-full scale-100 object-cover opacity-60 transition-opacity duration-[800ms] group-hover:scale-105 group-hover:opacity-80"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-wine/40 to-transparent opacity-80 transition-opacity duration-700 group-hover:opacity-90"
                    ></div>

                    <div
                        class="absolute inset-0 flex flex-col justify-end p-8 md:p-12"
                    >
                        <span
                            class="mb-4 font-serif text-4xl text-brand-mauve italic opacity-50 transition-all duration-700 group-hover:-translate-y-2 group-hover:opacity-100 md:text-5xl"
                            >02.</span
                        >
                        <h3
                            class="mb-4 transform font-serif text-3xl whitespace-nowrap text-brand-blush transition-transform duration-700 group-hover:-translate-y-2 md:text-4xl"
                        >
                            Luxury Events
                        </h3>

                        <div
                            class="transition-[grid-template-rows] duration-700 ease-in-out group-hover:grid-rows-[1fr] md:grid md:grid-rows-[0fr]"
                        >
                            <div class="overflow-hidden">
                                <p
                                    class="mb-6 max-w-sm text-sm leading-relaxed font-light text-brand-light/80 opacity-100 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:text-base md:opacity-0"
                                >
                                    Designing spectacular and flawless private
                                    parties and events that leave a lasting,
                                    sensational impression on your guests.
                                </p>
                                <span
                                    class="inline-flex items-center gap-3 text-xs tracking-widest text-brand-light uppercase opacity-100 transition-opacity delay-200 duration-700 group-hover:opacity-100 md:opacity-0"
                                >
                                    Discover
                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                                        ></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </Link>

                <!-- Service 3: Events Creche -->
                <Link
                    href="/services"
                    class="group relative flex-1 overflow-hidden rounded-sm bg-brand-dark transition-all duration-[800ms] ease-in-out hover:w-[50%] md:w-1/3 md:flex-none md:rounded-none"
                >
                    <img
                        src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=1200&auto=format&fit=crop"
                        alt="Events Creche"
                        class="absolute inset-0 h-full w-full scale-100 object-cover opacity-60 transition-opacity duration-[800ms] group-hover:scale-105 group-hover:opacity-80"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-wine/40 to-transparent opacity-80 transition-opacity duration-700 group-hover:opacity-90"
                    ></div>

                    <div
                        class="absolute inset-0 flex flex-col justify-end p-8 md:p-12"
                    >
                        <span
                            class="mb-4 font-serif text-4xl text-brand-mauve italic opacity-50 transition-all duration-700 group-hover:-translate-y-2 group-hover:opacity-100 md:text-5xl"
                            >03.</span
                        >
                        <h3
                            class="mb-4 transform font-serif text-3xl whitespace-nowrap text-brand-blush transition-transform duration-700 group-hover:-translate-y-2 md:text-4xl"
                        >
                            Events Creche
                        </h3>

                        <div
                            class="transition-[grid-template-rows] duration-700 ease-in-out group-hover:grid-rows-[1fr] md:grid md:grid-rows-[0fr]"
                        >
                            <div class="overflow-hidden">
                                <p
                                    class="mb-6 max-w-sm text-sm leading-relaxed font-light text-brand-light/80 opacity-100 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:text-base md:opacity-0"
                                >
                                    Dedicated, high-quality childcare ensuring
                                    your youngest guests are entertained safely,
                                    giving parents the ultimate gift:
                                    relaxation.
                                </p>
                                <span
                                    class="inline-flex items-center gap-3 text-xs tracking-widest text-brand-light uppercase opacity-100 transition-opacity delay-200 duration-700 group-hover:opacity-100 md:opacity-0"
                                >
                                    Discover
                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                                        ></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
        </section>

        <!-- QUOTE BREAK -->
        <section
            class="relative flex flex-col items-center justify-center overflow-hidden bg-brand-wine px-6 py-32 text-center lg:py-48"
        >
            <div
                class="pointer-events-none absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"
            ></div>

            <div
                class="relative z-10 mx-auto flex max-w-5xl flex-col items-center"
            >
                <svg
                    class="mb-10 h-10 w-10 text-brand-rose opacity-70"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M12 2L2 22h20L12 2z"></path>
                    <path d="M12 22V12"></path>
                </svg>

                <h2
                    class="mb-10 font-serif text-4xl leading-[1.2] font-light text-brand-light italic md:text-5xl lg:text-7xl"
                >
                    "We want someone to walk in the room & say...
                    <br class="hidden md:block" />
                    <span class="font-medium text-brand-rose"
                        >Just Sensational.</span
                    >"
                </h2>

                <p
                    class="font-sans text-xs font-semibold tracking-[0.25em] text-brand-rose/60 uppercase"
                >
                    — The Almond-Blossoms Promise
                </p>
            </div>
        </section>

        <!-- "As Featured In" Trust Bar -->
        <section class="border-b border-brand-rose/20 bg-brand-blush py-16">
            <div class="mx-auto flex max-w-6xl flex-col items-center px-6">
                <p
                    class="mb-10 text-center text-xs font-semibold tracking-[0.25em] text-brand-mauve uppercase"
                >
                    As Featured In
                </p>

                <div
                    class="flex flex-wrap items-center justify-center gap-12 opacity-60 grayscale transition-all duration-700 hover:grayscale-0 md:gap-24"
                >
                    <h3
                        class="font-serif text-2xl text-brand-wine italic lg:text-3xl"
                    >
                        Wedding Suppliers
                    </h3>
                    <h3
                        class="font-serif text-2xl tracking-widest text-brand-wine uppercase lg:text-3xl"
                    >
                        Hitched
                    </h3>
                    <h3
                        class="font-serif text-2xl tracking-widest text-brand-wine italic lg:text-3xl"
                    >
                        BRIDES
                    </h3>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
