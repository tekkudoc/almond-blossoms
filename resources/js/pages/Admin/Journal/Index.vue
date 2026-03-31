<script setup>
import { Head, Link } from '@inertiajs/vue3';
import {
    Plus,
    Search,
    Filter,
    Edit,
    Trash2,
    Eye,
    PenTool,
} from 'lucide-vue-next';
import { ref } from 'vue';
// IMPORTANT: Make sure this path exactly matches your Admin Sidebar layout file!
import AppLayout from '@/layouts/AppLayout.vue';

defineOptions({ layout: AppLayout });

// DUMMY DATA
const posts = ref([
    {
        id: 1,
        title: 'Crafting the Perfect Wedding Day Timeline.',
        category: 'Advice & Planning',
        status: 'Published',
        date: 'May 14, 2026',
        views: 1240,
        image: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=200&auto=format&fit=crop',
    },
    {
        id: 2,
        title: 'The Ultimate Wedding Day Shot List.',
        category: 'Photography',
        status: 'Published',
        date: 'June 3, 2026',
        views: 890,
        image: 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?q=80&w=200&auto=format&fit=crop',
    },
    {
        id: 3,
        title: 'Vibrant: Styling with Colour and Tone.',
        category: 'Styling & Design',
        status: 'Draft',
        date: 'July 18, 2026',
        views: 0,
        image: 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=200&auto=format&fit=crop',
    },
]);

const searchQuery = ref('');
</script>

<template>
    <Head title="Journal Management | Almond-Blossoms" />

    <!-- EXPLICITLY WRAPPING THE PAGE CONTENT IN THE LAYOUT -->

    <div class="mx-auto w-full max-w-7xl p-6 md:p-10">
        <!-- Page Header -->
        <div
            class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center"
        >
            <div>
                <h1
                    class="mb-2 font-serif text-4xl text-brand-wine md:text-5xl"
                >
                    The Journal
                </h1>
                <p class="text-sm font-light tracking-wide text-brand-wine/60">
                    Manage your musings, advice, and real wedding features.
                </p>
            </div>

            <Link
                href="/admin/posts/create"
                class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-6 py-3 text-xs font-semibold tracking-widest text-brand-blush uppercase shadow-md transition-colors hover:bg-brand-rose hover:text-white"
            >
                <Plus class="h-4 w-4" />
                New Post
            </Link>
        </div>

        <!-- Filters & Search Bar -->
        <div
            class="flex flex-col items-center justify-between gap-4 rounded-t-md border border-brand-rose/20 bg-white p-4 shadow-sm sm:flex-row"
        >
            <!-- Search -->
            <div class="relative w-full sm:w-96">
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                >
                    <Search class="h-4 w-4 text-brand-wine/40" />
                </div>
                <input
                    v-model="searchQuery"
                    type="text"
                    class="block w-full rounded-sm border border-brand-rose/30 bg-brand-blush/50 py-2 pr-3 pl-10 leading-5 text-brand-wine placeholder-brand-wine/40 transition-colors focus:border-brand-wine focus:ring-1 focus:ring-brand-wine focus:outline-none sm:text-sm"
                    placeholder="Search journal posts..."
                />
            </div>

            <!-- Filter Button -->
            <button
                class="inline-flex w-full items-center justify-center gap-2 rounded-sm border border-brand-rose/30 bg-white px-4 py-2 text-xs font-semibold tracking-widest text-brand-wine uppercase transition-colors hover:bg-brand-light sm:w-auto"
            >
                <Filter class="h-4 w-4" />
                Filter
            </button>
        </div>

        <!-- Data Table -->
        <div
            class="overflow-x-auto rounded-b-md border border-t-0 border-brand-rose/20 bg-white shadow-sm"
        >
            <table class="min-w-full divide-y divide-brand-rose/20">
                <thead class="bg-brand-light/50">
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-4 text-left text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase"
                        >
                            Article
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 text-left text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase"
                        >
                            Category
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 text-left text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase"
                        >
                            Status
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 text-left text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase"
                        >
                            Date
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 text-left text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase"
                        >
                            Views
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 text-right text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody
                    v-if="posts.length > 0"
                    class="divide-y divide-brand-rose/10 bg-white"
                >
                    <tr
                        v-for="post in posts"
                        :key="post.id"
                        class="group transition-colors hover:bg-brand-light/30"
                    >
                        <!-- Image & Title -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-sm border border-brand-rose/20"
                                >
                                    <img
                                        :src="post.image"
                                        alt=""
                                        class="h-full w-full object-cover"
                                    />
                                </div>
                                <div class="ml-4">
                                    <div
                                        class="font-serif text-lg font-semibold text-brand-wine"
                                    >
                                        {{ post.title }}
                                    </div>
                                    <div
                                        class="mt-0.5 text-xs font-light text-brand-wine/50"
                                    >
                                        ID: #{{
                                            String(post.id).padStart(4, '0')
                                        }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Category -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex rounded-full border border-brand-rose/20 bg-brand-light px-2.5 py-1 text-[0.65rem] leading-5 font-semibold tracking-widest text-brand-wine uppercase"
                            >
                                {{ post.category }}
                            </span>
                        </td>

                        <!-- Status Badge -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                v-if="post.status === 'Published'"
                                class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-[0.65rem] leading-5 font-semibold tracking-widest text-green-800 uppercase"
                            >
                                Published
                            </span>
                            <span
                                v-else
                                class="inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-[0.65rem] leading-5 font-semibold tracking-widest text-gray-800 uppercase"
                            >
                                Draft
                            </span>
                        </td>

                        <!-- Date -->
                        <td
                            class="px-6 py-4 text-sm font-light whitespace-nowrap text-brand-wine/70"
                        >
                            {{ post.date }}
                        </td>

                        <!-- Views -->
                        <td
                            class="px-6 py-4 text-sm font-light whitespace-nowrap text-brand-wine/70"
                        >
                            {{ post.views.toLocaleString() }}
                        </td>

                        <!-- Actions -->
                        <td
                            class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap"
                        >
                            <div
                                class="flex items-center justify-end gap-3 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                            >
                                <a
                                    href="#"
                                    class="text-brand-mauve transition-colors hover:text-brand-wine"
                                    title="View Public Page"
                                >
                                    <Eye class="h-4 w-4" />
                                </a>
                                <Link
                                    href="#"
                                    class="text-brand-rose transition-colors hover:text-brand-wine"
                                    title="Edit Post"
                                >
                                    <Edit class="h-4 w-4" />
                                </Link>
                                <button
                                    class="text-red-400 transition-colors hover:text-red-600"
                                    title="Delete Post"
                                >
                                    <Trash2 class="h-4 w-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Empty State (if no posts) -->
            <div v-if="posts.length === 0" class="py-16 text-center">
                <PenTool class="mx-auto mb-4 h-12 w-12 text-brand-rose/30" />
                <h3 class="font-serif text-lg text-brand-wine">
                    No journal posts yet
                </h3>
                <p class="mt-1 mb-6 text-sm font-light text-brand-wine/60">
                    Get started by creating your first article.
                </p>
                <Link
                    href="/admin/posts/create"
                    class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-6 py-3 text-xs font-semibold tracking-widest text-brand-blush uppercase transition-colors hover:bg-brand-rose"
                >
                    <Plus class="h-4 w-4" />
                    New Post
                </Link>
            </div>
        </div>

        <!-- Pagination -->
        <div
            v-if="posts.length > 0"
            class="mt-6 flex items-center justify-between text-sm font-light text-brand-wine/60"
        >
            <p>
                Showing
                <span class="font-semibold text-brand-wine">1</span> to
                <span class="font-semibold text-brand-wine">3</span> of
                <span class="font-semibold text-brand-wine">3</span> results
            </p>
            <div class="flex gap-2">
                <button
                    disabled
                    class="cursor-not-allowed rounded-sm border border-brand-rose/20 px-3 py-1 text-[0.65rem] font-semibold tracking-widest uppercase opacity-50"
                >
                    Previous
                </button>
                <button
                    disabled
                    class="cursor-not-allowed rounded-sm border border-brand-rose/20 px-3 py-1 text-[0.65rem] font-semibold tracking-widest uppercase opacity-50"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>
