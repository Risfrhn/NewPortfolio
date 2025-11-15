<script lang="ts" setup>
import buttonRef from './buttonRef.vue'
    defineProps<{
        image: string
        name: string
        desc: string
    }>()
</script>

<template>
    <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
        <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
            <div class="flex items-center gap-2 md:gap-5">
                <img :src="`${image}`" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm md:text-md font-semibold text-white">{{ name }}</p>
                        <p class="text-xs md:text-sm text-white truncate">{{ desc }}</p>
                    </div>
                    <buttonRef name="Details" link=""></buttonRef>
                    <buttonRef name="Buy Now" link=""></buttonRef>
                    <!-- <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                        <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                            Details
                        </span>
                    </a>

                    <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                        <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                            Buy Now
                        </span>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</template>