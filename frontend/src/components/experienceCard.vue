
<script setup lang="ts">
    defineProps<{
        image: string
        name: string
        type: string
        posisi: string
        periode: string
        desc: string
    }>()
    defineSlots<{
        button1: () => any,
        button2: () => any
    }>()
</script>

<template>
    <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
        <div class="relative w-full h-50 border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
            <div class="flex items-center gap-2 md:gap-5">
                <img :src="`${image}`" alt="" class="w-[80px] h-[80px] md:w-[100px] md:h-[100px] rounded-md md:rounded-xl">

                <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                    <div class="flex-1 min-w-0">
                        <p class="text-md md:text-lg font-semibold text-white truncate">{{ name }}<span>| {{ type }}</span></p>
                        <p class="text-xs text-gray-400 truncate">{{ posisi }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ periode }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ desc }}</p>
                    </div>
                    <slot name="button1"/>
                    <slot name="button2"/>
                </div>
            </div>
        </div>
    </div>
</template>
