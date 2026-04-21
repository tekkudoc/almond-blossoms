<script setup>
import { ref, watch } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import {
    Mail,
    MailOpen,
    Trash2,
    Calendar,
    User,
    Phone,
    Tag,
    X,
    CheckCircle,
    AlertCircle,
    BellDot,
    EyeOff,
    MapPin,
    PoundSterling,
    Users,
    Search,
} from 'lucide-vue-next';

defineOptions({ layout: AppLayout });

const props = defineProps({
    inquiries: Object,
    metrics: Object,
});

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

// --- SLIDE-OVER READING PANE LOGIC ---
const selectedInquiry = ref(null);
const isReadingPaneOpen = ref(false);

const openInquiry = (inquiry) => {
    selectedInquiry.value = inquiry;
    isReadingPaneOpen.value = true;
    document.body.style.overflow = 'hidden';

    // Mark as read in DB if it's unread
    if (inquiry.status === 'unread') {
        router.put(
            `/admin/inquiries/${inquiry.id}/read`,
            {},
            {
                preserveScroll: true,
                preserveState: true,
            },
        );
        inquiry.status = 'read';
        if (props.metrics.unread > 0) props.metrics.unread--;
    }
};

const markAsUnread = () => {
    if (selectedInquiry.value) {
        router.put(
            `/admin/inquiries/${selectedInquiry.value.id}/unread`,
            {},
            {
                preserveScroll: true,
                preserveState: true,
            },
        );

        selectedInquiry.value.status = 'unread';
        props.metrics.unread++;
        closePane();
    }
};

const closePane = () => {
    isReadingPaneOpen.value = false;
    document.body.style.overflow = '';
    setTimeout(() => {
        selectedInquiry.value = null;
    }, 500);
};

// --- CUSTOM DELETE MODAL LOGIC ---
const isDeleteModalOpen = ref(false);
const inquiryToDelete = ref(null);

const openDeleteModal = (inquiry) => {
    // FIX 1: Unwrap the ref if a ref object is accidentally passed (e.g. from pane header)
    inquiryToDelete.value = inquiry?.value ?? inquiry;
    isDeleteModalOpen.value = true;
};

const closeDeleteModal = () => {
    isDeleteModalOpen.value = false;
    inquiryToDelete.value = null;
};

const confirmDelete = () => {
    if (inquiryToDelete.value) {
        // FIX 2: Capture the ID before closeDeleteModal() nulls out inquiryToDelete
        const deletingId = inquiryToDelete.value.id;

        router.delete(`/admin/inquiries/${deletingId}`, {
            preserveScroll: true,
            onSuccess: () => {
                closeDeleteModal();
                // FIX 3: Use the captured ID for the comparison, not the now-null ref
                if (selectedInquiry.value?.id === deletingId) {
                    closePane();
                }
            },
        });
    }
};

const formatEventType = (type) => {
    const types = {
        wedding: 'Bespoke Wedding',
        celebration: 'Luxury Event',
        creche: 'Events Creche',
        power_hour: 'Power Hour',
        other: 'Other Inquiry',
    };
    return types[type] || type;
};
</script>

<template>
    <Head title="Inquiries | Almond-Blossoms" />

    <!-- ALERTS & MODALS -->
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
                v-if="isDeleteModalOpen"
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
                        Delete Inquiry?
                    </h2>
                    <p
                        class="mb-10 text-sm leading-relaxed font-light text-brand-wine/60"
                    >
                        Are you sure you want to permanently delete the message
                        from
                        <span class="font-semibold text-brand-wine italic"
                            >"{{ inquiryToDelete?.first_name }}
                            {{ inquiryToDelete?.last_name }}"</span
                        >? This cannot be undone.
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
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </Teleport>

    <!-- ========================================== -->
    <!-- MAIN INBOX UI                              -->
    <!-- ========================================== -->
    <div class="relative mx-auto w-full max-w-7xl p-6 md:p-10">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="mb-2 font-serif text-4xl text-brand-wine md:text-5xl">
                Inquiries
            </h1>
            <p class="text-sm font-light tracking-wide text-brand-wine/60">
                Your prospective clients and event leads.
            </p>
        </div>

        <!-- KPI Metric Bar -->
        <div class="mb-10 grid grid-cols-2 gap-4 md:grid-cols-4">
            <div
                class="group relative flex flex-col justify-center overflow-hidden rounded-sm border border-brand-rose/20 bg-white p-6 shadow-sm"
            >
                <div
                    class="absolute -top-4 -right-4 h-16 w-16 rounded-full bg-brand-rose/10 transition-transform duration-500 group-hover:scale-150"
                ></div>
                <span
                    class="mb-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                    >Unread Leads</span
                >
                <div class="flex items-center gap-3">
                    <span class="font-serif text-4xl text-brand-wine">{{
                        metrics.unread
                    }}</span>
                    <BellDot
                        v-if="metrics.unread > 0"
                        class="h-4 w-4 animate-pulse text-brand-rose"
                    />
                </div>
            </div>
            <div
                class="flex flex-col justify-center rounded-sm border border-brand-rose/20 bg-white p-6 shadow-sm"
            >
                <span
                    class="mb-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                    >Weddings</span
                >
                <span class="font-serif text-3xl text-brand-wine/80">{{
                    metrics.weddings
                }}</span>
            </div>
            <div
                class="flex flex-col justify-center rounded-sm border border-brand-rose/20 bg-white p-6 shadow-sm"
            >
                <span
                    class="mb-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                    >Celebrations</span
                >
                <span class="font-serif text-3xl text-brand-wine/80">{{
                    metrics.celebrations
                }}</span>
            </div>
            <div
                class="flex flex-col justify-center rounded-sm border border-brand-rose/20 bg-white p-6 shadow-sm"
            >
                <span
                    class="mb-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                    >Creche Services</span
                >
                <span class="font-serif text-3xl text-brand-wine/80">{{
                    metrics.creche
                }}</span>
            </div>
        </div>

        <!-- The Inbox List -->
        <div
            class="overflow-hidden rounded-md border border-brand-rose/20 bg-white shadow-[0_4px_20px_-10px_rgba(90,24,44,0.1)]"
        >
            <div
                v-if="!inquiries?.data || inquiries.data.length === 0"
                class="p-16 text-center text-brand-wine/40"
            >
                <Mail class="mx-auto mb-4 h-12 w-12 opacity-50" />
                <p class="font-serif text-xl">Your inbox is empty.</p>
                <p class="mt-2 text-sm font-light">
                    New form submissions will appear here.
                </p>
            </div>

            <ul v-else class="divide-y divide-brand-rose/10">
                <li
                    v-for="inquiry in inquiries.data"
                    :key="inquiry.id"
                    @click="openInquiry(inquiry)"
                    class="group flex cursor-pointer items-center justify-between border-l-[3px] p-4 transition-all duration-300 sm:p-6"
                    :class="[
                        inquiry.status === 'unread'
                            ? 'border-brand-rose bg-brand-blush/80 shadow-[inset_0_0_20px_rgba(205,159,174,0.05)] hover:bg-brand-blush'
                            : 'border-transparent bg-white hover:bg-brand-light/30',
                    ]"
                >
                    <div
                        class="flex min-w-0 flex-1 items-center gap-4 sm:gap-6"
                    >
                        <!-- Dynamic Icon -->
                        <div class="relative hidden shrink-0 sm:block">
                            <Mail
                                v-if="inquiry.status === 'unread'"
                                class="h-5 w-5 fill-brand-rose/10 text-brand-rose"
                            />
                            <div
                                v-if="inquiry.status === 'unread'"
                                class="absolute -top-1 -right-1 h-2 w-2 animate-ping rounded-full bg-brand-rose"
                            ></div>
                            <MailOpen
                                v-if="inquiry.status !== 'unread'"
                                class="h-5 w-5 text-brand-wine/20"
                            />
                        </div>

                        <!-- Content Summary -->
                        <div
                            class="grid min-w-0 flex-1 grid-cols-1 items-center gap-2 sm:grid-cols-12 sm:gap-4"
                        >
                            <!-- Name -->
                            <div
                                class="truncate text-base sm:col-span-3"
                                :class="
                                    inquiry.status === 'unread'
                                        ? 'font-bold text-brand-wine'
                                        : 'font-medium text-brand-wine/60'
                                "
                            >
                                {{ inquiry.first_name }} {{ inquiry.last_name }}
                            </div>

                            <!-- Category Badge -->
                            <div class="sm:col-span-3">
                                <span
                                    class="truncate rounded-sm border px-2 py-1 text-[0.6rem] tracking-widest uppercase"
                                    :class="
                                        inquiry.status === 'unread'
                                            ? 'border-brand-rose bg-white font-bold text-brand-wine'
                                            : 'border-transparent bg-brand-light/50 font-semibold text-brand-wine/50'
                                    "
                                >
                                    {{ formatEventType(inquiry.event_type) }}
                                </span>
                            </div>

                            <!-- Message Preview -->
                            <div
                                class="truncate text-sm sm:col-span-6"
                                :class="
                                    inquiry.status === 'unread'
                                        ? 'font-medium text-brand-wine/80'
                                        : 'font-light text-brand-wine/40'
                                "
                            >
                                {{ inquiry.message }}
                            </div>
                        </div>
                    </div>

                    <!-- Date & Delete -->
                    <div class="ml-4 flex shrink-0 items-center gap-4">
                        <span
                            class="hidden text-xs tracking-widest whitespace-nowrap uppercase sm:block"
                            :class="
                                inquiry.status === 'unread'
                                    ? 'font-bold text-brand-rose'
                                    : 'font-semibold text-brand-wine/30'
                            "
                        >
                            {{ inquiry.date_received }}
                        </span>
                        <button
                            @click.stop="openDeleteModal(inquiry)"
                            class="rounded-full p-2 text-brand-wine/20 opacity-0 transition-colors group-hover:opacity-100 hover:bg-red-50 hover:text-red-500"
                        >
                            <Trash2 class="h-4 w-4" />
                        </button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Pagination -->
        <div
            v-if="inquiries?.data?.length > 0 && inquiries?.meta?.last_page > 1"
            class="mt-6 flex items-center justify-between text-sm font-light text-brand-wine/60"
        >
            <p>
                Showing
                <span class="font-semibold text-brand-wine">{{
                    inquiries.meta.from
                }}</span>
                to
                <span class="font-semibold text-brand-wine">{{
                    inquiries.meta.to
                }}</span>
                of
                <span class="font-semibold text-brand-wine">{{
                    inquiries.meta.total
                }}</span>
            </p>
            <div class="flex gap-2">
                <Link
                    v-if="inquiries.links.prev"
                    :href="inquiries.links.prev"
                    class="rounded-sm border border-brand-rose/20 px-3 py-1 text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase hover:bg-brand-light"
                    >Prev</Link
                >
                <button
                    v-else
                    disabled
                    class="cursor-not-allowed rounded-sm border border-brand-rose/20 px-3 py-1 text-[0.65rem] font-semibold tracking-widest uppercase opacity-50"
                >
                    Prev
                </button>
                <Link
                    v-if="inquiries.links.next"
                    :href="inquiries.links.next"
                    class="rounded-sm border border-brand-rose/20 px-3 py-1 text-[0.65rem] font-semibold tracking-widest text-brand-wine uppercase hover:bg-brand-light"
                    >Next</Link
                >
                <button
                    v-else
                    disabled
                    class="cursor-not-allowed rounded-sm border border-brand-rose/20 px-3 py-1 text-[0.65rem] font-semibold tracking-widest uppercase opacity-50"
                >
                    Next
                </button>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- SLIDE-OVER READING PANE                    -->
        <!-- ========================================== -->
        <Teleport to="body">
            <div class="relative z-[100]">
                <!-- Dark Backdrop -->
                <transition
                    appear
                    enter-active-class="ease-in-out duration-500"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="ease-in-out duration-500"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div
                        v-if="isReadingPaneOpen"
                        class="fixed inset-0 cursor-pointer bg-brand-dark/40 backdrop-blur-sm"
                        @click="closePane"
                    ></div>
                </transition>

                <!-- Sliding Panel -->
                <transition
                    appear
                    enter-active-class="transform transition ease-in-out duration-500"
                    enter-from-class="translate-x-full"
                    enter-to-class="translate-x-0"
                    leave-active-class="transform transition ease-in-out duration-500"
                    leave-from-class="translate-x-0"
                    leave-to-class="translate-x-full"
                >
                    <div
                        v-if="isReadingPaneOpen"
                        class="fixed inset-y-0 right-0 flex h-full w-full max-w-2xl flex-col border-l border-brand-rose/30 bg-brand-blush shadow-2xl"
                    >
                        <!-- Pane Header -->
                        <div
                            class="flex shrink-0 items-center justify-between border-b border-brand-rose/20 bg-white/80 px-8 py-6 backdrop-blur-md"
                        >
                            <h2 class="font-serif text-3xl text-brand-wine">
                                Inquiry Details
                            </h2>

                            <div class="flex items-center gap-6">
                                <button
                                    @click="markAsUnread"
                                    class="flex items-center gap-2 text-brand-wine/50 transition-colors hover:text-brand-wine focus:outline-none"
                                    title="Mark as Unread"
                                >
                                    <EyeOff class="h-4 w-4" />
                                    <span
                                        class="hidden text-[0.65rem] font-semibold tracking-widest uppercase sm:inline"
                                        >Mark Unread</span
                                    >
                                </button>
                                <div class="h-4 w-px bg-brand-rose/30"></div>
                                <!-- FIX: Pass selectedInquiry.value, not the ref itself -->
                                <button
                                    @click="
                                        openDeleteModal(selectedInquiry.value)
                                    "
                                    class="text-brand-wine/50 transition-colors hover:text-red-500 focus:outline-none"
                                    title="Delete Inquiry"
                                >
                                    <Trash2 class="h-4 w-4" />
                                </button>
                                <button
                                    @click="closePane"
                                    class="-mr-2 p-2 text-brand-wine/50 transition-colors hover:text-brand-wine focus:outline-none"
                                    title="Close Pane"
                                >
                                    <X class="h-6 w-6" />
                                </button>
                            </div>
                        </div>

                        <!-- Pane Content -->
                        <div class="flex-1 overflow-y-auto p-8">
                            <!-- PRIMARY CONTACT INFO -->
                            <div
                                class="mb-6 space-y-4 rounded-md border border-brand-rose/10 bg-white p-6 shadow-sm"
                            >
                                <div
                                    class="flex items-center gap-4 text-brand-wine"
                                >
                                    <User
                                        class="h-4 w-4 shrink-0 text-brand-rose"
                                    />
                                    <span class="text-lg font-semibold"
                                        >{{ selectedInquiry.first_name }}
                                        {{ selectedInquiry.last_name }}</span
                                    >
                                </div>
                                <div
                                    class="flex items-center gap-4 text-brand-wine"
                                >
                                    <Mail
                                        class="h-4 w-4 shrink-0 text-brand-rose"
                                    />
                                    <a
                                        :href="
                                            'mailto:' + selectedInquiry.email
                                        "
                                        class="cursor-pointer text-sm text-brand-wine/80 underline transition-colors hover:text-brand-rose"
                                        >{{ selectedInquiry.email }}</a
                                    >
                                </div>
                                <div
                                    v-if="selectedInquiry.phone"
                                    class="flex items-center gap-4 text-brand-wine"
                                >
                                    <Phone
                                        class="h-4 w-4 shrink-0 text-brand-rose"
                                    />
                                    <a
                                        :href="'tel:' + selectedInquiry.phone"
                                        class="cursor-pointer text-sm font-light transition-colors hover:text-brand-rose"
                                        >{{ selectedInquiry.phone }}</a
                                    >
                                </div>
                            </div>

                            <!-- THE NEW EVENT DETAILS -->
                            <div class="mb-8 grid grid-cols-2 gap-4">
                                <div
                                    class="rounded-md border border-brand-rose/10 bg-white p-5 shadow-sm"
                                >
                                    <span
                                        class="mb-2 block text-[0.6rem] font-bold tracking-widest text-brand-rose uppercase"
                                        >Event Type</span
                                    >
                                    <div
                                        class="flex items-center gap-3 text-brand-wine"
                                    >
                                        <Tag
                                            class="h-4 w-4 shrink-0 text-brand-rose/60"
                                        />
                                        <span class="text-sm font-semibold">{{
                                            formatEventType(
                                                selectedInquiry.event_type,
                                            )
                                        }}</span>
                                    </div>
                                </div>
                                <div
                                    class="rounded-md border border-brand-rose/10 bg-white p-5 shadow-sm"
                                >
                                    <span
                                        class="mb-2 block text-[0.6rem] font-bold tracking-widest text-brand-rose uppercase"
                                        >Proposed Date</span
                                    >
                                    <div
                                        class="flex items-center gap-3 text-brand-wine"
                                    >
                                        <Calendar
                                            class="h-4 w-4 shrink-0 text-brand-rose/60"
                                        />
                                        <span class="text-sm font-semibold">{{
                                            selectedInquiry.event_date || 'TBD'
                                        }}</span>
                                    </div>
                                </div>
                                <div
                                    class="rounded-md border border-brand-rose/10 bg-white p-5 shadow-sm"
                                >
                                    <span
                                        class="mb-2 block text-[0.6rem] font-bold tracking-widest text-brand-rose uppercase"
                                        >Location</span
                                    >
                                    <div
                                        class="flex items-center gap-3 text-brand-wine"
                                    >
                                        <MapPin
                                            class="h-4 w-4 shrink-0 text-brand-rose/60"
                                        />
                                        <span class="text-sm font-semibold">{{
                                            selectedInquiry.event_location
                                        }}</span>
                                    </div>
                                </div>
                                <div
                                    class="rounded-md border border-brand-rose/10 bg-white p-5 shadow-sm"
                                >
                                    <span
                                        class="mb-2 block text-[0.6rem] font-bold tracking-widest text-brand-rose uppercase"
                                        >Budget & Guests</span
                                    >
                                    <div
                                        class="flex flex-col gap-1 text-brand-wine"
                                    >
                                        <div class="flex items-center gap-3">
                                            <PoundSterling
                                                class="h-3.5 w-3.5 shrink-0 text-brand-rose/60"
                                            />
                                            <span
                                                class="text-sm font-semibold"
                                                >{{
                                                    selectedInquiry.approximate_budget
                                                }}</span
                                            >
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <Users
                                                class="h-3.5 w-3.5 shrink-0 text-brand-rose/60"
                                            />
                                            <span
                                                class="text-xs font-light text-brand-wine/70"
                                                >{{
                                                    selectedInquiry.guest_numbers ||
                                                    'Not specified'
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CLIENT MESSAGE -->
                            <div
                                class="mb-8 rounded-md border border-brand-rose/10 bg-white p-8 shadow-sm"
                            >
                                <h4
                                    class="mb-4 border-b border-brand-rose/10 pb-4 text-[0.65rem] font-bold tracking-widest text-brand-rose uppercase"
                                >
                                    Client Message
                                </h4>
                                <p
                                    class="text-base leading-relaxed font-light whitespace-pre-wrap text-brand-wine/90 selection:bg-brand-rose selection:text-white"
                                >
                                    {{ selectedInquiry.message }}
                                </p>
                            </div>

                            <!-- REFERRAL INFO -->
                            <div
                                class="flex items-center justify-center gap-2 rounded-md border border-brand-rose/10 bg-brand-rose/5 p-4 text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                            >
                                <Search class="h-3.5 w-3.5" />
                                Found us via:
                                <span class="text-brand-wine">{{
                                    selectedInquiry.found_us_via
                                }}</span>
                            </div>
                        </div>

                        <!-- Pane Footer (Reply Action) -->
                        <div
                            class="flex shrink-0 justify-end border-t border-brand-rose/20 bg-white p-6"
                        >
                            <a
                                :href="
                                    'mailto:' +
                                    selectedInquiry.email +
                                    '?subject=Re: Inquiry with Almond-Blossoms Events'
                                "
                                class="cursor-pointer rounded-sm bg-brand-wine px-8 py-4 text-xs font-semibold tracking-[0.15em] text-brand-blush uppercase shadow-lg transition-colors hover:bg-brand-rose"
                            >
                                Reply via Email
                            </a>
                        </div>
                    </div>
                </transition>
            </div>
        </Teleport>
    </div>
</template>
