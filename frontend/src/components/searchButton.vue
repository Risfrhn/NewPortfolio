<script lang="ts" setup>
    import { ref } from 'vue';

    const emit = defineEmits<{(e: 'update', value: string): void}>()

    const keyword = ref('')
    let time: number | undefined
    function handelRequest(){
        clearTimeout(time)
        time = setTimeout(()=>{
            emit('update', keyword.value)
        },400)
    }
</script>


<template>
    <div class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
        <input v-model="keyword" @input="handelRequest" class="w-40 md:w-60 relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-md" placeholder="Search branch name..." required />
    </div>
</template>