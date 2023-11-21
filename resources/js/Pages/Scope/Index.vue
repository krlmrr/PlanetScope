<script setup>
    import { Link } from '@inertiajs/vue3'
    import { ref } from 'vue'
    import dayjs from 'dayjs'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Card from '@/Components/Containers/Card.vue'
    import Table from '@/Components/Containers/Table.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TableColumn from '@/Components/Containers/TableColumn.vue'
    import TabGroup from '@/Components/Navigation/TabGroup.vue'

    const props = defineProps(['project', 'scopes'])

    const headers = ['Title', 'Status', 'Budget', 'Created At', '']

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
                    <!--                    <TableColumn class="flex justify-center space-x-4">-->
                    <!--                        <SecondaryButton>Edit</SecondaryButton>-->
                    <!--                        <DangerButton>Delete</DangerButton>-->
                    <!--                    </TableColumn>-->
                </Table>
            </template>
        </Card>
    </AppLayout>
</template>
