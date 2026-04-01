<script setup lang="ts">
import { Form, Head, Link, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
import DeleteUser from '@/components/DeleteUser.vue';
import InputError from '@/components/InputError.vue';
import { edit } from '@/routes/profile';
import { send } from '@/routes/verification';
import Layout from '@/layouts/settings/Layout.vue';
import { CheckCircle, X, UserCircle2, AlertTriangle } from 'lucide-vue-next';

type Props = {
    mustVerifyEmail: boolean;
    status?: string;
};

defineProps<Props>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Security settings',
                href: edit(),
            },
        ],
    },
});

const page = usePage();
const user = computed(() => page.props.auth.user);

// Toast Notification Logic
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
</script>

<template>
    <Head title="Profile Settings | Almond-Blossoms" />

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
            <span class="text-[0.65rem] font-bold tracking-widest uppercase">{{
                flashMessage
            }}</span>
            <button @click="flashMessage = null">
                <X
                    class="h-4 w-4 opacity-50 transition-opacity hover:opacity-100"
                />
            </button>
        </div>
    </transition>

    <div class="p-8 sm:p-12">
        <div
            class="mb-8 flex items-center gap-3 border-b border-brand-rose/10 pb-4"
        >
            <UserCircle2 class="h-5 w-5 text-brand-rose" />
            <h2 class="font-serif text-3xl text-brand-wine">
                Personal Details
            </h2>
        </div>

        <Form
            v-bind="ProfileController.update.form()"
            class="space-y-10"
            v-slot="{ errors, processing, recentlySuccessful }"
        >
            <!-- FIXED: Name Field -->
            <div class="group">
                <label
                    for="name"
                    class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                    >Full Name</label
                >
                <!-- Now uses a solid box with inner shadow, just like the Journal settings -->
                <input
                    id="name"
                    type="text"
                    class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:bg-white focus:ring-1 focus:ring-brand-wine"
                    name="name"
                    :defaultValue="user.name"
                    required
                    autocomplete="name"
                    placeholder="Enter your full name"
                />
                <InputError
                    class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                    :message="errors.name"
                />
            </div>

            <!-- FIXED: Email Field -->
            <div class="group">
                <label
                    for="email"
                    class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                    >Email Address</label
                >
                <input
                    id="email"
                    type="email"
                    class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:bg-white focus:ring-1 focus:ring-brand-wine"
                    name="email"
                    :defaultValue="user.email"
                    required
                    autocomplete="username"
                    placeholder="Enter your email address"
                />
                <InputError
                    class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                    :message="errors.email"
                />
            </div>

            <!-- Verification Warning -->
            <div
                v-if="mustVerifyEmail && !user.email_verified_at"
                class="mt-6 rounded-sm border border-brand-rose/30 bg-brand-rose/10 p-6 shadow-sm"
            >
                <div class="flex items-start gap-4">
                    <AlertTriangle
                        class="mt-1 h-6 w-6 shrink-0 text-brand-wine"
                    />
                    <div class="flex-1">
                        <p
                            class="mb-1 text-sm font-bold tracking-widest text-brand-wine uppercase"
                        >
                            Verification Required
                        </p>
                        <p
                            class="mb-4 text-sm leading-relaxed font-light text-brand-wine/80"
                        >
                            Your email address is currently unverified. Please
                            check your inbox for a verification link.
                        </p>
                        <Link
                            :href="send()"
                            as="button"
                            class="inline-block rounded-sm border border-brand-wine bg-transparent px-6 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase shadow-sm transition-colors hover:bg-brand-wine hover:text-white"
                        >
                            Resend Verification Email
                        </Link>
                    </div>
                </div>

                <div
                    v-if="status === 'verification-link-sent'"
                    class="mt-6 flex items-center gap-3 rounded-sm border border-green-200 bg-green-100 px-6 py-4 text-[0.65rem] font-bold tracking-[0.2em] text-green-800 uppercase"
                >
                    <CheckCircle class="h-5 w-5" /> A new link has been sent to
                    your email.
                </div>
            </div>

            <!-- Submit Action -->
            <div
                class="mt-8 flex items-center justify-between border-t border-brand-rose/10 pt-8"
            >
                <Transition
                    enter-active-class="transition ease-in-out duration-300"
                    enter-from-class="opacity-0 -translate-x-2"
                    leave-active-class="transition ease-in-out duration-300"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-show="recentlySuccessful"
                        class="flex items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-rose uppercase"
                    >
                        <CheckCircle class="h-4 w-4" /> Updated Successfully
                    </p>
                </Transition>

                <button
                    :disabled="processing"
                    class="ml-auto inline-flex items-center gap-2 rounded-sm bg-brand-wine px-10 py-4 text-[0.65rem] font-bold tracking-[0.2em] text-brand-light uppercase shadow-lg transition-all hover:bg-brand-rose disabled:opacity-50"
                >
                    {{ processing ? 'Saving...' : 'Save Profile' }}
                </button>
            </div>
        </Form>
    </div>

    <!-- Danger Zone: Delete Account -->
    <div class="border-t border-brand-rose/20 bg-brand-light/30 p-8 sm:p-12">
        <DeleteUser />
    </div>
</template>
