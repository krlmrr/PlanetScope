<script setup>
    import { Head, useForm } from '@inertiajs/vue3'
    import AuthenticationCard from '@/Components/Jetstream/AuthenticationCard.vue'
    import AuthenticationCardLogo from '@/Components/Jetstream/AuthenticationCardLogo.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'

    defineProps({
        status: String,
    })

    const form = useForm({
        email: '',
    })

    const submit = () => {
        form.post(route('password.email'))
    }
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.
        </div>

        <div
            v-if="status"
            class="mb-4 font-medium text-sm text-green-600 dark:text-green-400"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <TextInput
                id="email"
                label="Email"
                :errors="form.errors.email"
                v-model="form.email"
                type="email"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="username"
            />

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
