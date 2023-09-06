<script setup>
    import InputLabel from '@/Components/Inputs/InputLabel.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import InputError from '@/Components/Inputs/InputError.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'
    import { useForm } from '@inertiajs/vue3'

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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white py-6 px-4 dark:bg-gray-800 shadow-xl sm:rounded-lg"
            >
                <form @submit.prevent="submit()">
                    <div class="flex space-x-4">
                        <div class="w-full">
                            <InputLabel class="px-3 py-2">
                                Project Name :
                            </InputLabel>
                            <TextInput v-model="form.name" class="w-full" />
                            <InputError
                                :message="form.errors.name"
                                class="px-3 py-2"
                            />
                        </div>

                        <div class="w-full">
                            <InputLabel class="px-3 py-2"> Repo : </InputLabel>
                            <TextInput v-model="form.repo" class="w-full" />
                            <InputError
                                :message="form.errors.repo"
                                class="px-3 py-2"
                            />
                        </div>
                    </div>
                    <div class="flex space-x-4 my-4">
                        <div class="w-full">
                            <InputLabel class="px-3 py-2"> URL : </InputLabel>
                            <TextInput v-model="form.url" class="w-full" />
                            <InputError
                                :message="form.errors.url"
                                class="px-3 py-2"
                            />
                        </div>

                        <div class="w-full">
                            <InputLabel class="px-3 py-2">
                                Test URL :
                            </InputLabel>
                            <TextInput v-model="form.test_url" class="w-full" />
                            <InputError
                                :message="form.errors.test_url"
                                class="px-3 py-2"
                            />
                        </div>
                    </div>
                    <div class="flex justify-center pt-8">
                        <PrimaryButton @click="">Submit</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
