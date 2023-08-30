<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <p class="dark:text-white">Hello World</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
