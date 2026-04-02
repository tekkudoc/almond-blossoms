<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';
import Navigation from '@/components/Navigation.vue';
import Footer from '@/components/Footer.vue';
import Preloader from '@/components/Preloader.vue';

// 1. Set to true so it plays immediately on the first website visit
const showPreloader = ref(true);

// 2. Hide it after 3.5 seconds (the length of your leaf animation)
let timeoutId: ReturnType<typeof setTimeout>;

const hidePreloader = () => {
    timeoutId = setTimeout(() => {
        showPreloader.value = false;
    }, 3500);
};

onMounted(() => {
    hidePreloader();
});

// 3. Magic SPA Hook: Whenever a user clicks a link, show it again!
const removeStartListener = router.on('start', () => {
    clearTimeout(timeoutId);
    showPreloader.value = true;
});

// 4. Magic SPA Hook: When the new page finishes loading, hide it again!
const removeFinishListener = router.on('finish', () => {
    hidePreloader();
});

// Clean up listeners if the layout is ever destroyed
onUnmounted(() => {
    removeStartListener();
    removeFinishListener();
    clearTimeout(timeoutId);
});
</script>

<template>
    <div class="flex min-h-screen flex-col bg-brand-blush">
        <Navigation />

        <main class="relative flex-grow">
            <!--
                Because we use v-if, Vue completely destroys and rebuilds the Preloader.
                This means the CSS animations and the Wind Audio restart perfectly from zero every time!
            -->
            <Preloader v-if="showPreloader" />

            <!-- Page Content -->
            <slot />
        </main>

        <Footer />
    </div>
</template>
