<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ScopeForm from '@/Pages/Scope/Partials/ScopeForm.vue'

    defineProps(['project'])
</script>

<template>
    <AppLayout :title="`Create a Scope for ${project.name}`">
        <ScopeForm />
    </AppLayout>
</template>
