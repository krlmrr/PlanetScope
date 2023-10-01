<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Link } from '@inertiajs/vue3'
    import dayjs from 'dayjs'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import Card from '@/Components/Containers/Card.vue'
    import Table from '@/Components/Containers/Table.vue'
    import TableColumn from '@/Components/Containers/TableColumn.vue'
    import SecondaryButton from '@/Components/Buttons/SecondaryButton.vue'

    defineProps(['teamProjects'])

    const headers = ['Name', 'URL', 'Created By', 'Created At', '']
</script>

<template>
    <AppLayout title="Projects">
        <Card
            class="my-12"
            header="Projects"
            header-description="A list of all the projects that belong to your currently selected team."
        >
            <template #actions>
                <Link :href="route('projects.create')">
                    <PrimaryButton>Create a Project</PrimaryButton>
                </Link>
            </template>
            <template #body>
                <Table :headers="headers" :items="teamProjects" v-slot="items">
                    <TableColumn>
                        <Link
                            :href="
                                route('projects.show', {
                                    project: items.item.id,
                                })
                            "
                        >
                            {{ items.item.name }}
                        </Link>
                    </TableColumn>
                    <TableColumn>
                        <a :href="items.item.url" target="_blank">
                            {{ items.item.url }}
                        </a>
                    </TableColumn>
                    <TableColumn>
                        {{ items.item.created_by.name }}
                    </TableColumn>
                    <TableColumn>
                        {{ dayjs(items.item.created_at).format('MM/DD/YYYY') }}
                    </TableColumn>
                    <TableColumn>
                        <Link
                            :href="
                                route('projects.edit', {
                                    project: items.item.id,
                                })
                            "
                        >
                            <SecondaryButton>Edit</SecondaryButton>
                        </Link>
                    </TableColumn>
                </Table>
            </template>
        </Card>
    </AppLayout>
</template>
