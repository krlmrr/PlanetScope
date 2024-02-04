<script setup>
    import { Head } from '@inertiajs/vue3'
    import Banner from '@/Components/Jetstream/Banner.vue'
    import Nav from '@/Layouts/Partials/Nav.vue'
    import Footer from '@/Layouts/Partials/Footer.vue'

    defineProps({
        title: String,
    })
</script>

<template>
    <div class="-mb-2 flex h-screen flex-col">
        <Head :title="title" />

        <Nav />

        <!-- Page Heading -->
        <header v-if="title" class="bg-white shadow dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <slot name="header" />

                <div class="flex items-center justify-between">
                    <h2
                        class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                    >
                        <div class="flex items-center justify-between">
                            <h2
                                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                            >
                                {{ title }}
                            </h2>
                        </div>
                    </h2>
                </div>
            </div>
        </header>

        <Banner />

        <!-- Page Content -->
        <main class="flex-1">
            <slot />
        </main>

        <Footer />
    </div>
</template>
