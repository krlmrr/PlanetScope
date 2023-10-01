<script setup>
    import { useForm } from '@inertiajs/vue3'
    import Card from '@/Components/Containers/Card.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'

    const form = useForm({})
</script>

<template>
    <Card
        header="Scope Details"
        header-description="Details for your new scope."
    >
        <template #body>
            <div class="flex align-middle space-y-4">
                <TextInput label="Name" v-model="form.name" />
                <TextInput label="Author" v-model="form.author" />
            </div>
        </template>
    </Card>
</template>
