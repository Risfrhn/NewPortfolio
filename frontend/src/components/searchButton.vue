<script lang="ts" setup>
    import axios from 'axios';
    import { ref, watch } from 'vue';
    const props = defineProps({
        type: String
    })

    const result = ref<any[]>([])
    const keyword = ref('')
    const emit = defineEmits(['update'])

    let delay : any;
    
    watch(keyword, (value)=>{
        clearTimeout(delay)
        delay = setTimeout(async () => {
            try{
                const res = await axios.get(`http://localhost:8000/api/Project/Search/${props.type}?search=${value}`)
                    result.value = res?.data?.data ?? []

                    emit('update', result.value)
            }catch(e){
                console.log("error:", e)
            }
        },500)
    })        
</script>


<template>
    <div class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
        <input v-model="keyword" class="w-40 md:w-60 relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-md" placeholder="Search branch name..." required />
    </div>
</template>