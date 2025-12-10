<script lang="ts" setup>
    import { computed, onMounted, ref } from 'vue';

    defineSlots<{
        buttonSubmit: () => any,
        buttonClose: () => any,
    }>();

    const props = defineProps({
        text : {type:String, required:true},
        type : {type:String, default:'success'},
        duration: {type:Number, default: 0},
    })
    

    const visible = ref(true);
    const fadeClass = ref('opacity-0 translate-y-4')

    onMounted(()=>{
        visible.value = true
        setTimeout(()=>fadeClass.value = 'opacity-100 translate-y-0 transition-all duration-500 ease-out', 50)
        if(props.duration){
            setTimeout (()=>(visible.value = false), props.duration)
        }
    })

    const gif = computed(() => {
        switch (props.type) {
            case 'success': return '/Success.gif'
            case 'error': return '/Failed.gif'
            case 'warning': return '/Warning.gif'
            default: return 'bg-gray-500'
        }
    })
</script>

<template>
  <div v-if="visible" class="fixed inset-0 flex items-center justify-center bg-black/30">
    <div :class="['py-3 px-20 bg-[#1D1D29] rounded-lg flex flex-col items-center justify-center', fadeClass]">
      <img :src="gif" alt="">
      <p class="text-xl my-2 font-semibold min-h-[50px] bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent text-center">
        {{ text }}
      </p>
    </div>
  </div>
</template>


