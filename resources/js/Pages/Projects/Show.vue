<script setup>
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import dayjs from 'dayjs'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Card from '@/Components/Containers/Card.vue'
    import Table from '@/Components/Containers/Table.vue'
    import DangerButton from '@/Components/Buttons/DangerButton.vue'
    import Modal from '@/Components/Containers/Modal.vue'
    import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TableColumn from '@/Components/Containers/TableColumn.vue'

    defineProps(['project', 'scopes'])

    const headers = ['Title', 'Status', 'Budget', 'Created At', '']

    const open = ref(false)
</script>

<template>
    <AppLayout :title="project.name">
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

        <Card
            class="my-12"
            header="Scopes"
            header-description="A list of all of the scope of works for this project."
        >
            <template #actions>
                <Link
                    :href="
                        route('projects.scopes.create', { project: project })
                    "
                >
                    <PrimaryButton> Create a Scope </PrimaryButton>
                </Link>
            </template>
            <template #body>
                <p v-if="scopes.length === 0">
                    No Scopes found, why don't you create one?
                </p>
                <Table
                    v-else
                    :headers="headers"
                    :items="scopes"
                    v-slot="scopes"
                >
                    <TableColumn>
                        {{ scopes.item.title }}
                    </TableColumn>
                    <TableColumn class="mx-4">
                        <p :class="scopes.item.status.color">
                            {{ scopes.item.status.status }}
                        </p>
                    </TableColumn>
                    <TableColumn>
                        {{ scopes.item.budget }}
                    </TableColumn>
                    <TableColumn>
                        {{
                            dayjs(scopes.item.created_at).format(
                                'MM/DD/YYYY - hh:mm A',
                            )
                        }}
                    </TableColumn>
                    <!--                    <TableColumn class="flex space-x-4 justify-center">-->
                    <!--                        <SecondaryButton>Edit</SecondaryButton>-->
                    <!--                        <DangerButton>Delete</DangerButton>-->
                    <!--                    </TableColumn>-->
                </Table>
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
