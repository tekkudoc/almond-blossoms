<script>
import PublicLayout from '@/Layouts/PublicLayout.vue';
export default { layout: PublicLayout };
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    post: Object, // Passed directly from the JournalController
});
</script>

<template>
    <Head>
        <title>{{ post.seo_title }} | Almond-Blossoms</title>
        <meta name="description" :content="post.seo_description" />
    </Head>

    <main class="pt-32">
        <!-- TITLE BLOCK -->
        <section
            class="fade-up mx-auto max-w-4xl px-6 pt-16 pb-12 text-center lg:pt-24 lg:pb-16"
        >
            <div class="mb-8 flex items-center justify-center gap-4">
                <Link
                    href="/journal"
                    class="text-[0.65rem] font-semibold tracking-[0.2em] text-brand-rose uppercase transition-colors hover:text-brand-wine"
                    >Journal</Link
                >
                <span class="h-px w-4 bg-brand-rose/50"></span>
                <span class="font-serif text-sm text-brand-mauve italic">{{
                    post.category
                }}</span>
            </div>
            <h1
                class="mb-10 px-4 font-serif text-5xl leading-[1.05] text-brand-wine md:text-7xl lg:text-8xl"
            >
                {{ post.title }}
            </h1>
            <div class="mt-8 flex items-center justify-center gap-6">
                <div class="flex flex-col text-center">
                    <span
                        class="text-xs font-semibold tracking-widest text-brand-wine uppercase"
                        >Words by Judith</span
                    >
                    <span
                        class="mt-1 font-serif text-sm text-brand-mauve italic"
                        >{{ post.date }}</span
                    >
                </div>
            </div>
        </section>

        <!-- FEATURE IMAGE -->
        <section
            v-if="post.image"
            class="fade-up mx-auto mb-16 max-w-[100rem] px-4 lg:mb-24 lg:px-8"
        >
            <div
                class="relative aspect-[16/9] w-full overflow-hidden rounded-sm bg-brand-light shadow-xl md:aspect-[21/9]"
            >
                <img
                    :src="post.image"
                    class="h-full w-full object-cover object-center"
                    :alt="post.title"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-t from-brand-dark/20 to-transparent"
                ></div>
            </div>
        </section>

        <!-- THE DYNAMIC ARTICLE CONTENT -->
        <section class="mx-auto max-w-3xl px-6 pb-32">
            <!-- This v-html safely injects the HTML from Quill Editor! -->
            <div
                class="prose-custom text-lg leading-relaxed font-light text-brand-wine/80 md:text-xl"
                v-html="post.content"
            ></div>

            <!-- Signature Block -->
            <div class="mt-20 border-t border-brand-rose/20 pt-12">
                <div class="mb-12 flex items-center gap-6">
                    <div
                        class="-rotate-2 font-signature text-6xl leading-none text-brand-rose/90"
                    >
                        Judith
                    </div>
                    <div class="flex flex-col text-left">
                        <span
                            class="text-[0.65rem] font-semibold tracking-[0.2em] text-brand-wine uppercase"
                            >Judith</span
                        >
                        <span
                            class="mt-1 font-serif text-sm text-brand-mauve italic"
                            >Founder & Lead Planner</span
                        >
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<style>
/* CSS rules applied to the injected v-html content */
.prose-custom p {
    margin-bottom: 2rem;
}
.prose-custom h1,
.prose-custom h2 {
    font-family: 'Cormorant Garamond', serif;
    color: #5a182c;
    font-size: 2.5rem;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
}
.prose-custom h3 {
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-size: 1.75rem;
    color: #5a182c;
    margin-top: 2rem;
    margin-bottom: 1rem;
}
.prose-custom blockquote {
    text-align: center;
    padding: 3rem 2rem;
    background: rgba(245, 230, 232, 0.5); /* brand-light */
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-size: 2rem;
    color: #5a182c;
    margin: 4rem 0;
    border-radius: 4px;
}
.prose-custom ul {
    list-style-type: disc;
    margin-left: 2rem;
    margin-bottom: 2rem;
}
.prose-custom ol {
    list-style-type: decimal;
    margin-left: 2rem;
    margin-bottom: 2rem;
}
</style>
