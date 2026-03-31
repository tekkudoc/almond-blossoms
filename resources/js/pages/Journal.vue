<script>
import PublicLayout from '@/Layouts/PublicLayout.vue';
export default { layout: PublicLayout };
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Journal | Almond-Blossoms Events" />

    <!-- Adding top padding to account for the fixed glassmorphism header -->
    <div class="pt-24 lg:pt-32">
        <!-- ========================================== -->
        <!-- HERO SECTION: The Magazine Cover           -->
        <!-- ========================================== -->
        <section
            class="relative overflow-hidden border-b border-brand-rose/20 bg-brand-blush pt-10 pb-24 lg:pt-20 lg:pb-32"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="flex flex-col items-center justify-between gap-12 md:flex-row"
                >
                    <!-- Title Area -->
                    <div
                        class="fade-up z-10 w-full text-center md:w-1/2 md:text-left"
                    >
                        <span
                            class="mb-6 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >Musings & Real Weddings</span
                        >
                        <h1
                            class="mb-8 font-serif text-6xl leading-[0.9] text-brand-wine md:text-8xl lg:text-9xl"
                        >
                            The <br />
                            <span class="font-light text-brand-mauve italic"
                                >Journal.</span
                            >
                        </h1>
                        <p
                            class="max-w-md text-lg leading-relaxed font-light text-brand-wine/70"
                        >
                            Curated inspiration, expert planning advice, and an
                            intimate look inside the breathtaking celebrations
                            we create for our couples.
                        </p>
                    </div>

                    <!-- Single Floating Editorial Image -->
                    <div
                        class="relative hidden aspect-[3/4] w-full md:block md:w-5/12"
                    >
                        <!-- image-reveal creates that slick horizontal wipe effect -->
                        <div
                            class="image-reveal absolute inset-0 overflow-hidden rounded-sm bg-brand-light shadow-2xl"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1518049362265-d5b2a6467637?q=80&w=800&auto=format&fit=crop"
                                alt="Bridal Details"
                                class="img-zoom h-full w-full object-cover object-center"
                            />
                        </div>
                        <!-- Tiny text accent -->
                        <div
                            class="fade-up absolute -bottom-6 -left-12 origin-left rotate-90 text-[0.65rem] font-semibold tracking-[0.3em] text-brand-mauve uppercase"
                            style="animation-delay: 0.5s"
                        >
                            Vol. I — Inspiration
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- THE SPOTLIGHT FEATURE (Latest Post)        -->
        <!-- ========================================== -->
        <section class="relative bg-brand-light py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <span
                    class="mb-8 block w-max border-b border-brand-rose/30 pb-4 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                    >Latest Feature</span
                >

                <div
                    class="group img-zoom-container relative aspect-[4/3] w-full overflow-hidden rounded-sm shadow-2xl lg:aspect-[21/9]"
                >
                    <img
                        src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=1600&auto=format&fit=crop"
                        class="img-zoom h-full w-full object-cover"
                        alt="Timelines feature"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/20 to-transparent"
                    ></div>

                    <!-- Overlapping Content Card -->
                    <div
                        class="absolute bottom-0 left-0 w-full transform rounded-sm bg-brand-blush/95 p-8 shadow-xl backdrop-blur-md lg:w-1/2 lg:translate-x-8 lg:-translate-y-8 lg:p-12"
                    >
                        <span
                            class="mb-4 block font-serif text-xl text-brand-mauve italic"
                            >Advice & Planning</span
                        >
                        <h2
                            class="mb-6 font-serif text-4xl leading-tight text-brand-wine lg:text-5xl"
                        >
                            Crafting the Perfect Wedding Day Timeline.
                        </h2>
                        <p
                            class="mb-8 line-clamp-3 text-sm leading-relaxed font-light text-brand-wine/70"
                        >
                            Timelines are detailed, long, and can be
                            stressful—but they are a massive part of what we
                            like to do when planning your wedding. It’s all in
                            the details. Everything comes together effortlessly
                            once you have figured out the ceremony flow...
                        </p>

                        <!-- NOTE: Using standard href for now, but in Laravel this would be a dynamic <Link :href="route('blog.show', post.slug)"> -->
                        <Link
                            href="/journal/timelines"
                            class="inline-flex items-center gap-4 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-colors group-hover/link:text-brand-rose hover:text-brand-rose"
                        >
                            <span>Read Story</span>
                            <div
                                class="h-[1px] w-8 bg-brand-wine transition-all duration-400"
                            ></div>
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- REDESIGNED ARCHIVE: Horizontal Lookbook    -->
        <!-- ========================================== -->
        <section class="bg-brand-blush py-24 lg:py-40">
            <div class="mx-auto max-w-6xl px-6 lg:px-12">
                <!-- Section Header -->
                <div
                    class="mb-12 flex flex-col items-end justify-between border-b border-brand-rose/20 pb-8 md:flex-row"
                >
                    <div>
                        <span
                            class="mb-4 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >The Archive</span
                        >
                        <h2
                            class="font-serif text-4xl text-brand-wine lg:text-5xl"
                        >
                            Curated Stories
                        </h2>
                    </div>
                    <div
                        class="hidden font-serif text-2xl text-brand-mauve italic md:block"
                    >
                        Vol. I
                    </div>
                </div>

                <!-- Horizontal Article List (This is what you would loop over with v-for in a real app) -->
                <div class="flex flex-col">
                    <!-- Article Row 1: Timelines -->
                    <Link
                        href="/journal/timelines"
                        class="group flex flex-col items-center gap-8 border-b border-brand-rose/10 py-12 md:flex-row lg:gap-16"
                    >
                        <div
                            class="img-zoom-container aspect-[4/3] w-full flex-shrink-0 overflow-hidden rounded-sm shadow-lg md:aspect-[4/5] md:w-1/3 lg:w-1/4"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=800&auto=format&fit=crop"
                                class="img-zoom h-full w-full object-cover"
                                alt="Timelines"
                            />
                        </div>
                        <div
                            class="flex w-full flex-col justify-center transition-transform duration-700 md:w-2/3 md:group-hover:translate-x-6 lg:w-3/4"
                        >
                            <div class="mb-4 flex items-center gap-4">
                                <span
                                    class="text-[0.65rem] font-semibold tracking-[0.2em] text-brand-rose uppercase"
                                    >Advice &amp; Planning</span
                                >
                                <span class="h-px w-8 bg-brand-rose/50"></span>
                                <span
                                    class="font-serif text-sm text-brand-mauve italic"
                                    >May 14th, 2026</span
                                >
                            </div>
                            <h3
                                class="mb-4 font-serif text-3xl text-brand-wine transition-colors group-hover:text-brand-rose md:text-4xl"
                            >
                                Crafting the Perfect Wedding Day Timeline.
                            </h3>
                            <p
                                class="mb-8 line-clamp-2 max-w-2xl leading-relaxed font-light text-brand-wine/70"
                            >
                                Everything comes together effortlessly once you
                                have figured out the ceremony flow. Timelines
                                are the quiet backbone of a perfect day.
                            </p>
                            <span
                                class="inline-flex items-center gap-3 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-colors group-hover:text-brand-rose"
                            >
                                Read Article
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
                    </Link>

                    <!-- Article Row 2: Shot List -->
                    <Link
                        href="/journal/shot-list"
                        class="group flex flex-col items-center gap-8 border-b border-brand-rose/10 py-12 md:flex-row lg:gap-16"
                    >
                        <div
                            class="img-zoom-container aspect-[4/3] w-full flex-shrink-0 overflow-hidden rounded-sm shadow-lg md:aspect-[4/5] md:w-1/3 lg:w-1/4"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?q=80&w=800&auto=format&fit=crop"
                                class="img-zoom h-full w-full object-cover"
                                alt="Shot List"
                            />
                        </div>
                        <div
                            class="flex w-full flex-col justify-center transition-transform duration-700 md:w-2/3 md:group-hover:translate-x-6 lg:w-3/4"
                        >
                            <div class="mb-4 flex items-center gap-4">
                                <span
                                    class="text-[0.65rem] font-semibold tracking-[0.2em] text-brand-rose uppercase"
                                    >Photography</span
                                >
                                <span class="h-px w-8 bg-brand-rose/50"></span>
                                <span
                                    class="font-serif text-sm text-brand-mauve italic"
                                    >June 3rd, 2026</span
                                >
                            </div>
                            <h3
                                class="mb-4 font-serif text-3xl text-brand-wine transition-colors group-hover:text-brand-rose md:text-4xl"
                            >
                                The Ultimate Wedding Day Shot List.
                            </h3>
                            <p
                                class="mb-8 line-clamp-2 max-w-2xl leading-relaxed font-light text-brand-wine/70"
                            >
                                Getting ready, candid moments, shoes, the veil,
                                the rings, and the unfolding magic of the First
                                Look. Build a list that will completely wow you.
                            </p>
                            <span
                                class="inline-flex items-center gap-3 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-colors group-hover:text-brand-rose"
                            >
                                Read Article
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
                    </Link>

                    <!-- Article Row 3: Vibrant Styling -->
                    <Link
                        href="/journal/styling"
                        class="group flex flex-col items-center gap-8 border-b border-brand-rose/10 py-12 md:flex-row lg:gap-16"
                    >
                        <div
                            class="img-zoom-container aspect-[4/3] w-full flex-shrink-0 overflow-hidden rounded-sm shadow-lg md:aspect-[4/5] md:w-1/3 lg:w-1/4"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop"
                                class="img-zoom h-full w-full object-cover"
                                alt="Vibrant Styling"
                            />
                        </div>
                        <div
                            class="flex w-full flex-col justify-center transition-transform duration-700 md:w-2/3 md:group-hover:translate-x-6 lg:w-3/4"
                        >
                            <div class="mb-4 flex items-center gap-4">
                                <span
                                    class="text-[0.65rem] font-semibold tracking-[0.2em] text-brand-rose uppercase"
                                    >Styling &amp; Design</span
                                >
                                <span class="h-px w-8 bg-brand-rose/50"></span>
                                <span
                                    class="font-serif text-sm text-brand-mauve italic"
                                    >July 18th, 2026</span
                                >
                            </div>
                            <h3
                                class="mb-4 font-serif text-3xl text-brand-wine transition-colors group-hover:text-brand-rose md:text-4xl"
                            >
                                Vibrant: Styling with Colour and Tone.
                            </h3>
                            <p
                                class="mb-8 line-clamp-2 max-w-2xl leading-relaxed font-light text-brand-wine/70"
                            >
                                There is something captivating about bold
                                colours and tones that make a wedding day truly
                                alive. A guide to palette, tone, and the art of
                                cohesive design.
                            </p>
                            <span
                                class="inline-flex items-center gap-3 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-colors group-hover:text-brand-rose"
                            >
                                Read Article
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
                    </Link>
                </div>

                <!-- Pagination/Load More (Placeholder) -->
                <div class="mt-16 pt-8 text-center">
                    <button
                        class="inline-block rounded-sm border border-brand-wine px-10 py-5 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-all hover:bg-brand-wine hover:text-white"
                    >
                        Load Older Stories
                    </button>
                </div>
            </div>
        </section>

        <!-- THE SOCIAL CONNECTION (Instagram Banner) -->
        <section
            class="relative overflow-hidden bg-brand-wine px-6 py-32 text-center lg:py-48"
        >
            <div
                class="pointer-events-none absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"
            ></div>

            <div
                class="relative z-10 mx-auto flex max-w-4xl flex-col items-center"
            >
                <h2
                    class="mb-8 font-serif text-4xl leading-tight font-light text-brand-light italic md:text-5xl lg:text-6xl"
                >
                    Follow the daily inspiration and behind-the-scenes magic.
                </h2>

                <a
                    href="#"
                    class="group flex items-center gap-4 text-sm font-semibold tracking-widest text-brand-rose uppercase transition-colors duration-400 hover:text-brand-light"
                >
                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"
                        />
                    </svg>
                    <span>@almondblossomsevents</span>
                    <div
                        class="h-[1px] w-8 bg-brand-rose transition-all duration-400 group-hover:w-12 group-hover:bg-brand-light"
                    ></div>
                </a>
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
                        class="font-serif text-2xl tracking-tighter text-brand-wine italic lg:text-3xl"
                    >
                        BRIDES
                    </h3>
                </div>
            </div>
        </section>
    </div>
</template>
