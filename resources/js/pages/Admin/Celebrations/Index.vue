<script setup>
import { ref, watch } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import {
    Plus,
    Edit,
    Trash2,
    CheckCircle,
    X,
    AlertCircle,
    CalendarHeart,
} from 'lucide-vue-next';

defineOptions({ layout: AppLayout });

const props = defineProps({
    celebrations: Array,
});

const breadcrumbs = [{ title: 'Celebrations', href: '/admin/celebrations' }];

// --- TOAST NOTIFICATION LOGIC ---
const page = usePage();
const flashMessage = ref(null);
watch(
    () => page.props.flash?.success,
    (msg) => {
        if (msg) {
            flashMessage.value = msg;
            setTimeout(() => (flashMessage.value = null), 5000);
        }
    },
    { immediate: true },
);

// --- CUSTOM DELETE MODAL LOGIC ---
const isModalOpen = ref(false);
const itemToDelete = ref(null);

const openDeleteModal = (item) => {
    itemToDelete.value = item;
    isModalOpen.value = true;
};

const closeDeleteModal = () => {
    isModalOpen.value = false;
    itemToDelete.value = null;
};

const confirmDelete = () => {
    if (itemToDelete.value) {
        router.delete('/admin/celebrations/' + itemToDelete.value.id, {
            onSuccess: () => closeDeleteModal(),
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <Head title="Manage Celebrations" />

    <!-- SUCCESS TOAST -->
    <transition
        enter-active-class="transform transition duration-500 ease-out"
        enter-from-class="translate-y-10 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-300 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="flashMessage"
            class="fixed right-8 bottom-8 z-[100] flex items-center gap-4 rounded-sm border-l-4 border-brand-rose bg-brand-wine px-6 py-4 text-brand-blush shadow-2xl"
        >
            <CheckCircle class="h-5 w-5 text-brand-rose" />
            <span class="text-xs font-semibold tracking-widest uppercase">{{
                flashMessage
            }}</span>
            <button @click="flashMessage = null">
                <X class="h-4 w-4 opacity-50 hover:opacity-100" />
            </button>
        </div>
    </transition>

    <!-- CUSTOM DELETE MODAL -->
    <Teleport to="body">
        <transition
            enter-active-class="ease-out duration-300"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="ease-in duration-200"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="isModalOpen"
                class="fixed inset-0 z-[200] flex items-center justify-center p-4"
            >
                <div
                    class="absolute inset-0 bg-brand-dark/70 backdrop-blur-md"
                    @click="closeDeleteModal"
                ></div>
                <div
                    class="relative w-full max-w-md rounded-sm border border-brand-rose/20 bg-brand-blush p-10 text-center shadow-2xl"
                >
                    <div
                        class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-red-50 text-red-600"
                    >
                        <Trash2 class="h-8 w-8" />
                    </div>
                    <h2 class="mb-4 font-serif text-3xl text-brand-wine">
                        Delete Celebration?
                    </h2>
                    <p
                        class="mb-10 text-sm leading-relaxed font-light text-brand-wine/60"
                    >
                        Are you sure you want to permanently remove
                        <span class="font-semibold text-brand-wine italic"
                            >"{{ itemToDelete?.title }}"</span
                        >
                        from your portfolio?
                    </p>
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <button
                            @click="closeDeleteModal"
                            class="flex-1 rounded-sm border border-brand-rose/50 px-8 py-3 text-[0.65rem] font-bold tracking-widest text-brand-wine uppercase transition-colors hover:bg-brand-light"
                        >
                            Cancel
                        </button>
                        <button
                            @click="confirmDelete"
                            class="flex-1 rounded-sm bg-red-800 px-8 py-3 text-[0.65rem] font-bold tracking-widest text-white uppercase shadow-md transition-colors hover:bg-red-900"
                        >
                            Confirm Delete
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </Teleport>

    <!-- MAIN PAGE UI -->
    <div class="mx-auto max-w-7xl p-6 md:p-10">
        <!-- Header -->
        <div
            class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end"
        >
            <div>
                <h1
                    class="mb-2 font-serif text-4xl text-brand-wine md:text-5xl"
                >
                    Portfolio: Celebrations
                </h1>
                <p class="text-sm font-light tracking-wide text-brand-wine/60">
                    Manage the event types displayed on your public services
                    page.
                </p>
            </div>
            <Link
                href="/admin/celebrations/create"
                class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-6 py-3 text-xs font-semibold tracking-widest text-brand-light uppercase shadow-md transition-colors hover:bg-brand-rose"
            >
                <Plus class="h-4 w-4" /> New Celebration
            </Link>
        </div>

        <!-- The Visual List -->
        <div
            class="overflow-hidden rounded-md border border-brand-rose/20 bg-white shadow-sm"
        >
            <div
                v-if="celebrations.length === 0"
                class="py-20 text-center text-brand-wine/40"
            >
                <CalendarHeart class="mx-auto mb-4 h-12 w-12 opacity-50" />
                <h3 class="font-serif text-xl">Your portfolio is empty.</h3>
                <p class="mt-2 text-sm font-light">
                    Add your first celebration type to display it on the public
                    site.
                </p>
            </div>

            <ul v-else class="divide-y divide-brand-rose/10">
                <li
                    v-for="item in celebrations"
                    :key="item.id"
                    class="group flex items-center justify-between p-4 transition-colors hover:bg-brand-blush/50 sm:p-6"
                >
                    <!-- Left Side: Image, Title, Order -->
                    <div class="flex items-center gap-6">
                        <img
                            :src="item.image"
                            class="hidden h-20 w-32 rounded-sm border border-brand-rose/10 object-cover shadow-sm sm:block"
                        />
                        <div>
                            <p
                                class="font-serif text-2xl text-brand-wine transition-colors group-hover:text-brand-rose"
                            >
                                {{ item.title }}
                            </p>
                            <div
                                class="mt-2 flex items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                            >
                                <span>Order:</span>
                                <span class="font-mono text-brand-mauve">{{
                                    item.sort_order
                                }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Actions -->
                    <div
                        class="flex items-center justify-end gap-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                    >
                        <Link
                            :href="`/admin/celebrations/${item.id}/edit`"
                            class="rounded-full p-2 text-brand-rose transition-colors hover:bg-brand-rose/10 hover:text-brand-wine"
                            title="Edit"
                        >
                            <Edit class="h-4 w-4" />
                        </Link>
                        <button
                            @click="openDeleteModal(item)"
                            class="rounded-full p-2 text-red-400 transition-colors hover:bg-red-50 hover:text-red-600"
                            title="Delete"
                        >
                            <Trash2 class="h-4 w-4" />
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
