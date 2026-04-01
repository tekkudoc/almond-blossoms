<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import { useTemplateRef } from 'vue';
import { AlertTriangle, Trash2 } from 'lucide-vue-next';
import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';

const passwordInput = useTemplateRef('passwordInput');
</script>

<template>
    <div class="mt-16 w-full">
        <!-- Section Header -->
        <div class="mb-6 flex items-center gap-3 border-b border-red-200 pb-4">
            <AlertTriangle class="h-5 w-5 text-red-500" />
            <h2 class="font-serif text-2xl text-brand-wine">Danger Zone</h2>
        </div>

        <!-- The Warning Card -->
        <div
            class="flex flex-col items-start justify-between gap-8 rounded-lg border border-red-200 bg-red-50/50 p-8 shadow-[0_10px_40px_-10px_rgba(220,38,38,0.05)] sm:p-10 md:flex-row md:items-center"
        >
            <div class="max-w-lg">
                <h3
                    class="mb-2 text-sm font-bold tracking-widest text-red-700 uppercase"
                >
                    Delete Account
                </h3>
                <p
                    class="text-sm leading-relaxed font-light text-brand-wine/70"
                >
                    Once your account is deleted, all of its resources, journal
                    posts, and inquiry data will be permanently deleted. Please
                    proceed with extreme caution.
                </p>
            </div>

            <Dialog>
                <DialogTrigger as-child>
                    <button
                        data-test="delete-user-button"
                        class="inline-flex shrink-0 items-center gap-2 rounded-sm border border-red-200 bg-white px-8 py-3.5 text-[0.65rem] font-bold tracking-[0.2em] text-red-600 uppercase shadow-sm transition-all hover:border-red-600 hover:bg-red-600 hover:text-white"
                    >
                        <Trash2 class="h-4 w-4" /> Delete Account
                    </button>
                </DialogTrigger>

                <!-- BRANDED DIALOG CONTENT -->
                <DialogContent
                    class="rounded-sm border border-brand-rose/30 bg-brand-blush p-8 shadow-2xl sm:max-w-md sm:p-10"
                >
                    <Form
                        v-bind="ProfileController.destroy.form()"
                        reset-on-success
                        @error="() => passwordInput?.focus()"
                        :options="{ preserveScroll: true }"
                        class="space-y-8"
                        v-slot="{ errors, processing, reset, clearErrors }"
                    >
                        <DialogHeader
                            class="mb-2 flex flex-col items-center justify-center"
                        >
                            <!-- Warning Icon -->
                            <div
                                class="mb-6 flex h-16 w-16 items-center justify-center rounded-full border border-red-100 bg-red-50 shadow-sm"
                            >
                                <AlertTriangle class="h-8 w-8 text-red-500" />
                            </div>

                            <DialogTitle
                                class="mb-3 text-center font-serif text-3xl font-normal text-brand-wine"
                            >
                                Are you absolutely sure?
                            </DialogTitle>

                            <DialogDescription
                                class="mx-auto max-w-sm text-center text-sm leading-relaxed font-light text-brand-wine/70"
                            >
                                Once your account is deleted, all of your data
                                will be permanently removed. Please enter your
                                password to confirm this action.
                            </DialogDescription>
                        </DialogHeader>

                        <!-- Password Input -->
                        <div
                            class="w-full space-y-2 border-t border-brand-rose/20 pt-4"
                        >
                            <label
                                for="password"
                                class="mb-2 block text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                            >
                                Confirm Password
                            </label>

                            <PasswordInput
                                id="password"
                                name="password"
                                ref="passwordInput"
                                class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 text-sm font-light shadow-inner outline-none focus:ring-1 focus:ring-brand-wine"
                                placeholder="Enter your password..."
                            />
                            <InputError
                                class="mt-2 text-xs text-red-500"
                                :message="errors.password"
                            />
                        </div>

                        <!-- Dialog Actions -->
                        <DialogFooter
                            class="flex w-full flex-col gap-4 pt-2 sm:flex-row sm:gap-2"
                        >
                            <DialogClose as-child>
                                <button
                                    type="button"
                                    class="flex-1 rounded-sm border border-brand-rose/50 px-6 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase transition-all hover:bg-brand-light"
                                    @click="
                                        () => {
                                            clearErrors();
                                            reset();
                                        }
                                    "
                                >
                                    Cancel
                                </button>
                            </DialogClose>

                            <button
                                type="submit"
                                :disabled="processing"
                                data-test="confirm-delete-user-button"
                                class="flex-1 rounded-sm bg-red-700 px-6 py-3 text-[0.65rem] font-bold tracking-[0.2em] text-white uppercase shadow-md transition-all hover:bg-red-800 disabled:opacity-50"
                            >
                                {{
                                    processing
                                        ? 'Deleting...'
                                        : 'Delete Account'
                                }}
                            </button>
                        </DialogFooter>
                    </Form>
                </DialogContent>
            </Dialog>
        </div>
    </div>
</template>
