<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Services | Almond-Blossoms Events" />

    <div>
        <section
            class="fade-up relative mt-24 flex h-[75vh] flex-col items-center justify-center px-6 text-center"
        >
            <div
                class="pointer-events-none absolute top-1/2 left-1/2 -z-10 -translate-x-1/2 -translate-y-1/2 transform font-serif text-[20vw] leading-none text-brand-rose/5 italic select-none"
            >
                Services
            </div>

            <span
                class="mb-8 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
            >
                Curated Offerings
            </span>

            <h1
                class="mx-auto mb-8 max-w-5xl font-serif text-5xl leading-[1.1] text-brand-wine md:text-7xl lg:text-8xl"
            >
                Just The Two Of Us <br />
                <span class="font-light text-brand-mauve italic"
                    >& Our Loved Ones</span
                >
            </h1>

            <p
                class="mx-auto max-w-2xl font-sans text-lg leading-relaxed font-light text-brand-wine/70"
            >
                We appreciate the fact that no two weddings are the same and
                that not everyone needs full wedding design and planning
                services. We therefore delight in encouraging you to choose
                services and products that best meet your needs and preferences.
            </p>

            <div
                class="absolute bottom-10 flex hidden animate-bounce flex-col items-center md:flex"
            >
                <span
                    class="mb-2 text-[0.65rem] tracking-widest text-brand-mauve uppercase"
                    >Scroll to Discover</span
                >
                <div class="h-10 w-px bg-brand-rose"></div>
            </div>
        </section>

        <!-- THE CINEMATIC STACK (Directory) -->
        <div class="relative w-full">
            <!-- 01. WEDDINGS -->
            <section
                class="relative z-10 flex h-auto w-full flex-col items-center justify-center overflow-hidden bg-brand-light shadow-[0_-10px_40px_rgba(0,0,0,0.05)] md:sticky md:top-0 md:h-[100svh] md:flex-row"
            >
                <div
                    class="relative flex h-auto w-full flex-col justify-center p-12 md:h-full md:w-1/2 lg:p-24"
                >
                    <span
                        class="pointer-events-none absolute top-20 left-12 font-serif text-[12rem] leading-none text-brand-rose/10 italic select-none lg:left-24"
                        >01</span
                    >
                    <div class="relative z-10">
                        <span
                            class="mb-6 block w-max border-b border-brand-rose/30 pb-2 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >Bespoke Planning</span
                        >
                        <h2
                            class="mb-8 font-serif text-6xl leading-none text-brand-wine lg:text-7xl"
                        >
                            Weddings.
                        </h2>
                        <Link
                            href="/wedding"
                            class="group mt-4 inline-flex items-center gap-4 text-xs tracking-widest text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >
                            <span>About Weddings</span>
                            <div
                                class="h-[1px] w-12 bg-brand-wine transition-all duration-400 group-hover:w-16 group-hover:bg-brand-rose"
                            ></div>
                        </Link>
                    </div>
                </div>
                <div
                    class="group h-[50vh] w-full overflow-hidden md:h-full md:w-1/2"
                >
                    <img
                        src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200"
                        class="img-zoom h-full w-full object-cover"
                        alt="Bespoke Weddings"
                    />
                </div>
            </section>

            <!-- 02. CELEBRATIONS -->
            <section
                class="relative z-20 flex h-auto w-full flex-col items-center justify-center overflow-hidden bg-brand-wine text-brand-light shadow-[0_-20px_50px_rgba(0,0,0,0.3)] md:sticky md:top-0 md:h-[100svh] md:flex-row-reverse"
            >
                <div
                    class="relative flex h-auto w-full flex-col justify-center p-12 md:h-full md:w-1/2 lg:p-24"
                >
                    <span
                        class="pointer-events-none absolute top-20 right-12 font-serif text-[12rem] leading-none text-brand-rose/5 italic select-none lg:right-24"
                        >02</span
                    >
                    <div
                        class="relative z-10 flex flex-col md:ml-auto md:items-end md:text-right"
                    >
                        <span
                            class="mb-6 block w-max border-b border-brand-rose/30 pb-2 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >Exclusive Soirées</span
                        >
                        <h2
                            class="mb-8 font-serif text-6xl leading-none text-brand-blush lg:text-7xl"
                        >
                            Celebrations.
                        </h2>
                        <Link
                            href="/celebrations"
                            class="group mt-4 inline-flex flex-row-reverse items-center gap-4 text-xs tracking-widest text-brand-blush uppercase transition-colors hover:text-brand-rose md:flex-row"
                        >
                            <span>About Events</span>
                            <div
                                class="h-[1px] w-12 bg-brand-blush transition-all duration-400 group-hover:w-16 group-hover:bg-brand-rose"
                            ></div>
                        </Link>
                    </div>
                </div>
                <div
                    class="group relative h-[50vh] w-full overflow-hidden md:h-full md:w-1/2"
                >
                    <div
                        class="absolute inset-0 z-10 bg-brand-dark/20 transition-colors duration-1000 group-hover:bg-transparent"
                    ></div>
                    <img
                        src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?q=80&w=1200"
                        class="img-zoom h-full w-full object-cover"
                        alt="Luxury Events"
                    />
                </div>
            </section>

            <!-- 03. CRECHE -->
            <section
                class="relative z-30 flex h-auto w-full flex-col items-center justify-center overflow-hidden bg-brand-blush shadow-[0_-20px_50px_rgba(0,0,0,0.15)] md:sticky md:top-0 md:h-[100svh] md:flex-row"
            >
                <div
                    class="relative flex h-auto w-full flex-col justify-center p-12 md:h-full md:w-1/2 lg:p-24"
                >
                    <span
                        class="pointer-events-none absolute top-20 left-12 font-serif text-[12rem] leading-none text-brand-rose/10 italic select-none lg:left-24"
                        >03</span
                    >
                    <div class="relative z-10">
                        <span
                            class="mb-6 block w-max border-b border-brand-rose/30 pb-2 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >Dedicated Childcare</span
                        >
                        <h2
                            class="mb-8 font-serif text-6xl leading-none text-brand-wine lg:text-7xl"
                        >
                            Event Creche.
                        </h2>
                        <Link
                            href="/creche"
                            class="group mt-4 inline-flex items-center gap-4 text-xs tracking-widest text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >
                            <span>About Creche</span>
                            <div
                                class="h-[1px] w-12 bg-brand-wine transition-all duration-400 group-hover:w-16 group-hover:bg-brand-rose"
                            ></div>
                        </Link>
                    </div>
                </div>
                <div
                    class="group h-[50vh] w-full overflow-hidden md:h-full md:w-1/2"
                >
                    <img
                        src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=1200"
                        class="img-zoom h-full w-full object-cover"
                        alt="Events Creche"
                    />
                </div>
            </section>

            <!-- MISSION STATEMENT -->
            <section
                class="relative z-40 overflow-hidden bg-brand-dark px-6 py-32 text-center shadow-[0_-30px_60px_rgba(0,0,0,0.5)] lg:py-48"
            >
                <div class="pointer-events-none absolute inset-0 opacity-10">
                    <img
                        src="https://images.unsplash.com/photo-1518049362265-d5b2a6467637?q=80&w=2000&auto=format&fit=crop"
                        class="h-full w-full object-cover"
                        alt="texture"
                    />
                </div>
                <div class="relative z-10 mx-auto max-w-5xl">
                    <h2
                        class="mb-12 font-serif text-4xl leading-[1.3] font-light text-brand-blush italic md:text-5xl lg:text-6xl"
                    >
                        "Our goal is to help couples who see value in having an
                        intimate wedding, leave the stress of planning behind
                        and experience the
                        <span class="font-medium text-brand-rose"
                            >joy of a wedding</span
                        >
                        with their nearest and dearest."
                    </h2>
                </div>
            </section>

            <!-- HOW IT WORKS (NEW SECTION) -->
            <section class="relative z-40 bg-brand-light py-24 lg:py-40">
                <div class="mx-auto max-w-5xl px-6 text-center lg:px-12">
                    <span
                        class="mb-2 block font-signature text-5xl text-brand-rose"
                        >How it works</span
                    >
                    <h2
                        class="mb-8 font-serif text-4xl leading-tight text-brand-wine lg:text-5xl"
                    >
                        At Almond Blossoms, we focus in creating thoughtful
                        personalised design that is curated to reflect
                        individual unique style and vision.
                    </h2>
                    <p
                        class="mx-auto mb-24 max-w-3xl font-sans text-lg font-light text-brand-wine/70"
                    >
                        Our work is refined favouring quiet elegance over excess
                        without following trends.
                    </p>

                    <!-- The Vertical Timeline -->
                    <div class="relative space-y-24 text-left">
                        <!-- Timeline Line Background -->
                        <div
                            class="absolute top-0 bottom-0 left-[23px] hidden w-px bg-brand-rose/30 md:left-1/2 md:block"
                        ></div>

                        <!-- STEP 1 -->
                        <div
                            class="group relative flex flex-col items-center justify-between gap-8 md:flex-row md:gap-16"
                        >
                            <div class="z-10 w-full md:w-1/2 md:text-right">
                                <span
                                    class="mb-2 block font-signature text-4xl text-brand-rose"
                                    >Step One</span
                                >
                                <h3
                                    class="mb-4 font-serif text-3xl text-brand-wine"
                                >
                                    Enquire & Consultation
                                </h3>
                                <p
                                    class="font-sans leading-relaxed font-light text-brand-wine/70"
                                >
                                    We learn about your vision and event needs.
                                    Start by getting in touch with us via the
                                    contact form to share your event details. We
                                    will arrange a consultation through phone or
                                    video call to get to know you and understand
                                    your vision, requirements, and how we can
                                    best support you and create a quotation
                                    based on your needs.
                                </p>
                            </div>
                            <div
                                class="absolute left-0 z-20 flex hidden h-12 w-12 items-center justify-center rounded-full border-[3px] border-brand-rose bg-brand-blush font-serif text-xl text-brand-wine shadow-lg transition-colors duration-500 group-hover:bg-brand-rose group-hover:text-white md:left-1/2 md:-ml-6 md:flex"
                            >
                                1
                            </div>
                            <div class="w-full md:w-1/2"></div>
                        </div>

                        <!-- STEP 2 -->
                        <div
                            class="group relative flex flex-col items-center justify-between gap-8 md:flex-row-reverse md:gap-16"
                        >
                            <div class="z-10 w-full text-left md:w-1/2">
                                <span
                                    class="mb-2 block font-signature text-4xl text-brand-rose"
                                    >Step Two</span
                                >
                                <h3
                                    class="mb-4 font-serif text-3xl text-brand-wine"
                                >
                                    Plan & Coordinate
                                </h3>
                                <p
                                    class="font-sans leading-relaxed font-light text-brand-wine/70"
                                >
                                    We organise every detail with precision.
                                    When you agree to our services and your
                                    deposit is received, we start working on the
                                    proposal and create a concept working
                                    alongside the best vendors and venues that
                                    suite your needs. We handle timelines,
                                    supplier communication, and key
                                    logistics—ensuring every detail is organised
                                    and aligned with your vision.
                                </p>
                            </div>
                            <div
                                class="absolute left-0 z-20 flex hidden h-12 w-12 items-center justify-center rounded-full border-[3px] border-brand-rose bg-brand-blush font-serif text-xl text-brand-wine shadow-lg transition-colors duration-500 group-hover:bg-brand-rose group-hover:text-white md:left-1/2 md:-ml-6 md:flex"
                            >
                                2
                            </div>
                            <div class="w-full md:w-1/2"></div>
                        </div>

                        <!-- STEP 3 -->
                        <div
                            class="group relative flex flex-col items-center justify-between gap-8 md:flex-row md:gap-16"
                        >
                            <div class="z-10 w-full md:w-1/2 md:text-right">
                                <span
                                    class="mb-2 block font-signature text-4xl text-brand-rose"
                                    >Step Three</span
                                >
                                <h3
                                    class="mb-4 font-serif text-3xl text-brand-wine"
                                >
                                    Deliver Seamlessly
                                </h3>
                                <p
                                    class="mb-6 font-sans leading-relaxed font-light text-brand-wine/70"
                                >
                                    You enjoy your event while we manage
                                    everything behind the scenes. On the day, we
                                    manage everything from start to finish—so
                                    you can relax and enjoy your event while we
                                    ensure everything runs smoothly with
                                    optional childcare services ensuring all
                                    guests are cared for and comfortable.
                                </p>
                                <Link
                                    href="/contact"
                                    class="font-signature text-3xl text-brand-rose transition-colors hover:text-brand-wine"
                                    >( Say Hello )</Link
                                >
                            </div>
                            <div
                                class="absolute left-0 z-20 flex hidden h-12 w-12 items-center justify-center rounded-full border-[3px] border-brand-rose bg-brand-blush font-serif text-xl text-brand-wine shadow-lg transition-colors duration-500 group-hover:bg-brand-rose group-hover:text-white md:left-1/2 md:-ml-6 md:flex"
                            >
                                3
                            </div>
                            <div class="w-full md:w-1/2"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
