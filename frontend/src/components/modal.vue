<script lang="ts" setup>
    const props = defineProps<{
        open:boolean
        image?: string[]
        imageLogo?: string
        name?: string
        PtName?: string
        durasi?: string
        posisi?: string
    }>()
    defineSlots<{
        buttonBuy?: () => any
        buttonClose?: () => any
        tabsFeature?: () => any
        tabsDeskription: () => any
        tags: () => any
    }>()
    const emit = defineEmits<{(e: 'update:open', value:boolean):void}>()
</script>
<template>
    <div v-if="props.open" class="fixed inset-0 bg-black/60 z-[9999] flex items-center justify-center p-4" @click.self="emit('update:open', false)">
        <div class="bg-[#0b0b14] text-white w-full max-w-6xl rounded-xl relative max-h-[85vh] overflow-y-auto translate-y-9">
            <div class="grid grid-cols-12 gap-4 p-6">
                <div class="col-span-12">
                    <div id="animation-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-base md:h-96">
                            <!-- Item 1 -->
                            <div v-for="(image, index) in props.image" key="index" class="duration-200 ease-linear" data-carousel-item="index === 0 ? 'active' : ''">
                                <img :src="`${image}`" class="w-full h-full object-cover" alt="...">
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="flex flex-wrap items-center">
                        <img :src="`${imageLogo}`" alt="" class="md:w-[90px] md:h-[90px] w-[70px] h-[70px]  rounded-md md:rounded-xl"></img>
                        <div class="col-span-12">
                            <p class="text-2xl font-bold px-3 bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent">{{ name }}</p>
                            <p class="text-gray-400 px-3">{{PtName}}</p>
                            <p class="text-xs text-gray-400 px-3">{{durasi}} || {{posisi}}</p>
                        </div>
                        <div class="col-span-12 mt-10 md:mt-0 md:ml-auto md:mx-0 mx-auto md:flex flex-col gap-2">
                            <slot name="buttonBuy"/>
                            <button @click="emit('update:open', false)" class="text-sm font-medium mx-2 md:mx-0 py-[8px] px-10 text-white text-red-600  rounded-full shadow-lg border-2 border-red-600 hover:bg-red-600  hover:text-white hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                Close
                            </button> 
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mb-5">
                    <p class="my-5 text-xl font-bold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent">Tools Tech</p>
                    <div class="w-full h-[2px] my-5 bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
                    <div class="flex flex-wrap gap-4">
                        <slot name="tags"/>
                    </div>
                </div>
                <div class="col-span-12">
                    <slot name="tabsDeskription"/>
                </div>
                <div class="col-span-12">
                    <slot name="tabsFeature"/>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    /* Vertikal & horizontal */
    ::-webkit-scrollbar {
    display: none; /* untuk Chrome, Edge, Safari */
    }
    html, body {
    -ms-overflow-style: none;  /* IE dan Edge */
    scrollbar-width: none;     /* Firefox */
    }
</style>