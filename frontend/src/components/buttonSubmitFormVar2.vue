<script lang="ts" setup>
    const emit = defineEmits<{(e: 'click'): void}>()
    const props = defineProps<{
        name: string
        type?: 'submit' | 'button'
    }>()
</script>

<template>
    <button :type="props.type ?? 'button'" @click="emit('click')" class="inline-flex items-center justify-center p-3 text-sm font-medium tracking-wide text-white transition duration-300 rounded-full shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
        {{ name }}
    </button> 
</template>