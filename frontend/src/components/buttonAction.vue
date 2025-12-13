<script lang="ts" setup>
import { computed } from 'vue';

    const props = defineProps<{
        name: string,
        type: 'edit' | 'delete' | 'info'
    }>()

    const type = computed(()=>{
        switch(props.type){
            case 'edit': return 'bg-green-500'
            case 'delete': return 'bg-red-500'
            case 'info': return 'bg-blue-500'
        }
    })
</script>


<template>
    <button :class="['inline-flex items-center justify-center p-0.5 text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg focus-visible:outline-none whitespace-nowrap focus:outline-none', type]">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-[#1D1D29] rounded-md hover:bg-transparent">
            {{ name }}
        </span>
    </button> 
</template>