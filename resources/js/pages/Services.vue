<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

// 1. This handles the layout perfectly!
defineOptions({
    layout: PublicLayout,
});
</script>

<template>
    <Head title="Services | Almond-Blossoms Events" />

    <!-- 2. NO <PublicLayout> tags here! Just a standard div or section -->
    <div>
        <!-- HERO SECTION -->
        <section
            class="fade-up relative mt-24 flex h-[75vh] flex-col items-center justify-center px-6 text-center"
        >
            <!-- Subtle Watermark -->
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
                class="mx-auto max-w-2xl text-lg leading-relaxed font-light text-brand-wine/70"
            >
                We appreciate that no two weddings are the same. Not everyone is
                in need of full design. We delight in encouraging you to choose
                the exact level of support that meets your unique vision.
            </p>

            <!-- Scroll prompt -->
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

        <!-- THE CINEMATIC STACK -->
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
                        <p
                            class="mb-10 max-w-md text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            Our signature planning service. We handle the
                            logistics, aesthetics, and endless details from
                            start to finish, so you can simply live in the
                            moment.
                        </p>
                        <Link
                            href="/wedding"
                            class="group inline-flex items-center gap-4 text-xs tracking-widest text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >
                            <span>Explore Weddings</span>
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
                        <p
                            class="mb-10 max-w-md text-lg leading-relaxed font-light text-brand-light/80"
                        >
                            From milestone birthdays to intimate private
                            dinners. We design spectacular and flawless events
                            that leave a sensational impression on your guests.
                        </p>
                        <Link
                            href="/celebrations"
                            class="group inline-flex flex-row-reverse items-center gap-4 text-xs tracking-widest text-brand-blush uppercase transition-colors hover:text-brand-rose md:flex-row"
                        >
                            <span>Explore Events</span>
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
                        <p
                            class="mb-10 max-w-md text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            Professional, high-quality childcare ensuring your
                            youngest guests are entertained safely and
                            joyfully—giving parents the ultimate gift: peace of
                            mind.
                        </p>
                        <Link
                            href="/contact"
                            class="group inline-flex items-center gap-4 text-xs tracking-widest text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >
                            <span>Explore Creche</span>
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
                        "Our mission is to help couples leave the stress of
                        planning behind and experience the
                        <span class="font-medium text-brand-rose"
                            >true joy</span
                        >
                        of a wedding with their nearest and dearest."
                    </h2>
                    <div class="flex flex-col items-center">
                        <div
                            class="mb-2 -rotate-2 font-signature text-6xl leading-none text-brand-rose/90"
                        >
                            Judith
                        </div>
                        <p
                            class="mt-2 text-[0.65rem] font-semibold tracking-[0.25em] text-brand-rose/60 uppercase"
                        >
                            The Almond-Blossoms Promise
                        </p>
                    </div>
                </div>
            </section>

            <!-- AS SEEN IN -->
            <section
                class="relative z-40 border-b border-brand-rose/20 bg-brand-blush py-16"
            >
                <div class="mx-auto flex max-w-6xl flex-col items-center px-6">
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
                            class="font-serif text-2xl tracking-tighter text-brand-wine italic lg:text-3xl"
                        >
                            BRIDES
                        </h3>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
