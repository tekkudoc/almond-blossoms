<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });

defineProps({
    post: Object, // This would come from your Laravel controller
});
</script>

<template>
    <Head :title="post.title" />

    <article class="pt-32 pb-20">
        <section class="fade-up mx-auto mb-16 max-w-4xl px-6 text-center">
            <h1
                class="mb-10 font-serif text-5xl leading-tight text-brand-wine md:text-8xl"
            >
                {{ post.title }}
            </h1>
            <div class="flex items-center justify-center gap-6">
                <div
                    class="-rotate-2 font-signature text-6xl leading-none text-brand-rose/90"
                >
                    Judith
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-3xl px-6">
            <!-- This allows you to render the HTML content stored in your DB -->
            <div
                class="drop-cap text-lg leading-relaxed font-light text-brand-wine/80 md:text-xl"
                v-html="post.content"
            ></div>
        </section>
    </article>
</template>
