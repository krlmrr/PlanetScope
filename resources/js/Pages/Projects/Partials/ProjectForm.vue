<script setup>
    import { useForm } from '@inertiajs/vue3'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'

    const props = defineProps(['project'])

    const form = useForm({
        name: props.project?.name ?? null,
        repo: props.project?.repo ?? null,
        test_url: props.project?.test_url ?? null,
        url: props.project?.url ?? null,
    })

    function submit() {
        if (props.project === undefined) {
            form.post(route('projects.store'))
        }

        form.put(route('projects.update', { project: props.project.id }))
    }
</script>

<template>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div
                class="px-4 py-6 bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg"
            >
                <form @submit.prevent="submit()">
                    <div class="flex space-x-4">
                        <TextInput
                            label="Project Name"
                            :errors="form.errors.name"
                            v-model="form.name"
                            class="w-full"
                        />

                        <TextInput
                            label="Repo"
                            :errors="form.errors.repo"
                            v-model="form.repo"
                            class="w-full"
                        />
                    </div>
                    <div class="flex my-4 space-x-4">
                        <TextInput
                            :errors="form.errors.url"
                            v-model="form.url"
                            label="URL"
                            class="w-full"
                        />

                        <TextInput
                            label="Test URL"
                            :errors="form.errors.test_url"
                            v-model="form.test_url"
                            class="w-full"
                        />
                    </div>
                    <div class="flex justify-center pt-8">
                        <PrimaryButton @click="">Submit</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
