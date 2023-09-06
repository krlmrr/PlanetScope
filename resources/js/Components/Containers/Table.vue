<script setup>
    defineProps({
        title: String,
        description: String,
        headers: Array,
        footnote: String,
        items: Array,
    })
</script>

<template>
    <div>
        <slot name="top" />

        <h1
            v-if="title"
            class="text-3xl my-2 font-extrabold tracking-tight text-center text-orange-600"
        >
            {{ title }}
        </h1>

        <p v-if="description" class="text-center">
            {{ description }}
        </p>

        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div
                        class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 border dark:border-gray-700 rounded-lg"
                    >
                        <table
                            class="min-w-full divide-y divide-gray-300 dark:text-gray-500 dark:bg-gray-800 dark:divide-gray-600"
                        >
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th
                                        v-for="header in headers"
                                        scope="col"
                                        class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 dark:text-gray-400"
                                    >
                                        {{ header }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody
                                class="divide-y divide-gray-200 bg-white dark:text-gray-500 dark:bg-gray-800 dark:divide-gray-600"
                            >
                                <tr
                                    class="text-center dark:text-gray-400 py-8"
                                    v-for="item in items"
                                >
                                    <slot :item="item" />
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <p v-if="footnote" class="text-center my-2 text-sm px-8 text-gray-600">
            {{ footnote }}
        </p>
    </div>
</template>
