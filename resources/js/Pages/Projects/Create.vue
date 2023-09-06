<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ProjectForm from '@/Pages/Projects/Partials/ProjectForm.vue'

    const props = defineProps(['currentTeam'])
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Create a Project
            </h2>
        </template>

        <ProjectForm />
    </AppLayout>
</template>
