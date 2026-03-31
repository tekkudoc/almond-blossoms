<script setup>
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import {
    Plus,
    Search,
    Filter,
    Edit,
    Trash2,
    Eye,
    PenTool,
    CheckCircle,
    X,
    AlertCircle,
    Image as ImageIcon
} from 'lucide-vue-next';
import { ref, watch } from 'vue';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';

defineOptions({ layout: AppLayout });

const props = defineProps({
    posts: Object // Expecting a paginated object
});

const searchQuery = ref('');

// --- TOAST NOTIFICATION LOGIC ---
const page = usePage();
const flashMessage = ref(null);

watch(() => page.props.flash?.success, (msg) => {
    if (msg) {
        flashMessage.value = msg;
        setTimeout(() => flashMessage.value = null, 5000);
    }
}, { immediate: true });

// --- CUSTOM DELETE MODAL LOGIC ---
const isModalOpen = ref(false);
const postToDelete = ref(null);

const openDeleteModal = (post) => {
    postToDelete.value = post;
    isModalOpen.value = true;
};

const closeDeleteModal = () => {
    isModalOpen.value = false;
    postToDelete.value = null;
};

const confirmDelete = () => {
    if (postToDelete.value) {
        router.delete('/admin/posts/' + postToDelete.value.id, {
            onSuccess: () => closeDeleteModal(),
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <Head title="Journal Management" />

    <!-- ========================================== -->
    <!-- SUCCESS TOAST NOTIFICATION                 -->
    <!-- ========================================== -->
    <transition enter-active-class="transform transition duration-500 ease-out" enter-from-class="translate-y-10 opacity-0" enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-300 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div v-if="flashMessage" class="fixed bottom-8 right-8 z-[100] bg-brand-wine text-brand-blush px-6 py-4 shadow-2xl rounded-sm flex items-center gap-4 border-l-4 border-brand-rose">
            <CheckCircle class="w-5 h-5 text-brand-rose" />
            <span class="text-xs font-semibold tracking-widest uppercase">{{ flashMessage }}</span>
            <button @click="flashMessage = null"><X class="w-4 h-4 opacity-50 hover:opacity-100" /></button>
        </div>
    </transition>

    <!-- ========================================== -->
    <!-- CUSTOM DELETE CONFIRMATION MODAL           -->
    <!-- ========================================== -->
    <transition enter-active-class="ease-out duration-300" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="ease-in duration-200" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div v-if="isModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-brand-dark/60 backdrop-blur-md" @click="closeDeleteModal"></div>
            <div class="relative bg-brand-blush w-full max-w-md p-10 shadow-2xl border border-brand-rose/20 rounded-sm text-center">
                <div class="w-16 h-16 bg-brand-light rounded-full flex items-center justify-center mx-auto mb-6">
                    <AlertCircle class="w-8 h-8 text-brand-wine" />
                </div>
                <h2 class="font-serif text-3xl text-brand-wine mb-4">Are you certain?</h2>
                <p class="text-brand-wine/60 font-light text-sm leading-relaxed mb-10">
                    You are about to delete <span class="italic font-semibold">"{{ postToDelete?.title }}"</span>. This action is elegant but permanent.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button @click="closeDeleteModal" class="flex-1 px-8 py-3 border border-brand-wine/20 text-brand-wine text-[0.65rem] font-bold uppercase tracking-widest hover:bg-brand-light transition-colors">Cancel</button>
                    <button @click="confirmDelete" class="flex-1 px-8 py-3 bg-brand-wine text-brand-blush text-[0.65rem] font-bold uppercase tracking-widest hover:bg-brand-dark transition-colors">Confirm Delete</button>
                </div>
            </div>
        </div>
    </transition>

    <!-- ========================================== -->
    <!-- MAIN PAGE UI                               -->
    <!-- ========================================== -->
    <div class="p-6 md:p-10 max-w-7xl mx-auto w-full">

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
            <div>
                <h1 class="font-serif text-4xl md:text-5xl text-brand-wine mb-2">The Journal</h1>
                <p class="text-brand-wine/60 text-sm tracking-wide font-light">Manage your musings, advice, and real wedding features.</p>
            </div>
            <Link href="/admin/posts/create" class="inline-flex items-center gap-2 bg-brand-wine text-brand-blush px-6 py-3 text-xs font-semibold tracking-widest uppercase rounded-sm hover:bg-brand-rose transition-colors shadow-md">
                <Plus class="w-4 h-4" /> New Post
            </Link>
        </div>

        <!-- Filters & Search Bar -->
        <div class="bg-white rounded-t-md shadow-sm border border-brand-rose/20 p-4 flex flex-col sm:flex-row justify-between items-center gap-4">
            <!-- Search -->
            <div class="relative w-full sm:w-96">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <Search class="h-4 w-4 text-brand-wine/40" />
                </div>
                <input
                    v-model="searchQuery"
                    type="text"
                    class="block w-full pl-10 pr-3 py-2 border border-brand-rose/30 rounded-sm leading-5 bg-brand-blush/50 placeholder-brand-wine/40 focus:outline-none focus:ring-1 focus:ring-brand-wine sm:text-sm text-brand-wine transition-colors"
                    placeholder="Search journal posts..."
                />
            </div>
            <!-- Filter Button -->
            <button class="inline-flex items-center gap-2 px-4 py-2 border border-brand-rose/30 bg-white text-brand-wine text-xs font-semibold tracking-widest uppercase rounded-sm hover:bg-brand-light transition-colors w-full sm:w-auto justify-center">
                <Filter class="w-4 h-4" /> Filter
            </button>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-b-md shadow-sm border border-t-0 border-brand-rose/20 overflow-x-auto">
            <table class="min-w-full divide-y divide-brand-rose/20">
                <thead class="bg-brand-light/50">
                <tr>
                    <th class="px-6 py-4 text-left text-[0.65rem] font-semibold text-brand-wine uppercase tracking-widest">Article</th>
                    <th class="px-6 py-4 text-left text-[0.65rem] font-semibold text-brand-wine uppercase tracking-widest">Category</th>
                    <th class="px-6 py-4 text-left text-[0.65rem] font-semibold text-brand-wine uppercase tracking-widest">Status</th>
                    <th class="px-6 py-4 text-left text-[0.65rem] font-semibold text-brand-wine uppercase tracking-widest">Date</th>
                    <th class="px-6 py-4 text-left text-[0.65rem] font-semibold text-brand-wine uppercase tracking-widest">Views</th>
                    <th class="px-6 py-4 text-right text-[0.65rem] font-semibold text-brand-wine uppercase tracking-widest">Actions</th>
                </tr>
                </thead>

                <tbody v-if="posts?.data?.length > 0" class="bg-white divide-y divide-brand-rose/10">
                <tr v-for="post in posts.data" :key="post.id" class="hover:bg-brand-light/30 transition-colors group">

                    <!-- Image & Title -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-sm overflow-hidden border border-brand-rose/20 bg-brand-light">
                                <img v-if="post.image" :src="post.image" class="h-full w-full object-cover" />
                                <ImageIcon v-else class="w-4 h-4 text-brand-rose/50 m-auto mt-4" />
                            </div>
                            <div class="ml-4">
                                <div class="font-serif font-semibold text-brand-wine text-lg">{{ post.title }}</div>
                            </div>
                        </div>
                    </td>

                    <!-- Category -->
                    <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex rounded-full border border-brand-rose/20 bg-brand-light/50 px-2.5 py-1 text-[0.65rem] leading-5 font-semibold tracking-widest text-brand-wine uppercase">
                                {{ post.category }}
                            </span>
                    </td>

                    <!-- Status Badge -->
                    <td class="px-6 py-4 whitespace-nowrap">
                            <span v-if="post.status === 'published'" class="inline-flex rounded-full border border-green-200 bg-green-50 px-2.5 py-1 text-[0.65rem] leading-5 font-semibold tracking-widest text-green-700 uppercase">
                                Published
                            </span>
                        <span v-else class="inline-flex rounded-full border border-gray-200 bg-gray-50 px-2.5 py-1 text-[0.65rem] leading-5 font-semibold tracking-widest text-gray-600 uppercase">
                                Draft
                            </span>
                    </td>

                    <!-- Date -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-brand-wine/70 font-light">
                        {{ post.date }}
                    </td>

                    <!-- Views -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-brand-wine/70 font-light">
                        {{ post.views?.toLocaleString() || 0 }}
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <a :href="'/journal/' + post.slug" target="_blank" class="text-brand-mauve hover:text-brand-wine transition-colors" title="View Public Page">
                                <Eye class="w-4 h-4" />
                            </a>
                            <Link :href="'/admin/posts/' + post.id + '/edit'" class="text-brand-rose hover:text-brand-wine transition-colors" title="Edit Post">
                                <Edit class="w-4 h-4" />
                            </Link>
                            <button @click="openDeleteModal(post)" class="text-red-400 hover:text-red-600 transition-colors" title="Delete Post">
                                <Trash2 class="w-4 h-4" />
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <!-- Empty State -->
            <div v-if="!posts?.data || posts.data.length === 0" class="text-center py-16">
                <PenTool class="mx-auto h-12 w-12 text-brand-rose/30 mb-4" />
                <h3 class="text-lg font-serif text-brand-wine">No journal posts yet</h3>
                <p class="mt-1 text-sm text-brand-wine/60 font-light mb-6">Get started by creating your first article.</p>
                <Link href="/admin/posts/create" class="inline-flex items-center gap-2 bg-brand-wine text-brand-blush px-6 py-3 text-xs font-semibold tracking-widest uppercase rounded-sm hover:bg-brand-rose transition-colors">
                    <Plus class="w-4 h-4" /> New Post
                </Link>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- PAGINATION                                 -->
        <!-- ========================================== -->
        <div v-if="posts?.data?.length > 0 && posts.meta" class="mt-6 flex items-center justify-between text-sm text-brand-wine/60 font-light">
            <p>Showing <span class="font-semibold text-brand-wine">{{ posts.meta.from }}</span> to <span class="font-semibold text-brand-wine">{{ posts.meta.to }}</span> of <span class="font-semibold text-brand-wine">{{ posts.meta.total }}</span> results</p>
            <div class="flex gap-2">
                <Link v-if="posts.links.prev" :href="posts.links.prev" class="px-3 py-1 border border-brand-rose/20 rounded-sm hover:bg-brand-light transition-colors uppercase text-[0.65rem] tracking-widest font-semibold text-brand-wine">Previous</Link>
                <button v-else disabled class="px-3 py-1 border border-brand-rose/20 rounded-sm opacity-50 cursor-not-allowed uppercase text-[0.65rem] tracking-widest font-semibold">Previous</button>

                <Link v-if="posts.links.next" :href="posts.links.next" class="px-3 py-1 border border-brand-rose/20 rounded-sm hover:bg-brand-light transition-colors uppercase text-[0.65rem] tracking-widest font-semibold text-brand-wine">Next</Link>
                <button v-else disabled class="px-3 py-1 border border-brand-rose/20 rounded-sm opacity-50 cursor-not-allowed uppercase text-[0.65rem] tracking-widest font-semibold">Next</button>
            </div>
        </div>

    </div>
</template>
