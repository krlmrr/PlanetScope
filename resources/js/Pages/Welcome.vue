<script setup>
    import { Head, Link } from '@inertiajs/vue3'
    import Hero from '@/Components/Page/Hero.vue'
    import Features from '@/Components/Page/Features.vue'
    import Footer from '@/Layouts/Partials/Footer.vue'

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    })
</script>

<template>
    <Head title="Welcome" />

    <div
        class="dark:bg-dots-lighter -mb-2 flex h-screen flex-col dark:bg-gray-900"
    >
        <div
            class="bg-dots-darker bg-gray-100 bg-center selection:bg-red-500 selection:text-white sm:flex sm:items-center sm:justify-center"
        >
            <div
                v-if="canLogin"
                class="z-10 p-6 text-right sm:fixed sm:right-0 sm:top-0"
            >
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('projects.index')"
                    class="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-red-500 dark:text-gray-400 dark:hover:text-white"
                >
                    Projects
                </Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-red-500 dark:text-gray-400 dark:hover:text-white"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm focus:outline focus:outline-2 focus:outline-red-500 dark:text-gray-400 dark:hover:text-white"
                    >
                        Register
                    </Link>
                </template>
            </div>
        </div>
        <div class="flex-1">
            <Hero />
            <Features />
        </div>
        <Footer />
    </div>
</template>
