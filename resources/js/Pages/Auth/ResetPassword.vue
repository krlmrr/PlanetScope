<script setup>
    import { Head, useForm } from '@inertiajs/vue3'
    import AuthenticationCard from '@/Components/Jetstream/AuthenticationCard.vue'
    import AuthenticationCardLogo from '@/Components/Jetstream/AuthenticationCardLogo.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'

    const props = defineProps({
        email: String,
        token: String,
    })

    const form = useForm({
        token: props.token,
        email: props.email,
        password: '',
        password_confirmation: '',
    })

    const submit = () => {
        form.post(route('password.update'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        })
    }
</script>

<template>
    <Head title="Reset Password" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <TextInput
                id="email"
                label="Email"
                v-model="form.email"
                :errors="form.errors.email"
                form.errors.email
                type="email"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="username"
            />

            <TextInput
                id="password"
                label="Password"
                :errors="form.errors.password"
                v-model="form.password"
                type="password"
                class="mt-4 block w-full"
                required
                autocomplete="new-password"
            />

            <TextInput
                id="password_confirmation"
                label="Confirm Password"
                v-model="form.password_confirmation"
                :errors="form.errors.password_confirmation"
                type="password"
                class="mt-4 block w-full"
                required
                autocomplete="new-password"
            />

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Reset Password
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
