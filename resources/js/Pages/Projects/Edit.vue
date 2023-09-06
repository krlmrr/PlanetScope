<script setup>
    import ProjectForm from '@/Pages/Projects/Partials/ProjectForm.vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    const props = defineProps(['project'])
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Edit {{ props.project.name }}
            </h2>
        </template>

        <ProjectForm :project="props.project" />
    </AppLayout>
</template>
