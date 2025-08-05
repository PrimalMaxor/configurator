<template>

    <Head title="Account Verification" />

    <GuestLayout>
        <div class="mb-4 text-sm text-gray-600">
            <h2 class="text-xl font-semibold text-center text-gray-900 mb-4">
                Account Verification Required
            </h2>

            <p class="text-center text-gray-600 mb-6">
                Your account needs to be verified before you can access certain features.
                Please contact an administrator to verify your account.
            </p>

            <div class="flex flex-col space-y-3">
                <div class="text-center">
                    <Link :href="route('logout')" method="post" as="button"
                        class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Log Out
                    </Link>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'

const form = useForm({})
const resendForm = useForm({})

const verify = () => {
    form.post(route('verification.verify'))
}

const resend = () => {
    resendForm.post(route('verification.resend'))
}
</script>