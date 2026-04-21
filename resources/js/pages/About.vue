<script>
import PublicLayout from '@/layouts/PublicLayout.vue';

export default {
    layout: PublicLayout,
};
</script>

<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { Plus, Minus } from 'lucide-vue-next';

// FAQ Accordion State
const activeFaq = ref(null);

const toggleFaq = (index) => {
    activeFaq.value = activeFaq.value === index ? null : index;
};

const faqs = [
    {
        question: 'What services do you offer?',
        answer: 'We provide complete event services including full wedding planning, partial planning, on the day coordination, event coordination, and professional crèche (childcare) services for events. We tailor our services to suit your needs.',
    },
    {
        question: 'What does your wedding planning service include?',
        answer: 'Our services include venue sourcing, supplier coordination, décor styling, timeline management, and on-the-day coordination.',
    },
    {
        question: 'Where are you based?',
        answer: 'We are based in Essex, serving couples throughout the UK. Whether you’re planning a local wedding or a destination celebration in the UK, I can help make your day unforgettable.',
    },
    {
        question: 'Are you insured?',
        answer: 'Yes, Almond-Blossoms is fully insured with public liability insurance for events and childcare services, so you can have complete peace of mind.',
    },
    {
        question: 'Will you be there on the day?',
        answer: 'Absolutely! All wedding planning and creche services include Judith being on-site for your special day. I will manage timelines, suppliers, creche setup and everything in between, ensuring you can relax and enjoy your celebration.',
    },
    {
        question: 'Can you work with my chosen vendors?',
        answer: 'Yes! We can collaborate with your preferred vendors or recommend trusted professionals.',
    },
    {
        question: 'How far in advance should we book your services?',
        answer: 'Ideally, couples book us 12–18 months before their wedding, but we also offer last-minute planning support. For creche services, we recommend booking at least 3–6 months in advance for weddings and 4–8 weeks for smaller events.',
    },
    {
        question:
            'Can we hire you for just wedding and event services or creche service?',
        answer: 'Yes, you can hire our wedding and event services or our crèche services separately, depending on your needs. We also offer the option to combine both as part of a tailored package for your event. Whichever service you choose, we are committed to ensuring everything runs smoothly so you can relax and fully enjoy your special day.',
    },
    {
        question: 'Do you handle wedding budgets?',
        answer: 'Yes, we help track spending, recommend cost-saving strategies, and ensure your budget is used effectively.',
    },
    {
        question: 'How much does wedding planning cost?',
        answer: 'Our pricing depends on the level of service required. We provide custom quotes based on your needs.',
    },
    {
        question: 'Any additional fees we should be aware of?',
        answer: 'All fees are clearly outlined in your personalised proposal after your consultation. Additional costs may include travel and accommodation, creche setup depending on your location and the number of days we’re on-site.',
    },
    {
        question:
            'Will we still have control over wedding if we hire a planner?',
        answer: 'Absolutely. You make all key decisions, and I act as your dedicated wedding PA, handling the logistics and supplier coordination so you can focus on enjoying your engagement and wedding day.',
    },
    {
        question: 'How many weddings do you plan at one time?',
        answer: 'Each couple deserves personalised attention. To maintain my high standard, I only take on a limited number of full-planning weddings each year. Contact us early to check availability and secure your date.',
    },
    {
        question: 'What Legal checks do your staff have?',
        answer: 'Our staff have all legal checks such as: Enhanced DBS, first aid trained and fully qualified in childcare.',
    },
    {
        question: 'What age range of children do you look after?',
        answer: 'Almond-Blossoms Events creche caters for ages that range from 0-12 years old for all service types. We follow recommended childcare ratios to ensure safety and proper supervision.',
    },
    {
        question: 'Can parents check on their children during the event?',
        answer: 'Of course! Parents are welcome to visit the crèche area at any time.',
    },
    {
        question: 'Do you provide childcare at the venue?',
        answer: 'Yes, we set up a dedicated crèche area at your event venue.',
    },
    {
        question: 'What safety measures do you have in place?',
        answer: 'We prioritise safety with secure sign-in/out procedures, first-aid trained staff, and risk assessments.',
    },
    {
        question: 'How do we secure our date with you?',
        answer: 'A signed contract and deposit are required to officially book our services.',
    },
];
</script>

<template>
    <Head title="Our Story & FAQ | Almond-Blossoms Events" />

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
                        class="mb-6 font-serif text-5xl leading-[1.1] text-brand-wine md:text-7xl lg:text-8xl"
                    >
                        Meet
                        <span class="font-light text-brand-mauve italic"
                            >Judith.</span
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
                                src="https://www.almond-blossoms.com/wp-content/uploads/bb-plugin/cache/19-DSC_5032-Edit-portrait-f03f9cac6fa0383784cd3ebf074d1d54-612c9e2460643.jpg"
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
                                >About The Founder</span
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
                            class="space-y-6 text-justify font-sans text-lg leading-relaxed font-light text-brand-wine/80 md:text-left"
                        >
                            <p class="drop-cap">
                                Hello, allow me to introduce myself. I am a
                                planner passionate about all things weddings and
                                events. I love beauty that comes because of good
                                organisation and creativity.
                            </p>
                            <p>
                                At Almond-Blossoms, we provide professional and
                                friendly services while planning your event with
                                uniqueness and approaching it with sheer
                                sophistication while creating intimate
                                occasions.
                            </p>
                            <p>
                                I am passionate about what we do and aim to
                                offer quality services to our clients which
                                assist in turning your dream event into a
                                reality making it a stress-free day filled with
                                memories to cherish.
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
                            class="mb-4 block w-max border-b border-brand-rose/30 pb-4 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                            >Personal Insights</span
                        >
                        <h2
                            class="mb-8 font-serif text-5xl leading-tight text-brand-wine"
                        >
                            My
                            <span class="font-light text-brand-mauve italic"
                                >Passion.</span
                            >
                        </h2>
                        <div
                            class="space-y-6 text-justify font-sans text-lg leading-relaxed font-light text-brand-wine/80 md:text-left"
                        >
                            <p>
                                I love nature so outdoor adventures allow me to
                                envision intimate weddings and events in quiet
                                idyllic places. I like cycling, hiking,
                                travelling, art galleries and theatres.
                            </p>
                            <p>
                                I believe in respect and being mindful of others
                                therefore being non-judgmental as we work
                                together. Integrity and nurturing good work
                                relationships is a big part of who I am and what
                                I do.
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
                            class="mb-10 space-y-6 font-sans text-lg leading-relaxed font-light text-brand-light/80"
                        >
                            <p>
                                I know planning a wedding can be a daunting
                                experience. So why not enjoy a 1:1 session with
                                me as we look on how we can assist you in
                                planning your lovely event.
                            </p>
                            <p>
                                This consultation service is designed to guide
                                you work through the steps of planning your
                                event from start to finish looking at budget or
                                creating a manageable timeline to sourcing
                                vendors and making your journey as smooth and
                                stress free.
                            </p>
                        </div>
                        <div class="mb-10">
                            <h4
                                class="mb-6 font-serif text-2xl text-brand-blush italic"
                            >
                                What you can expect from this session:
                            </h4>
                            <ul
                                class="space-y-4 font-sans font-light text-brand-light/80"
                            >
                                <li class="flex items-start gap-4">
                                    <span
                                        class="mt-0.5 shrink-0 text-brand-rose"
                                        >•</span
                                    >
                                    <span>Ideas and recommendations</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span
                                        class="mt-0.5 shrink-0 text-brand-rose"
                                        >•</span
                                    >
                                    <span
                                        >Questions you might want to ask your
                                        suppliers and vendors</span
                                    >
                                </li>
                                <li class="flex items-start gap-4">
                                    <span
                                        class="mt-0.5 shrink-0 text-brand-rose"
                                        >•</span
                                    >
                                    <span
                                        >Any concerns and views you may
                                        have</span
                                    >
                                </li>
                                <li class="flex items-start gap-4">
                                    <span
                                        class="mt-0.5 shrink-0 text-brand-rose"
                                        >•</span
                                    >
                                    <span
                                        >Our sessions are booked on hourly
                                        timeslots. I would love to hear more
                                        about your wedding or event plans.</span
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
                                class="mb-8 font-serif text-3xl text-brand-blush italic"
                            >
                                priced at £100 per session
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

        <!-- ========================================== -->
        <!-- THE FAQ ACCORDION                          -->
        <!-- ========================================== -->
        <section
            class="relative border-t border-brand-rose/10 bg-brand-blush py-24 lg:py-40"
        >
            <div class="mx-auto max-w-4xl px-6 lg:px-12">
                <div class="mb-16 text-center">
                    <span
                        class="mb-4 block inline-block border-b border-brand-rose/30 pb-4 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >Frequently Asked Questions</span
                    >
                    <h2
                        class="font-serif text-5xl leading-tight text-brand-wine lg:text-6xl"
                    >
                        Answers &
                        <span class="font-light text-brand-mauve italic"
                            >Insights</span
                        >
                    </h2>
                </div>

                <div class="space-y-4">
                    <div
                        v-for="(faq, index) in faqs"
                        :key="index"
                        class="overflow-hidden rounded-sm border border-brand-rose/20 bg-white transition-all duration-500"
                        :class="{
                            'border-brand-rose/50 bg-brand-light/30 shadow-lg':
                                activeFaq === index,
                        }"
                    >
                        <button
                            @click="toggleFaq(index)"
                            class="group flex w-full items-center justify-between p-6 text-left focus:outline-none md:p-8"
                        >
                            <span
                                class="pr-8 font-serif text-2xl text-brand-wine transition-colors group-hover:text-brand-rose"
                            >
                                {{ faq.question }}
                            </span>
                            <div
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-brand-rose/30 bg-white text-brand-rose transition-transform duration-500"
                                :class="{
                                    'rotate-180 border-brand-wine bg-brand-wine text-white':
                                        activeFaq === index,
                                }"
                            >
                                <Plus
                                    v-if="activeFaq !== index"
                                    class="h-4 w-4"
                                />
                                <Minus v-else class="h-4 w-4" />
                            </div>
                        </button>

                        <div
                            class="grid transition-all duration-500 ease-in-out"
                            :class="
                                activeFaq === index
                                    ? 'grid-rows-[1fr] opacity-100'
                                    : 'grid-rows-[0fr] opacity-0'
                            "
                        >
                            <div class="overflow-hidden">
                                <div
                                    class="mt-2 border-t border-brand-rose/10 p-6 pt-0 font-sans leading-relaxed font-light text-brand-wine/80 md:p-8"
                                >
                                    {{ faq.answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
