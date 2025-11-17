<template>
    <button id="backToTop"
    class="fixed bottom-6 right-6 px-5 py-3 z-[999] hidden rounded-lg bg-gradient-to-r from-purple-500 to-indigo-600 text-white shadow-lg hover:shadow-[0_0_20px_rgba(130,90,250,0.6)] transition-all duration-300">
    ↑
    </button>
</template>

<script lang="ts" setup>
    import { onMounted } from 'vue';

    onMounted(()=>{
         const backToTop = document.getElementById('backToTop') as HTMLElement

        window.addEventListener('scroll', () =>{
            if(window.scrollY>500){
                backToTop.classList.remove('hidden')
            }else{
                backToTop.classList.add('hidden')
            }
        })

        backToTop.addEventListener('click', () =>{
            window.scrollTo({top:0, behavior:'smooth'})
        })
    })
</script>