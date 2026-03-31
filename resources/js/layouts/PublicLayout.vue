<script setup>
import Footer from '@/components/Footer.vue';
import Navigation from '@/components/Navigation.vue';
import Preloader from '@/components/Preloader.vue';
</script>

<template>
    <!-- SSR FIX: Ensure there is only ONE root node for the entire layout -->
    <div
        id="public-layout-root"
        class="flex min-h-screen flex-col bg-brand-blush font-sans text-brand-wine antialiased"
    >
        <Preloader />
        <Navigation />

        <!-- Main Content -->
        <main class="flex-grow">
            <slot />
        </main>

        <Footer />
    </div>
</template>
