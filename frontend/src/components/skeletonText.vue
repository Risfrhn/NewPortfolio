<script lang="ts" setup>
    defineProps({
        lines : {
            type : Number,
            default : 3
        },
        width : {
            type : String,
            default : "full"
        }
    })
</script>

<template>
    <div class="space-y-3 animate-pulse">
        <div 
            v-for="n in lines" 
            :key="n" 
            class="h-4 bg-gray rounded" :class="{
                'w-full' : width === 'full',
                'w-3/4' : width === 'wide',
                'w-1/2' : width === 'half',
                'w-48' : width === 'short',
            }"
        ></div>
    </div>
</template>