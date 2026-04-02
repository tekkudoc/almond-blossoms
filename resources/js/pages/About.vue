<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineOptions({
    layout: PublicLayout,
});
// FIX: Removed isFirstLoad / sessionStorage logic.
// Preloader now shows on every page, so animations always run.
</script>

<template>
    <Head title="Our Story | Almond-Blossoms Events" />

    <div class="pt-24 lg:pt-28">
        <!-- HERO SECTION -->
        <section class="relative overflow-hidden bg-brand-blush pt-20 pb-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div class="fade-up mx-auto mb-16 max-w-4xl text-center">
                    <span
                        class="mb-6 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >Our Story</span
                    >
                    <h1
                        class="mb-6 font-serif text-4xl leading-[1.1] text-brand-wine sm:text-5xl md:text-6xl lg:text-8xl"
                    >
                        The Heart Behind <br />
                        <span class="font-light text-brand-mauve italic"
                            >the Art.</span
                        >
                    </h1>
                </div>
                <div
                    class="image-reveal relative aspect-[16/9] w-full overflow-hidden rounded-sm bg-brand-light shadow-xl md:aspect-[21/9]"
                >
                    <img
                        src="https://images.unsplash.com/photo-1510076857177-7470076d4098?q=80&w=2000&auto=format&fit=crop"
                        class="h-full w-full object-cover"
                        alt="Beautiful landscape setup"
                    />
                </div>
            </div>
        </section>

        <!-- SECTION 1: MEET JUDITH -->
        <section class="relative bg-brand-blush py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="grid grid-cols-1 items-center gap-16 lg:grid-cols-12 lg:gap-24"
                >
                    <div class="group relative lg:col-span-5">
                        <div
                            class="absolute -bottom-6 -left-6 -z-10 h-full w-full rounded-sm border border-brand-rose/20 bg-brand-light transition-transform duration-1000 group-hover:-translate-x-2 group-hover:translate-y-2"
                        ></div>
                        <div
                            class="img-zoom-container aspect-[2/3] w-full overflow-hidden rounded-sm shadow-2xl"
                        >
                            <img
                                src="/images/judith.jpg"
                                alt="Portrait of Judith"
                                class="img-zoom h-full w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="lg:col-span-7">
                        <div class="mb-6 inline-flex items-center space-x-4">
                            <span class="h-[1px] w-12 bg-brand-rose"></span>
                            <span
                                class="text-xs font-semibold tracking-[0.2em] text-brand-mauve uppercase"
                                >Meet Judith</span
                            >
                        </div>
                        <h2
                            class="mb-8 font-serif text-4xl leading-tight text-brand-wine lg:text-5xl"
                        >
                            Creative Wedding & Events planner for
                            <span class="font-light text-brand-rose italic"
                                >Chic Luxurious Celebrations</span
                            >
                        </h2>
                        <div
                            class="space-y-6 text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            <p class="drop-cap">
                                Hello, allow me to introduce myself. I am a
                                planner passionate about all things weddings and
                                events. I absolutely love the beauty that comes
                                as a result of flawless organization and
                                boundless creativity.
                            </p>
                            <p>
                                At Almond-Blossoms, we provide professional and
                                friendly services while planning your event with
                                absolute uniqueness. We approach every occasion
                                with sheer sophistication to create highly
                                intimate and unforgettable experiences.
                            </p>
                            <p>
                                I am fiercely passionate about what we do, and
                                aim to offer an unparalleled level of service to
                                our clients. We exist to assist in turning your
                                dream event into a reality, ensuring a
                                stress-free day filled entirely with memories to
                                cherish.
                            </p>
                        </div>
                        <div class="mt-12 flex items-center gap-6">
                            <div
                                class="-rotate-2 font-signature text-5xl leading-none text-brand-rose/80 md:text-6xl"
                            >
                                Judith
                            </div>
                            <div
                                class="hidden h-[1px] w-12 bg-brand-rose/50 sm:block"
                            ></div>
                            <span
                                class="mt-2 hidden font-serif text-xs tracking-[0.2em] text-brand-wine uppercase sm:block"
                                >Founder & Lead Planner</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: MY PASSION -->
        <section
            class="relative border-y border-brand-rose/10 bg-brand-light py-24 lg:py-40"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2 lg:gap-24"
                >
                    <div class="order-2 lg:order-1">
                        <span
                            class="mb-4 block inline-block border-b border-brand-rose/30 pb-4 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >My Passion</span
                        >
                        <h2
                            class="mb-8 font-serif text-5xl leading-tight text-brand-wine"
                        >
                            Nature, Art, <br />
                            <span class="font-light text-brand-mauve italic"
                                >& Integrity.</span
                            >
                        </h2>
                        <div
                            class="space-y-6 text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            <p>
                                I love nature, so outdoor adventures constantly
                                allow me to envision intimate weddings and
                                events in quiet, idyllic places. I find my
                                inspiration in cycling, hiking, travelling,
                                exploring art galleries, and experiencing the
                                theater.
                            </p>
                            <p>
                                I firmly believe in respect and being mindful of
                                others, therefore maintaining a non-judgmental
                                atmosphere as we work closely together.
                                Integrity and nurturing excellent, trustworthy
                                working relationships is a massive part of who I
                                am and exactly what I do.
                            </p>
                        </div>
                    </div>
                    <div
                        class="relative order-1 h-[500px] w-full sm:h-[600px] lg:order-2"
                    >
                        <div
                            class="img-zoom-container absolute top-0 left-0 z-10 h-4/5 w-2/3 overflow-hidden rounded-sm bg-brand-dark shadow-xl"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop"
                                class="img-zoom h-full w-full object-cover"
                                alt="Nature Inspiration"
                            />
                        </div>
                        <div
                            class="img-zoom-container absolute top-12 right-0 z-20 aspect-square w-1/2 overflow-hidden rounded-sm border-[6px] border-brand-light bg-brand-blush shadow-2xl"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1518049362265-d5b2a6467637?q=80&w=600&auto=format&fit=crop"
                                class="img-zoom h-full w-full object-cover"
                                alt="Art Gallery Inspiration"
                            />
                        </div>
                        <div
                            class="img-zoom-container absolute right-12 -bottom-6 z-30 aspect-[4/3] w-3/5 overflow-hidden rounded-sm border-[6px] border-brand-light bg-brand-rose shadow-2xl"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1511895426328-dc8714191300?q=80&w=600&auto=format&fit=crop"
                                class="img-zoom h-full w-full object-cover"
                                alt="Table Details"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: PLANNING POWER HOUR -->
        <section
            class="relative overflow-hidden bg-brand-wine py-24 text-brand-light lg:py-32"
        >
            <div
                class="pointer-events-none absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"
            ></div>
            <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2 lg:gap-24"
                >
                    <div
                        class="group relative aspect-[4/5] w-full overflow-hidden border border-brand-rose/30 bg-brand-dark/50 p-4 shadow-2xl lg:aspect-square"
                    >
                        <div class="relative h-full w-full overflow-hidden">
                            <img
                                src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=800&auto=format&fit=crop"
                                class="h-full w-full object-cover contrast-125 filter transition-transform duration-[2000ms] group-hover:scale-105"
                                alt="Planning Session"
                            />
                            <div
                                class="absolute inset-0 bg-brand-wine/20"
                            ></div>
                        </div>
                    </div>
                    <div>
                        <span
                            class="mb-4 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >Let's Talk</span
                        >
                        <h2
                            class="mb-8 font-serif text-5xl leading-[1.1] text-brand-blush lg:text-6xl"
                        >
                            Planning
                            <span class="font-light text-brand-rose italic"
                                >Power Hour</span
                            >
                        </h2>
                        <div
                            class="mb-10 space-y-6 text-lg leading-relaxed font-light text-brand-light/80"
                        >
                            <p>
                                I know planning a wedding can be a daunting
                                experience. So why not enjoy an exclusive 1:1
                                session with me to look at exactly how we can
                                assist you in planning your lovely event?
                            </p>
                            <p>
                                This consultation service is designed to guide
                                you through the steps of planning your event
                                from start to finish—looking at your budget,
                                creating a manageable timeline, sourcing
                                vendors, and making your journey as smooth and
                                stress-free as possible.
                            </p>
                        </div>
                        <div class="mb-10">
                            <h4
                                class="mb-6 font-serif text-2xl text-brand-blush italic"
                            >
                                What you can expect from this session:
                            </h4>
                            <ul
                                class="space-y-4 font-light text-brand-light/80"
                            >
                                <li class="flex items-start gap-4">
                                    <svg
                                        class="mt-1 h-5 w-5 shrink-0 text-brand-rose"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    <span
                                        >Creative ideas, mood-boarding, and
                                        tailored recommendations.</span
                                    >
                                </li>
                                <li class="flex items-start gap-4">
                                    <svg
                                        class="mt-1 h-5 w-5 shrink-0 text-brand-rose"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    <span
                                        >Crucial questions you might want to ask
                                        your suppliers and vendors.</span
                                    >
                                </li>
                                <li class="flex items-start gap-4">
                                    <svg
                                        class="mt-1 h-5 w-5 shrink-0 text-brand-rose"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    <span
                                        >Professional guidance on any concerns
                                        and views you may have.</span
                                    >
                                </li>
                                <li class="flex items-start gap-4">
                                    <svg
                                        class="mt-1 h-5 w-5 shrink-0 text-brand-rose"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    <span
                                        >Sessions are booked on hourly
                                        time-slots to fit your busy
                                        schedule.</span
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="border-t border-brand-rose/20 pt-8">
                            <h5
                                class="mb-2 text-xs font-semibold tracking-widest text-brand-rose uppercase"
                            >
                                Investment
                            </h5>
                            <p
                                class="mb-8 font-serif text-4xl text-brand-blush italic"
                            >
                                £100
                                <span
                                    class="font-sans text-2xl font-light text-brand-light/60 not-italic"
                                    >/ hour</span
                                >
                            </p>
                            <Link
                                href="/contact"
                                class="inline-block rounded-sm bg-brand-rose px-10 py-5 text-sm font-semibold tracking-[0.15em] text-brand-dark uppercase shadow-lg transition-all duration-400 hover:bg-brand-blush hover:text-brand-wine"
                            >
                                Book Your Call
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
