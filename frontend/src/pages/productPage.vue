<script lang="ts" setup>
    import templateList from '@/components/listProject.vue'; 
    import CardProduct from '@/components/cardProduct.vue';
    import searchButton from '@/components/searchButton.vue';
    import filterButton from '@/components/buttonFilter.vue';
    import templateListProduct from '@/components/listProduct.vue';
    import { ref, watch } from 'vue';

    const product = ref<any[]>([])
    const Search = ref("")
    const filter = ref("")

    async function fetchproduct(q: string, cat: string) {
        if(!q && !cat){
            product.value = []
            return;
        }
        const res = await fetch(``)
        product.value = await res.json()
    }

    watch([Search, filter], ([newValue, newfilter])=>{
        fetchproduct(newValue, newfilter)
    })
</script>

<template>
    <div class="container w-full mx-auto">
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        

        <templateListProduct title="Built with Code, Designed for You" desc="Ready-to-use web applications built for performance and simplicity">
            <template #control>
                <searchButton @update="Search =$event"/>
                <filterButton @update="filter =$event"/>
            </template>

            <template #card>
                    <CardProduct name="Hris" image="/Image.png" desc="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique."></CardProduct>
                    <CardProduct name="Hris" image="/Image.png" desc="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique."></CardProduct>
                    <CardProduct name="Hris" image="/Image.png" desc="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique."></CardProduct>
                    <CardProduct name="Hris" image="/Image.png" desc="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique."></CardProduct>
                    <CardProduct name="Hris" image="/Image.png" desc="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique."></CardProduct>
                    <CardProduct name="Hris" image="/Image.png" desc="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique."></CardProduct>
            </template>
        </templateListProduct>
    </div>
</template>
