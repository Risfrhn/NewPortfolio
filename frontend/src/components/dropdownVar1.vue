
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
    <div class="flex flex-col">
        <p class="mb-2">{{ label }}</p>
        <select :value="modelValue" @change="update"  
            class="border-none rounded-lg block w-full px-3 py-2.5 text-gray-200 placeholder-gray-500 pr-10 bg-[#1e1e1e] shadow-[inset_4px_4px_8px_#141414,inset_-4px_-4px_8px_#2a2a2a] focus:shadow-[inset_6px_6px_12px_#141414,inset_-6px_-6px_12px_#2a2a2a] transition-all duration-300"
        >
            <option value="" disabled>Select project type</option>
            <option v-for="type in drop" :key="type.key" :value="type.value">{{ type.value }}</option>
        </select>
    </div>
</template>