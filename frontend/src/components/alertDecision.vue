<script lang="ts" setup>
    import { onMounted, ref, watch } from 'vue';

    defineSlots<{
        buttonSubmit: () => any,
    }>();

    const props = defineProps<{
        open: boolean,
        text: String,
    }>()

    const fadeClass = ref('opacity-0 translate-y-4')
    watch(()=>props.open, (newval)=>{
        if(newval){
            fadeClass.value = 'opacity-0 translate-y-4'
            setTimeout(()=>fadeClass.value = 'opacity-100 translate-y-0 transition-all duration-500 ease-out', 50)
        }
    })
    const emit = defineEmits<{
        (e: 'update:open', value:boolean):void
    }>()
</script>


<template>
    <div v-if="props.open" :class="['fixed inset-0 flex items-center justify-center', fadeClass]">
        <div class="py-3 px-20 bg-[#1D1D29] rounded-lg flex flex-col items-center justify-center">
            <img src="/Warning.gif" alt="">
            <p class="text-lg mb-5 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent text-center w-52">
                {{ text }}
            </p>
            <div class="flex flex-row gap-3 mb-5">
                <button @click="emit('update:open', false)" class="text-sm font-medium mx-2 md:mx-0 py-[8px] px-10 text-white text-red-600  rounded-full shadow-lg border-2 border-red-600 hover:bg-red-600  hover:text-white hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                    Close
                </button> 
                <slot name="buttonSubmit"/>
            </div>    
        </div>
    </div>
</template>