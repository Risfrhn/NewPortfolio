
<script lang="ts" setup>
    const props = defineProps<{
        label : string
        drop : {key: string, value:string}[]
        modelValue?: string
    }>()

    const emit = defineEmits<{
        (e: 'update:modelValue', value: string): void
    }>()

    const update = (e: Event)=>{
        const target = e.target as HTMLSelectElement
        emit('update:modelValue', target.value)
    }
</script>

<template>
    <label class="block text-sm font-medium text-gray-700">{{ label }}</label>
    <select :value="modelValue" @change="update"  
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
    >
        <option value="" disabled>Select project type</option>
        <option v-for="type in drop" :key="type.key" :value="type.value">{{ type.value }}</option>
    </select>
</template>