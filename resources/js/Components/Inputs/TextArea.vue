<script setup>
    import InputError from '@/Components/Inputs/InputError.vue'
    import InputLabel from '@/Components/Inputs/InputLabel.vue'

    defineProps({
        modelValue: String,
        label: String,
        errors: String,
    })
</script>

<template>
    <InputLabel v-if="label" class="mb-2 mx-2" :value="label + ' :'" />
    <textarea
        ref="input"
        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
    <InputError :message="errors" class="mt-2 mx-2" />
</template>
