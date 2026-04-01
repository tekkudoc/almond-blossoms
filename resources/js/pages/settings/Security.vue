<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import { ShieldCheck, Lock } from 'lucide-vue-next';
import { onUnmounted, ref } from 'vue';
import SecurityController from '@/actions/App/Http/Controllers/Settings/SecurityController';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TwoFactorRecoveryCodes from '@/components/TwoFactorRecoveryCodes.vue';
import TwoFactorSetupModal from '@/components/TwoFactorSetupModal.vue';
import { useTwoFactorAuth } from '@/composables/useTwoFactorAuth';
import { edit } from '@/routes/security';
import { disable, enable } from '@/routes/two-factor';

type Props = {
    canManageTwoFactor?: boolean;
    requiresConfirmation?: boolean;
    twoFactorEnabled?: boolean;
};

withDefaults(defineProps<Props>(), {
    canManageTwoFactor: false,
    requiresConfirmation: false,
    twoFactorEnabled: false,
});

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

const { hasSetupData, clearTwoFactorAuthData } = useTwoFactorAuth();
const showSetupModal = ref<boolean>(false);

onUnmounted(() => clearTwoFactorAuthData());
</script>

<template>
    <Head title="Security Settings | Almond-Blossoms" />

    <div class="p-8 sm:p-12">
        <!-- Password Update Section -->
        <div
            class="mb-8 flex items-center gap-3 border-b border-brand-rose/10 pb-4"
        >
            <Lock class="h-5 w-5 text-brand-rose" />
            <h2 class="font-serif text-2xl text-brand-wine">Update Password</h2>
        </div>

        <Form
            v-bind="SecurityController.update.form()"
            :options="{ preserveScroll: true }"
            reset-on-success
            :reset-on-error="[
                'password',
                'password_confirmation',
                'current_password',
            ]"
            class="space-y-8"
            v-slot="{ errors, processing, recentlySuccessful }"
        >
            <div>
                <label
                    for="current_password"
                    class="mb-2 block text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                    >Current Password</label
                >
                <PasswordInput
                    id="current_password"
                    name="current_password"
                    class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-sm font-light shadow-inner outline-none focus:ring-1 focus:ring-brand-wine"
                    autocomplete="current-password"
                    placeholder="Enter current password"
                />
                <InputError
                    class="mt-2 text-xs text-red-500"
                    :message="errors.current_password"
                />
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div>
                    <label
                        for="password"
                        class="mb-2 block text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                        >New Password</label
                    >
                    <PasswordInput
                        id="password"
                        name="password"
                        class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-sm font-light shadow-inner outline-none focus:ring-1 focus:ring-brand-wine"
                        autocomplete="new-password"
                        placeholder="Enter new password"
                    />
                    <InputError
                        class="mt-2 text-xs text-red-500"
                        :message="errors.password"
                    />
                </div>

                <div>
                    <label
                        for="password_confirmation"
                        class="mb-2 block text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                        >Confirm Password</label
                    >
                    <PasswordInput
                        id="password_confirmation"
                        name="password_confirmation"
                        class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-sm font-light shadow-inner outline-none focus:ring-1 focus:ring-brand-wine"
                        autocomplete="new-password"
                        placeholder="Confirm new password"
                    />
                    <InputError
                        class="mt-2 text-xs text-red-500"
                        :message="errors.password_confirmation"
                    />
                </div>
            </div>

            <div
                class="flex items-center gap-6 border-t border-brand-rose/10 pt-6"
            >
                <button
                    :disabled="processing"
                    class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-8 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-light uppercase shadow-md transition-all hover:bg-brand-rose disabled:opacity-50"
                >
                    {{ processing ? 'Saving...' : 'Save Password' }}
                </button>

                <Transition
                    enter-active-class="transition ease-in-out duration-300"
                    enter-from-class="opacity-0 translate-y-2"
                    leave-active-class="transition ease-in-out duration-300"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-show="recentlySuccessful"
                        class="flex items-center gap-2 text-[0.65rem] font-bold tracking-widest text-green-600 uppercase"
                    >
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                        Password Updated
                    </p>
                </Transition>
            </div>
        </Form>
    </div>

    <!-- 2FA SECTION -->
    <div
        v-if="canManageTwoFactor"
        class="border-t border-brand-rose/20 bg-brand-light/30 p-8 sm:p-12"
    >
        <div
            class="mb-6 flex items-center gap-3 border-b border-brand-rose/10 pb-4"
        >
            <ShieldCheck class="h-5 w-5 text-brand-rose" />
            <h2 class="font-serif text-2xl text-brand-wine">
                Two-Factor Authentication
            </h2>
        </div>

        <div
            v-if="!twoFactorEnabled"
            class="flex flex-col items-start space-y-6"
        >
            <p
                class="max-w-2xl text-sm leading-relaxed font-light text-brand-wine/80"
            >
                When you enable two-factor authentication, you will be prompted
                for a secure pin during login. This pin can be retrieved from a
                TOTP-supported application on your phone (like Google
                Authenticator).
            </p>

            <div>
                <button
                    v-if="hasSetupData"
                    @click="showSetupModal = true"
                    class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-8 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-light uppercase shadow-md transition-all hover:bg-brand-rose"
                >
                    <ShieldCheck class="h-4 w-4" /> Continue Setup
                </button>
                <Form
                    v-else
                    v-bind="enable.form()"
                    @success="showSetupModal = true"
                    #default="{ processing }"
                >
                    <button
                        type="submit"
                        :disabled="processing"
                        class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-8 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-light uppercase shadow-md transition-all hover:bg-brand-rose disabled:opacity-50"
                    >
                        Enable 2FA
                    </button>
                </Form>
            </div>
        </div>

        <div v-else class="flex flex-col items-start space-y-6">
            <p
                class="max-w-2xl text-sm leading-relaxed font-light text-brand-wine/80"
            >
                You have enabled two-factor authentication. You will be prompted
                for a secure, random pin during login, which you can retrieve
                from the TOTP-supported application on your phone.
            </p>

            <div class="relative inline">
                <Form v-bind="disable.form()" #default="{ processing }">
                    <button
                        type="submit"
                        :disabled="processing"
                        class="inline-flex items-center gap-2 rounded-sm border border-red-500 px-8 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-red-600 uppercase transition-all hover:bg-red-50 disabled:opacity-50"
                    >
                        Disable 2FA
                    </button>
                </Form>
            </div>

            <div class="mt-8 w-full border-t border-brand-rose/10 pt-8">
                <TwoFactorRecoveryCodes />
            </div>
        </div>

        <TwoFactorSetupModal
            v-model:isOpen="showSetupModal"
            :requiresConfirmation="requiresConfirmation"
            :twoFactorEnabled="twoFactorEnabled"
        />
    </div>
</template>
