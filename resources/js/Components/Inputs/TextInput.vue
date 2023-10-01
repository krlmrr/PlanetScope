<script setup>
    import { onMounted, ref } from 'vue'
    import InputLabel from '@/Components/Inputs/InputLabel.vue'
    import InputError from '@/Components/Inputs/InputError.vue'

    defineProps({
        modelValue: String,
        label: String,
        type: String,
        errors: String,
    })

    defineEmits(['update:modelValue'])

    const input = ref(null)

    onMounted(() => {
        if (input.value.hasAttribute('autofocus')) {
            input.value.focus()
        }
    })

    defineExpose({ focus: () => input.value.focus() })
</script>

<template>
    <div class="bg-inherit border-transparent">
        <InputLabel v-if="label" class="mb-2 mx-2" :value="label + ' :'" />
        <input
            ref="input"
            :type="type"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <InputError :message="errors" class="mt-2 mx-2" />
    </div>
</template>
