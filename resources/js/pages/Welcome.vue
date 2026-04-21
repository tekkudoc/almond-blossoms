<script>
import PublicLayout from '@/layouts/PublicLayout.vue';

export default {
    layout: (h, page) =>
        h(PublicLayout, { 'initial-load-only': true }, () => page),
};
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home | Almond-Blossoms Events" />

    <div>
        <!-- ========================================== -->
        <!-- HERO SECTION                               -->
        <!-- ========================================== -->
        <section
            class="relative flex h-screen w-full items-center justify-center overflow-hidden"
        >
            <div class="absolute inset-0 h-full w-full">
                <img
                    src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format&fit=crop"
                    alt="Luxurious Wedding Reception"
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
                    class="mb-5 block text-sm font-semibold tracking-[0.25em] text-brand-light uppercase"
                    style="animation-delay: 4.2s"
                >
                    Essex, & Across U.K.
                </span>

                <!-- font-serif now maps to Lavishly Yours -->
                <h1
                    class="mb-6 font-serif text-6xl leading-tight text-white drop-shadow-lg md:text-7xl lg:text-8xl"
                    style="animation-delay: 4.4s"
                >
                    Authentic & Sensational Weddings, <br />
                    Parties & Events Creche
                </h1>

                <Link
                    href="/services"
                    class="mt-8 inline-block rounded-sm border border-brand-wine bg-brand-wine/80 px-10 py-4 text-sm font-semibold tracking-[0.15em] text-white uppercase shadow-xl backdrop-blur-md transition-all duration-600 hover:-translate-y-1 hover:border-brand-blush hover:bg-brand-blush hover:text-brand-wine hover:shadow-2xl"
                    style="animation-delay: 4.8s"
                >
                    Discover Our Services
                </Link>
            </div>

            <div
                class="fade-up absolute bottom-10 left-1/2 z-10 hidden -translate-x-1/2 transform flex-col items-center opacity-60 sm:flex"
                style="animation-delay: 5s"
            >
                <span
                    class="mb-2 text-[0.65rem] font-semibold tracking-[0.3em] text-white uppercase"
                    >Scroll</span
                >
                <div
                    class="h-12 w-[1px] bg-gradient-to-b from-brand-rose to-transparent"
                ></div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- HELLO & WELCOME SECTION                    -->
        <!-- ========================================== -->
        <section class="relative bg-brand-blush py-24 lg:py-40">
            <div class="mx-auto max-w-6xl px-6 lg:px-12">
                <div class="mx-auto mb-16 max-w-4xl text-center">
                    <svg
                        class="mx-auto mb-6 h-8 w-8 text-brand-rose opacity-80"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1"
                    >
                        <path
                            d="M12 22c4-4 8-6 8-12A8 8 0 0 0 4 10c0 6 4 8 8 12z"
                        ></path>
                        <path d="M12 22v-7"></path>
                    </svg>

                    <!-- font-signature now maps to Tangerine -->
                    <span
                        class="mb-2 block font-signature text-5xl text-brand-rose"
                        >Hello & Welcome</span
                    >

                    <h2
                        class="mt-2 font-serif text-4xl leading-tight text-brand-wine drop-shadow-sm md:text-5xl lg:text-6xl"
                    >
                        Styling & Designing Luxurious Events
                    </h2>
                </div>

                <!-- font-sans now maps to Georgia -->
                <div
                    class="mx-auto mb-20 max-w-4xl space-y-6 text-center font-sans text-lg leading-relaxed text-brand-wine/80 md:text-justify"
                >
                    <p class="drop-cap">
                        Your wedding day is one of the memorable milestone
                        events in your journey through life and an occasion
                        celebrated by all from family to friends of all ages. At
                        Almond-Blossoms Events, we believe every guest should
                        feel included, comfortable, and cared for including the
                        little ones.
                    </p>
                    <p>
                        From the very first meeting, we work closely with you to
                        bring your vision to life as we create a memorable
                        celebration that reflects your story and an enjoyable
                        experience for everyone. Every wedding and event is
                        unique so we will design it with thoughtful attention to
                        details.
                    </p>
                    <p>
                        What sets Almond-Blossoms Events wedding and events
                        planning services apart is also our bespoke crèche
                        service. We understand that couples and their guests
                        often want to fully relax and enjoy the occasion,
                        knowing their children are safe, happy, and entertained.
                        Our professional childcare team provides a dedicated,
                        engaging space where children can play, rest, and be
                        cared for throughout your event.
                    </p>
                </div>

                <div
                    class="img-zoom-container group relative aspect-[21/9] w-full overflow-hidden rounded-sm bg-brand-light shadow-xl md:aspect-[24/9]"
                >
                    <img
                        src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=2000&auto=format&fit=crop"
                        class="img-zoom h-full w-full object-cover"
                        alt="Breathtaking Wedding Scene"
                    />
                    <div
                        class="absolute right-0 bottom-0 flex max-w-xs translate-y-2 transform flex-col items-center bg-brand-blush/90 p-6 text-center backdrop-blur-md transition-transform duration-1000 group-hover:translate-y-0 md:right-8 md:bottom-8 lg:p-8"
                    >
                        <p
                            class="mb-2 text-[0.65rem] font-semibold tracking-[0.25em] text-brand-wine uppercase"
                        >
                            Founder & Lead Planner
                        </p>
                        <div
                            class="mt-2 -rotate-2 font-signature text-6xl leading-none text-brand-rose/90"
                        >
                            Judith
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ... SERVICES ACCORDION SECTION REMAINS UNCHANGED ... -->
        <section class="border-y border-brand-rose/10 bg-brand-light py-24">
            <div class="mb-16 px-6 text-center">
                <span class="mb-2 block font-signature text-4xl text-brand-rose"
                    >Bespoke Planning</span
                >
                <h2
                    class="mt-2 font-serif text-5xl text-brand-wine lg:text-6xl"
                >
                    Curated Services
                </h2>
            </div>
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
                    <div
                        class="absolute inset-0 flex flex-col justify-end p-8 md:p-12"
                    >
                        <span
                            class="mb-4 font-serif text-4xl text-brand-mauve opacity-50 transition-all duration-700 group-hover:-translate-y-2 group-hover:opacity-100 md:text-5xl"
                            >01.</span
                        >
                        <h3
                            class="mb-4 transform font-serif text-4xl whitespace-nowrap text-brand-blush transition-transform duration-700 group-hover:-translate-y-2 md:text-5xl"
                        >
                            Wedding Planning
                        </h3>
                        <div
                            class="transition-[grid-template-rows] duration-700 ease-in-out group-hover:grid-rows-[1fr] md:grid md:grid-rows-[0fr]"
                        >
                            <div class="overflow-hidden">
                                <p
                                    class="mb-6 max-w-sm font-sans text-sm leading-relaxed font-light text-brand-light/80 opacity-100 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:text-base md:opacity-0"
                                >
                                    From full conceptual planning to on-the-day
                                    management, crafting your epic celebration
                                    from start to finish so you can live in the
                                    moment.
                                </p>
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
                            class="mb-4 font-serif text-4xl text-brand-mauve opacity-50 transition-all duration-700 group-hover:-translate-y-2 group-hover:opacity-100 md:text-5xl"
                            >02.</span
                        >
                        <h3
                            class="mb-4 transform font-serif text-4xl whitespace-nowrap text-brand-blush transition-transform duration-700 group-hover:-translate-y-2 md:text-5xl"
                        >
                            Luxury Events
                        </h3>
                        <div
                            class="transition-[grid-template-rows] duration-700 ease-in-out group-hover:grid-rows-[1fr] md:grid md:grid-rows-[0fr]"
                        >
                            <div class="overflow-hidden">
                                <p
                                    class="mb-6 max-w-sm font-sans text-sm leading-relaxed font-light text-brand-light/80 opacity-100 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:text-base md:opacity-0"
                                >
                                    Designing spectacular and flawless private
                                    parties and events that leave a lasting,
                                    sensational impression on your guests.
                                </p>
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
                            class="mb-4 font-serif text-4xl text-brand-mauve opacity-50 transition-all duration-700 group-hover:-translate-y-2 group-hover:opacity-100 md:text-5xl"
                            >03.</span
                        >
                        <h3
                            class="mb-4 transform font-serif text-4xl whitespace-nowrap text-brand-blush transition-transform duration-700 group-hover:-translate-y-2 md:text-5xl"
                        >
                            Events Creche
                        </h3>
                        <div
                            class="transition-[grid-template-rows] duration-700 ease-in-out group-hover:grid-rows-[1fr] md:grid md:grid-rows-[0fr]"
                        >
                            <div class="overflow-hidden">
                                <p
                                    class="mb-6 max-w-sm font-sans text-sm leading-relaxed font-light text-brand-light/80 opacity-100 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:text-base md:opacity-0"
                                >
                                    Dedicated, high-quality childcare ensuring
                                    your youngest guests are entertained safely,
                                    giving parents the ultimate gift:
                                    relaxation.
                                </p>
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
        </section>
    </div>
</template>
