<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Photography Credits | Almond-Blossoms Events" />

    <div
        class="flex min-h-screen flex-col items-center justify-center bg-brand-blush pt-40 pb-48 text-center"
    >
        <div class="mx-auto max-w-3xl px-6 lg:px-12">
            <div class="fade-up mb-16">
                <span class="mb-4 block font-signature text-5xl text-brand-rose"
                    >With Gratitude</span
                >
                <h1
                    class="mb-8 font-serif text-5xl leading-tight text-brand-wine md:text-6xl"
                >
                    Photography Credits
                </h1>

                <p
                    class="mx-auto max-w-xl font-sans text-lg leading-relaxed font-light text-brand-wine/80"
                >
                    My sincerest thanks to the following photographers and
                    videographers whose beautiful imagery can be found all over
                    this site.
                </p>
                <div class="mx-auto mt-12 h-px w-24 bg-brand-rose/30"></div>
            </div>

            <!-- Photographers List -->
            <div
                class="fade-up space-y-8 font-sans text-sm font-bold tracking-[0.2em] text-brand-wine uppercase"
                style="animation-delay: 0.2s"
            >
                <p
                    class="cursor-default transition-colors hover:text-brand-rose"
                >
                    Eva Tarnok
                </p>
                <p
                    class="cursor-default transition-colors hover:text-brand-rose"
                >
                    Neli Prahova
                </p>
                <p
                    class="cursor-default transition-colors hover:text-brand-rose"
                >
                    Farlie Photography
                </p>
            </div>
        </div>
    </div>
</template>
