<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineOptions({
    layout: PublicLayout,
});

const props = defineProps({
    posts: Array,
});

// First post is the spotlight feature
const featuredPost = computed(() =>
    props.posts?.length > 0 ? props.posts[0] : null,
);

// Remaining posts go into the archive
const archivePosts = computed(() =>
    props.posts?.length > 1 ? props.posts.slice(1) : [],
);
</script>

<template>
    <Head title="Journal | Almond-Blossoms Events" />

    <!-- pt matches fixed nav height exactly -->
    <div class="pt-24 lg:pt-28">
        <!-- ============================================ -->
        <!-- HERO                                         -->
        <!-- ============================================ -->
        <section
            class="relative overflow-hidden border-b border-brand-rose/20 bg-brand-blush pt-10 pb-24 lg:pt-20 lg:pb-32"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="flex flex-col items-center justify-between gap-12 md:flex-row"
                >
                    <!-- Title -->
                    <div
                        class="fade-up z-10 w-full text-center md:w-1/2 md:text-left"
                        style="animation-delay: 4.2s"
                    >
                        <span
                            class="mb-6 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >
                            Musings &amp; Real Weddings
                        </span>
                        <h1
                            class="mb-8 font-serif text-6xl leading-[0.9] text-brand-wine md:text-8xl lg:text-9xl"
                        >
                            The
                            <br />
                            <span class="font-light text-brand-mauve italic"
                                >Journal.</span
                            >
                        </h1>
                        <p
                            class="max-w-md text-base leading-relaxed font-light text-brand-wine/70 sm:text-lg"
                        >
                            Curated inspiration, expert planning advice, and an
                            intimate look inside the breathtaking celebrations
                            we create for our couples.
                        </p>
                    </div>

                    <!-- Editorial image — desktop only, revealed after preloader -->
                    <div
                        class="relative hidden aspect-[3/4] w-full md:block md:w-5/12"
                    >
                        <div
                            class="image-reveal absolute inset-0 overflow-hidden rounded-sm bg-brand-light shadow-2xl"
                            style="animation-delay: 4.4s"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1518049362265-d5b2a6467637?q=80&w=800&auto=format&fit=crop"
                                alt="Bridal Details"
                                class="img-zoom h-full w-full object-cover object-center"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- SPOTLIGHT FEATURE                            -->
        <!-- ============================================ -->
        <section
            v-if="featuredPost"
            class="relative bg-brand-light py-24 lg:py-32"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <span
                    class="mb-8 block w-max border-b border-brand-rose/30 pb-4 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                >
                    Latest Feature
                </span>

                <div
                    class="img-zoom-container group relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-brand-dark shadow-2xl lg:aspect-[21/9]"
                >
                    <img
                        v-if="featuredPost.image"
                        :src="featuredPost.image"
                        class="img-zoom h-full w-full object-cover"
                        :alt="featuredPost.title"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/20 to-transparent"
                    ></div>

                    <!-- Content card -->
                    <div
                        class="absolute bottom-0 left-0 w-full rounded-sm bg-brand-blush/95 p-6 shadow-xl backdrop-blur-md sm:p-8 lg:w-1/2 lg:translate-x-8 lg:-translate-y-8 lg:p-12"
                    >
                        <span
                            class="mb-4 block font-serif text-xl text-brand-mauve italic"
                        >
                            {{ featuredPost.category }}
                        </span>
                        <h2
                            class="mb-6 font-serif text-3xl leading-tight text-brand-wine sm:text-4xl lg:text-5xl"
                        >
                            {{ featuredPost.title }}
                        </h2>
                        <p
                            class="mb-8 line-clamp-3 text-sm leading-relaxed font-light text-brand-wine/70"
                        >
                            {{
                                featuredPost.excerpt ||
                                'Read the full story to discover more...'
                            }}
                        </p>
                        <Link
                            :href="`/journal/${featuredPost.slug}`"
                            class="inline-flex items-center gap-4 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >
                            <span>Read Story</span>
                            <div
                                class="h-px w-8 bg-brand-wine transition-all duration-400 hover:w-12 hover:bg-brand-rose"
                            ></div>
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- ARCHIVE                                      -->
        <!-- ============================================ -->
        <section
            v-if="archivePosts.length > 0"
            class="bg-brand-blush py-24 lg:py-40"
        >
            <div class="mx-auto max-w-6xl px-6 lg:px-12">
                <!-- Archive header -->
                <div
                    class="mb-12 flex flex-col justify-between gap-4 border-b border-brand-rose/20 pb-8 md:flex-row md:items-end"
                >
                    <div>
                        <span
                            class="mb-4 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >
                            The Archive
                        </span>
                        <h2
                            class="font-serif text-4xl text-brand-wine lg:text-5xl"
                        >
                            Curated Stories
                        </h2>
                    </div>
                </div>

                <!-- Archive list -->
                <div class="flex flex-col">
                    <Link
                        v-for="post in archivePosts"
                        :key="post.id"
                        :href="`/journal/${post.slug}`"
                        class="group flex flex-col items-center gap-8 border-b border-brand-rose/10 py-12 md:flex-row lg:gap-16"
                    >
                        <!-- Thumbnail -->
                        <div
                            class="img-zoom-container aspect-[4/3] w-full flex-shrink-0 overflow-hidden rounded-sm bg-brand-light shadow-lg md:aspect-[4/5] md:w-1/3 lg:w-1/4"
                        >
                            <img
                                v-if="post.image"
                                :src="post.image"
                                class="img-zoom h-full w-full object-cover"
                                :alt="post.title"
                            />
                        </div>

                        <!-- Meta + title -->
                        <div
                            class="flex w-full flex-col justify-center transition-transform duration-700 md:w-2/3 md:group-hover:translate-x-6 lg:w-3/4"
                        >
                            <div class="mb-4 flex items-center gap-4">
                                <span
                                    class="text-[0.65rem] font-semibold tracking-[0.2em] text-brand-rose uppercase"
                                >
                                    {{ post.category }}
                                </span>
                                <span class="h-px w-8 bg-brand-rose/50"></span>
                                <span
                                    class="font-serif text-sm text-brand-mauve italic"
                                >
                                    {{ post.date }}
                                </span>
                            </div>
                            <h3
                                class="mb-4 font-serif text-3xl text-brand-wine transition-colors group-hover:text-brand-rose md:text-4xl"
                            >
                                {{ post.title }}
                            </h3>
                            <p
                                class="mb-8 line-clamp-2 max-w-2xl leading-relaxed font-light text-brand-wine/70"
                            >
                                {{ post.excerpt }}
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
            </div>
        </section>

        <!-- ============================================ -->
        <!-- EMPTY STATE                                  -->
        <!-- ============================================ -->
        <section
            v-if="!posts || posts.length === 0"
            class="bg-brand-blush py-32 text-center"
        >
            <h2 class="font-serif text-4xl text-brand-wine italic">
                More stories coming soon.
            </h2>
        </section>
    </div>
</template>
