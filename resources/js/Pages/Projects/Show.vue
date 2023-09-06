<script setup>
    import { Link } from '@inertiajs/vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Card from '@/Components/Containers/Card.vue'
    import dayjs from 'dayjs'
    import DangerButton from '@/Components/Buttons/DangerButton.vue'
    import Modal from '@/Components/Containers/Modal.vue'
    import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import { ref } from 'vue'

    defineProps(['project'])

    const open = ref(false)

    function submit() {
        console.log('This works')
        open.value = false
    }
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                {{ project.name }}
            </h2>
        </template>

        <Card
            class="mx-6"
            header="Project Details"
            headerDescription="This is a very long description for the object I am currently working with..."
        >
            <template #actions>
                <DangerButton @click="open = true">
                    Delete Project
                </DangerButton>
            </template>
            <template #body>
                <div class="flex flex-wrap justify-between space-x-8">
                    <div class="space-y-4">
                        <p>
                            <span class="font-semibold">Created By : </span>
                            {{ project.created_by.name }}
                        </p>
                        <p>
                            <span class="font-semibold">URL : </span>
                            {{ project.url }}
                        </p>
                        <p>
                            <span class="font-semibold">Test URL : </span>
                            {{ project.test_url }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        <p>
                            <span class="font-semibold">Created At : </span>
                            {{
                                dayjs(project.created_at).format(
                                    'MM/DD/YYYY - hh:mm A'
                                )
                            }}
                        </p>
                        <p>
                            Updated At:
                            {{
                                dayjs(project.updated_at).format(
                                    'MM/DD/YYYY - hh:mm A'
                                )
                            }}
                        </p>
                    </div>
                </div>
            </template>
        </Card>

        <Card
            class="my-12"
            header="Scopes"
            header-description="A list of all of the scope of works for this project."
        >
            <template #body>
                <p>Hello World!</p>
                <p>There is nothing here... yet...</p>
            </template>
        </Card>

        <Modal :open="open">
            <template #header> Delete {{ project.name }}? </template>
            <p class="text-white">
                Are you sure you want to delete the {{ project.name }} project?
            </p>
            <template #footer>
                <SecondaryButton @click="open = false">
                    Cancel
                </SecondaryButton>

                <Link
                    :href="route('projects.destroy', { project: project.id })"
                    method="delete"
                >
                    <PrimaryButton> Delete Project </PrimaryButton>
                </Link>
            </template>
        </Modal>
    </AppLayout>
</template>
