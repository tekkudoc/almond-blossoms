<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';

const visible = ref(false);
let hideTimer = null;

const playPreloader = () => {
    // Clear any in-progress hide timer from a previous navigation
    clearTimeout(hideTimer);

    // Lock scroll and show
    document.body.classList.add('lock-scroll-temp');
    visible.value = true;

    // Hide after animation completes (matches the 4.5s CSS animation)
    hideTimer = setTimeout(() => {
        visible.value = false;
        document.body.classList.remove('lock-scroll-temp');
    }, 4500);
};

let removeStart = null;

onMounted(() => {
    // Play on the initial hard load / refresh
    playPreloader();

    // Play again on every subsequent Inertia navigation (SPA page change)
    removeStart = router.on('start', () => {
        playPreloader();
    });
});

onUnmounted(() => {
    clearTimeout(hideTimer);
    if (removeStart) removeStart();
});
</script>

<template>
    <Transition
        enter-active-class="transition-opacity duration-200"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-500"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="visible"
            class="preloader pointer-events-none fixed inset-0 z-[100] flex items-center justify-center overflow-hidden bg-brand-light"
        >
            <div
                class="preloader-logo z-20 flex flex-col items-center justify-center"
            >
                <div
                    class="flex flex-col items-center text-center text-brand-wine"
                >
                    <!-- Swirly Monogram remains cursive (Lavishly Yours) -->
                    <span
                        class="mb-4 font-serif text-7xl leading-none font-light tracking-tighter italic md:text-9xl"
                        >AB</span
                    >

                    <!-- Brand Name: Changed to font-sans (Georgia) for luxury magazine feel -->
                    <span
                        class="font-sans text-[0.7rem] font-bold tracking-[0.4em] uppercase md:text-xs"
                    >
                        Almond-Blossoms
                    </span>
                    <span
                        class="mt-1 font-sans text-[0.6rem] font-bold tracking-[0.3em] text-brand-mauve uppercase md:text-[0.7rem]"
                    >
                        Events
                    </span>
                </div>
            </div>

            <!-- Layer 1: Deep Background -->
            <div class="absolute inset-0 z-0">
                <svg
                    class="leaf text-brand-rose blur-[3px]"
                    style="
                        --start-y: 10vh;
                        --end-y: 40vh;
                        --scale: 0.4;
                        --rot: 360deg;
                        --max-opacity: 0.4;
                        --duration: 5.5s;
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
                        --duration: 6s;
                        --delay: 0.2s;
                        width: 35px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-wine blur-[3px]"
                    style="
                        --start-y: 30vh;
                        --end-y: 70vh;
                        --scale: 0.3;
                        --rot: 500deg;
                        --max-opacity: 0.2;
                        --duration: 6.2s;
                        --delay: 0.4s;
                        width: 25px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-white blur-[2px]"
                    style="
                        --start-y: 60vh;
                        --end-y: -10vh;
                        --scale: 0.6;
                        --rot: -200deg;
                        --max-opacity: 0.5;
                        --duration: 5.8s;
                        --delay: 0.1s;
                        width: 40px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
            </div>

            <!-- Layer 2: Midground -->
            <div class="absolute inset-0 z-10">
                <svg
                    class="leaf text-brand-wine blur-[1px]"
                    style="
                        --start-y: 20vh;
                        --end-y: -10vh;
                        --scale: 0.8;
                        --rot: -270deg;
                        --max-opacity: 0.6;
                        --duration: 4s;
                        --delay: 0.1s;
                        width: 40px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-rose blur-[1px]"
                    style="
                        --start-y: 50vh;
                        --end-y: 80vh;
                        --scale: 0.9;
                        --rot: 360deg;
                        --max-opacity: 0.7;
                        --duration: 4.2s;
                        --delay: 0.3s;
                        width: 35px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-mauve blur-[2px]"
                    style="
                        --start-y: 70vh;
                        --end-y: 20vh;
                        --scale: 0.7;
                        --rot: -180deg;
                        --max-opacity: 0.5;
                        --duration: 4.5s;
                        --delay: 0.5s;
                        width: 30px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-white blur-[1px]"
                    style="
                        --start-y: 10vh;
                        --end-y: 60vh;
                        --scale: 0.8;
                        --rot: 240deg;
                        --max-opacity: 0.8;
                        --duration: 4.1s;
                        --delay: 0.2s;
                        width: 45px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
            </div>

            <!-- Layer 3: Foreground -->
            <div class="pointer-events-none absolute inset-0 z-30">
                <svg
                    class="leaf text-brand-wine"
                    style="
                        --start-y: 40vh;
                        --end-y: 80vh;
                        --scale: 1.4;
                        --rot: 360deg;
                        --max-opacity: 0.9;
                        --duration: 3s;
                        --delay: 0s;
                        width: 50px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-rose"
                    style="
                        --start-y: 70vh;
                        --end-y: 10vh;
                        --scale: 1.2;
                        --rot: -420deg;
                        --max-opacity: 0.8;
                        --duration: 3.2s;
                        --delay: 0.3s;
                        width: 45px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-mauve"
                    style="
                        --start-y: 10vh;
                        --end-y: 50vh;
                        --scale: 1.5;
                        --rot: 280deg;
                        --max-opacity: 0.9;
                        --duration: 2.8s;
                        --delay: 0.5s;
                        width: 55px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-white"
                    style="
                        --start-y: 90vh;
                        --end-y: -10vh;
                        --scale: 1.3;
                        --rot: -360deg;
                        --max-opacity: 0.9;
                        --duration: 3.1s;
                        --delay: 0.2s;
                        width: 48px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-wine"
                    style="
                        --start-y: 5vh;
                        --end-y: 65vh;
                        --scale: 1.6;
                        --rot: 180deg;
                        --max-opacity: 0.95;
                        --duration: 2.7s;
                        --delay: 0.7s;
                        width: 60px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-rose"
                    style="
                        --start-y: 85vh;
                        --end-y: 20vh;
                        --scale: 1.45;
                        --rot: -210deg;
                        --max-opacity: 0.85;
                        --duration: 2.9s;
                        --delay: 0.8s;
                        width: 52px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
            </div>

            <!-- Layer 4: Micro Petals -->
            <div class="pointer-events-none absolute inset-0 z-20">
                <svg
                    class="leaf text-brand-rose"
                    style="
                        --start-y: 15vh;
                        --end-y: 85vh;
                        --scale: 0.3;
                        --rot: 720deg;
                        --max-opacity: 0.7;
                        --duration: 4.8s;
                        --delay: 0.1s;
                        width: 15px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-white"
                    style="
                        --start-y: 75vh;
                        --end-y: 5vh;
                        --scale: 0.2;
                        --rot: -540deg;
                        --max-opacity: 0.8;
                        --duration: 4.2s;
                        --delay: 0.4s;
                        width: 12px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-mauve"
                    style="
                        --start-y: 45vh;
                        --end-y: 95vh;
                        --scale: 0.25;
                        --rot: 360deg;
                        --max-opacity: 0.6;
                        --duration: 4.4s;
                        --delay: 0.6s;
                        width: 18px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-wine"
                    style="
                        --start-y: 85vh;
                        --end-y: 35vh;
                        --scale: 0.35;
                        --rot: -720deg;
                        --max-opacity: 0.7;
                        --duration: 5s;
                        --delay: 0.2s;
                        width: 20px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
                <svg
                    class="leaf text-brand-rose"
                    style="
                        --start-y: 25vh;
                        --end-y: -15vh;
                        --scale: 0.2;
                        --rot: 480deg;
                        --max-opacity: 0.8;
                        --duration: 4s;
                        --delay: 0.9s;
                        width: 14px;
                    "
                    viewBox="0 0 100 100"
                    fill="currentColor"
                >
                    <path d="M10,90 Q10,10 90,10 Q90,90 10,90 Z" />
                </svg>
            </div>
        </div>
    </Transition>
</template>

<style scoped>
/*
  NOTE: The leaf animation uses CSS custom properties (--delay, --duration) set
  via inline styles. Because v-if tears down and remounts the DOM on each
  navigation, the CSS animations restart from scratch automatically — no JS
  needed to reset them.
*/
.preloader-logo {
    animation: pulseLogo 4s ease-in-out forwards;
}
@keyframes pulseLogo {
    0% {
        opacity: 0;
        transform: scale(0.95);
    }
    20% {
        opacity: 1;
        transform: scale(1);
    }
    80% {
        opacity: 1;
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(1.05);
    }
}

.leaf {
    position: absolute;
    left: -10vw;
    opacity: 0;
    will-change: transform, opacity;
    animation-name: windSweep;
    animation-timing-function: cubic-bezier(0.35, 0.1, 0.25, 1);
    animation-fill-mode: forwards;
    animation-duration: var(--duration);
    animation-delay: var(--delay);
}
@keyframes windSweep {
    0% {
        transform: translate3d(0, var(--start-y), 0) rotate(0deg)
            scale(var(--scale));
        opacity: 0;
    }
    15% {
        opacity: var(--max-opacity);
    }
    85% {
        opacity: var(--max-opacity);
    }
    100% {
        transform: translate3d(120vw, var(--end-y), 0) rotate(var(--rot))
            scale(var(--scale));
        opacity: 0;
    }
}
</style>
