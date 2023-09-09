<script setup>
    import {
        ArrowPathIcon,
        CloudArrowUpIcon,
        FingerPrintIcon,
        LockClosedIcon,
    } from '@heroicons/vue/24/outline'

    const features = [
        {
            name: 'Teams',
            description:
                'Collaborate with your team on a project, scope, or change. Add stakeholders, and get approvals all within the same app.',
            icon: FingerPrintIcon,
        },
        {
            name: 'Projects',
            description:
                'Keep up with all of your projects in one place. Great for freelancers, or small / medium businesses. ',
            icon: CloudArrowUpIcon,
        },
        {
            name: 'Scopes',
            description:
                "Add a scope to your project in order to keep up with new features / modules. Scopes contain budgets, tasks, as well as S.M.A.R.T goals towards your project's completion.",
            icon: LockClosedIcon,
        },
        {
            name: 'Changes',
            description:
                'Track changes on a single scope, in order to understand where extra time came from.',
            icon: ArrowPathIcon,
        },
    ]
</script>

<template>
    <div class="bg-white py-24 sm:py-32 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">
                    Plan & develop faster
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-gray-400"
                >
                    Everything you need to plan your app.
                </p>
                <p class="mt-6 mb-12 text-lg leading-8 text-gray-600">
                    Versatile software to streamline project planning,
                    execution, and monitoring. It empowers teams to efficiently
                    collaborate, allocate resources, set deadlines, and track
                    progress, ensuring projects are completed on time and within
                    budget.
                </p>
            </div>
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
                <dl
                    class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16"
                >
                    <div
                        v-for="feature in features"
                        :key="feature.name"
                        class="relative pl-16"
                    >
                        <dt
                            class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-400"
                        >
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600"
                            >
                                <component
                                    :is="feature.icon"
                                    class="h-6 w-6 text-white"
                                    aria-hidden="true"
                                />
                            </div>
                            {{ feature.name }}
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">
                            {{ feature.description }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>
