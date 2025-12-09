<script lang="ts" setup>
    // import { computed, onMounted, ref } from 'vue';

    // const props = defineProps({
    //     text : {type:String, required:true},
    //     type : {type:String, default:'success'},
    //     duration: {type:Number, default: 0},
    // })
    

    // const visible = ref(true);

    // onMounted(()=>{
    //     if(props.duration){
    //         setTimeout (()=>(visible.value = false), props.duration)
    //     }
    // })

    // const bgClass = computed(() => {
    //     switch (props.type) {
    //         case 'success': return 'bg-green-500'
    //         case 'error': return 'bg-red-500'
    //         case 'warning': return 'bg-yellow-500'
    //         default: return 'bg-gray-500'
    //     }
    // })
</script>

<template>
    <!-- <div v-if="visible" :class="['py-3 px-5 absolute top-5 right-5 rounded-md text-white w-80', bgClass]">
        <img src="/GifLoading" alt="">
        {{ text }}
    </div> -->
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 py-3 px-5 rounded-md text-white w-80 bg-[#1D1D29]">
        <div class="flex flex-col items-center justify-center">
            <img src="/GifLoading.gif" alt="">
            <p></p>Success login
        </div>
    </div>
</template>

