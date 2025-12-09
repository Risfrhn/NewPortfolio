<script lang="ts" setup>
import { computed } from 'vue';

    const props = defineProps({
        currentPage : {
            type: Number,
            default: 1
        },
        lastPage : {
            type: Number,
            default: 1
        },
    })

    const emit = defineEmits(['change'])

    function goTo(page: number){
        if(page < 1 || page > props.lastPage)return;
        emit('change', page);
    }

    const slidingPage = computed(()=>{
        const total = props.lastPage;
        const current = props.currentPage;
        const max = 5;

        let start = Math.max(1, current - Math.floor(max/2));
        let end = start + max - 1

        if(end>total){
            end = total;
            start = Math.max(1, end - max + 1)
        }

        return Array.from({length: end - start + 1}, (_, i) => start + i)
    })
</script>

<template>
    <nav aria-label="Page navigation example" class="flex items-center space-x-4">
        <ul class="flex -space-x-px text-sm">
            <li>
                <button @click="goTo(currentPage - 1)" :disabled="currentPage === 1" class="flex items-center justify-center text-white bg-neutral-secondary-medium border border-2 rounded-tl-xl rounded-bl-xl border-[#a78bfa] hover:text-heading shadow-xs font-medium leading-5 rounded-s-base text-sm px-3 h-9 focus:outline-none">Back</button>
            </li>
            <li v-for="page in slidingPage" :key="page">
                <button @click="goTo(page)" :class="['flex items-center justify-center text-white bg-neutral-secondary-medium border border-2 border-[#a78bfa] hover:text-heading shadow-xs font-medium leading-5 text-sm w-9 h-9 focus:outline-none', 
                    page === currentPage
                    ? 'text-fg-brand bg-neutral-tertiary-medium'
                    : 'text-white bg-neutral-secondary-medium hover:bg-neutral-tertiary-medium hover:text-heading'    
                ]">{{ page }}</button>
            </li>
            <li>
                <button @click="goTo(currentPage + 1)" :disabled="currentPage === lastPage" class="flex items-center justify-center text-white bg-neutral-secondary-medium border-2 rounded-tr-xl rounded-br-xl border-[#a78bfa] hover:text-heading shadow-xs font-medium leading-5 rounded-s-base text-sm px-3 h-9 focus:outline-none">Next</button>
            </li>
        </ul>
    </nav>
</template>