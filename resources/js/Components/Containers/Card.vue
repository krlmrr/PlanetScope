<script setup>
    defineProps(['header', 'headerDescription'])
</script>

<template>
    <div
        class="max-w-7xl mx-auto space-y-5 py-5 bg-white shadow-xl sm:rounded-lg text-gray-500 dark:bg-gray-800"
    >
        <div class="border-b border-gray-200 dark:border-gray-700">
            <div
                class="flex flex-wrap items-center justify-between sm:flex-nowrap px-6 sm:px-6 lg:px-8 py-5"
            >
                <div class="">
                    <h3
                        class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-400"
                    >
                        {{ header }}
                    </h3>
                    <p v-if="headerDescription" class="pt-2 text-gray-500">
                        {{ headerDescription }}
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <slot name="actions" />
                </div>
            </div>
        </div>

        <div class="px-6 sm:px-6 lg:px-8">
            <slot name="body" />
        </div>

        <div
            v-if="$slots.footer"
            class="border-t border-gray-200 dark:border-gray-700 pt-5"
        >
            <div
                class="flex flex-wrap items-center justify-between sm:flex-nowrap px-6 sm:px-6 lg:px-8"
            >
                <slot name="footer" />
            </div>
        </div>
    </div>
</template>
