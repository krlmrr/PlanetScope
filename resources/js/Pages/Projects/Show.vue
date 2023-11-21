<script setup>
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import dayjs from 'dayjs'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Card from '@/Components/Containers/Card.vue'
    import DangerButton from '@/Components/Buttons/DangerButton.vue'
    import Modal from '@/Components/Containers/Modal.vue'
    import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TabGroup from '@/Components/Navigation/TabGroup.vue'

    const props = defineProps(['project', 'scopes'])

    const tabs = [{
        name: 'Project Details',
        routeGroup: 'projects',
        href: route('projects.show', [props.project.id]),
    }, {
        name: 'Scopes',
        routeGroup: 'projects.scopes',
        href: route('projects.scopes.index', [props.project.id]),
    }]

    const open = ref(false)
</script>

<template>
    <AppLayout :title="project.name">
        <TabGroup :tabs="tabs" />
        <Card
            class="mx-6"
            header="Project Details"
            headerDescription="Details for the project you are currently working with."
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
                            <span class="font-semibold">Created By : </span>
                            {{ project.created_by.name }}
                        </p>
                        <p>
                            <span class="font-semibold">Created At : </span>
                            {{
                                dayjs(project.created_at).format(
                                    'MM/DD/YYYY - hh:mm A',
                                )
                            }}
                        </p>
                        <p>
                            <span class="font-semibold">Updated At : </span>
                            {{
                                dayjs(project.updated_at).format(
                                    'MM/DD/YYYY - hh:mm A',
                                )
                            }}
                        </p>
                    </div>
                </div>
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
