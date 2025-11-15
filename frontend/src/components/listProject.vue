<script lang="ts" setup>
    defineProps<{
        title: string
        desc: string
    }>()
    defineSlots<{
        controls?: () => any
        card: () => any
        button?: () => any
        default: () => any
    }>()
</script>

<template>
    <div class="relative mt-36 mb-24 z-10">
        <div class="grid grid-cols-12 my-24 gap-4 z-10">
            <div class="col-span-12">
                <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">{{ title }}</p>
            </div>
            <div class="col-span-12">
                <p class="text-gray-500 text-center mt-1 mb-5">{{ desc }}</p>
                <slot/>
            </div>
            <div v-if="$slots.controls" class="col-span-12 md:flex justify-end mx-auto md:mx-3 mt-12"> 
                <div class="flex items-center gap-2">
                    <slot name="controls"/>
                </div>
            </div>
            <div class="col-span-12 mt-5">
                <div class="flex flex-wrap gap-3 justify-center">
                    <slot name="card"/> 
                </div>
            </div>
            <div v-if="$slots.button" class="col-span-12 mt-5">
                <div class="flex flex-wrap gap-3 justify-center">
                    <slot name="button"/> 
                </div>
            </div>
        </div>
    </div>
</template>