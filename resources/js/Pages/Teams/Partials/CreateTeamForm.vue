<script setup>
    import { useForm } from '@inertiajs/vue3'
    import FormSection from '@/Components/Jetstream/FormSection.vue'
    import InputError from '@/Components/Inputs/InputError.vue'
    import InputLabel from '@/Components/Inputs/InputLabel.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'

    const form = useForm({
        name: '',
    })

    const createTeam = () => {
        form.post(route('teams.store'), {
            errorBag: 'createTeam',
            preserveScroll: true,
        })
    }
</script>

<template>
    <FormSection @submitted="createTeam">
        <template #title> Team Details </template>

        <template #description>
            Create a new team to collaborate with others on projects.
        </template>

        <template #form>
            <div class="col-span-6">
                <InputLabel value="Team Owner" />

                <div class="flex items-center mt-4">
                    <img
                        class="object-cover w-12 h-12 rounded-full"
                        :src="$page.props.auth.user.profile_photo_url"
                        :alt="$page.props.auth.user.name"
                    />

                    <div class="ml-4 leading-tight">
                        <div class="text-gray-900 dark:text-white">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <TextInput
                    id="name"
                    label="Team Name"
                    :errors="form.errors.name"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
            </div>
        </template>

        <template #actions>
            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Create
            </PrimaryButton>
        </template>
    </FormSection>
</template>
