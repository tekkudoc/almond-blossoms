<script setup>
import { ref, onMounted } from 'vue';

// Default to true so it renders on the server correctly
const showPreloader = ref(true);

onMounted(() => {
    // Client-side evaluation
    if (sessionStorage.getItem('preloader_shown')) {
        showPreloader.value = false;
        document.body.classList.remove('lock-scroll-temp');
    } else {
        sessionStorage.setItem('preloader_shown', 'true');
        setTimeout(() => {
            showPreloader.value = false;
            document.body.classList.remove('lock-scroll-temp');
        }, 4500);
    }
});
</script>

<template>
    <!-- SSR FIX: v-show ensures the node is always rendered to prevent mismatch -->
    <div
        v-show="showPreloader"
        class="preloader pointer-events-none fixed inset-0 z-[100] flex items-center justify-center bg-brand-light"
    >
        <div
            class="preloader-logo z-20 flex animate-pulse flex-col items-center justify-center"
        >
            <span
                class="mb-4 font-serif text-7xl leading-none font-light tracking-tighter text-brand-wine italic md:text-9xl"
                >AB</span
            >
            <span
                class="font-serif text-sm tracking-[0.3em] text-brand-wine uppercase md:text-base"
                >Almond-Blossoms</span
            >
            <span
                class="mt-1 font-serif text-xs tracking-[0.2em] text-brand-mauve uppercase md:text-sm"
                >Events</span
            >
        </div>

        <!-- Leaves Layers -->
        <div class="absolute inset-0 z-0">
            <svg
                class="leaf text-brand-rose blur-[3px]"
                style="
                    --start-y: 10vh;
                    --end-y: 40vh;
                    --scale: 0.4;
                    --rot: 360deg;
                    --max-opacity: 0.4;
                    --duration: 5s;
                    --delay: 0s;
                    width: 30px;
                "
                viewBox="0 0 100 100"
                fill="currentColor"
            >
                <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
            </svg>
            <svg
                class="leaf text-brand-mauve blur-[4px]"
                style="
                    --start-y: 80vh;
                    --end-y: 20vh;
                    --scale: 0.5;
                    --rot: -420deg;
                    --max-opacity: 0.3;
                    --duration: 5.5s;
                    --delay: 0.2s;
                    width: 35px;
                "
                viewBox="0 0 100 100"
                fill="currentColor"
            >
                <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
            </svg>
        </div>
        <div class="absolute inset-0 z-10">
            <svg
                class="leaf text-brand-wine blur-[1px]"
                style="
                    --start-y: 20vh;
                    --end-y: -10vh;
                    --scale: 0.8;
                    --rot: -270deg;
                    --max-opacity: 0.6;
                    --duration: 3.5s;
                    --delay: 0.1s;
                    width: 40px;
                "
                viewBox="0 0 100 100"
                fill="currentColor"
            >
                <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
            </svg>
        </div>
        <div class="pointer-events-none absolute inset-0 z-30">
            <svg
                class="leaf text-brand-rose"
                style="
                    --start-y: 70vh;
                    --end-y: 10vh;
                    --scale: 1.2;
                    --rot: -420deg;
                    --max-opacity: 0.8;
                    --duration: 3.1s;
                    --delay: 0.3s;
                    width: 45px;
                "
                viewBox="0 0 100 100"
                fill="currentColor"
            >
                <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
            </svg>
        </div>
    </div>
</template>
