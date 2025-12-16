<script lang="ts" setup>
    import axios from 'axios';
import { onMounted, ref, watch } from 'vue';
    const props = defineProps({
      type: String
    })

    const option = ref<any>(null)
    const result = ref<any[]>([])
    const selected = ref("")

    const emit = defineEmits(['update'])
    let delay: any;

    const fetchOption = async () =>{
      try{
        const res = await axios.get(`http://localhost:8000/api/Project/Fetch-Filter/${props.type}`);
        option.value = res.data.data
      }catch(e){
        console.log("error:", e)
      }
    }

    onMounted(()=>{
      fetchOption()
    })

    watch(selected, (value)=>{
      clearTimeout(delay)
      delay = setTimeout(async()=>{
          try{
            const res = await axios.get(`http://localhost:8000/api/Project/Filter/${props.type}?filter=${value}`)
            result.value = res.data.data
            console.log("datanya", result.value)
            emit('update', result.value)
          }catch(e){
            console.log("error:", e)
          }
      })
    })
</script>

<template>
    <label class="relative inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 hover:from-purple-600 hover:to-blue-500 cursor-pointer">
      <span class="px-2 md:px-4 py-2.5 bg-[#0b0b14] rounded-md transition-all duration-150 ease-in-out group-hover:bg-transparent">
        Filter
      </span>
      <select v-model="selected" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer bg-gray-600">
          <option value="">All categories</option>
          <option v-for="c in option" :key="c" :value="c">
            {{ c }}
          </option>
      </select>
    </label>
</template>