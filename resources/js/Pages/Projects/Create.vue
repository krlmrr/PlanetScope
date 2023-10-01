<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ProjectForm from '@/Pages/Projects/Partials/ProjectForm.vue'

    const props = defineProps(['currentTeam'])
</script>

<template>
    <AppLayout title="Create a Project">
        <ProjectForm />
    </AppLayout>
</template>
