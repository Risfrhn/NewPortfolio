
<script lang="ts" setup>
    import experienceCard from '@/components/experienceCard.vue';
    import templateList from '@/components/listProduct.vue';
    import searchButton from '@/components/searchButton.vue';
    import filterButton from '@/components/buttonFilter.vue';
    import { ref, watch } from 'vue';

    const experience = ref<any[]>([])
    const Search = ref("")
    const filter = ref("")

    async function fetchexperience(q: string, cat: string) {
        if(!q && !cat){
            experience.value = []
            return;
        }
        const res = await fetch(``)
        experience.value = await res.json()
    }

    watch([Search, filter], ([newValue, newfilter])=>{
        fetchexperience(newValue, newfilter)
    })
</script>

<template>
    <div class="container w-full mx-auto">
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        
        <templateList title="My journey" desc="Some of my recent projects">
            <template #control>
                <searchButton @update="Search =$event"/>
                <filterButton @update="filter =$event"/>
            </template>
            <template #card>
                <experienceCard image="" name="PT. Biofarma" type="Intern" posisi="Frontend | system analyst" periode="1 Juli - 1 Agustus" desc="Lorem ipsum dolor si apmet dolor dolor dolor dolro"/>
                <experienceCard image="" name="PT. Biofarma" type="Intern" posisi="Frontend | system analyst" periode="1 Juli - 1 Agustus" desc="Lorem ipsum dolor si apmet dolor dolor dolor dolro"/>
                <experienceCard image="" name="PT. Biofarma" type="Intern" posisi="Frontend | system analyst" periode="1 Juli - 1 Agustus" desc="Lorem ipsum dolor si apmet dolor dolor dolor dolro"/>
                <experienceCard image="" name="PT. Biofarma" type="Intern" posisi="Frontend | system analyst" periode="1 Juli - 1 Agustus" desc="Lorem ipsum dolor si apmet dolor dolor dolor dolro"/>
                <experienceCard image="" name="PT. Biofarma" type="Intern" posisi="Frontend | system analyst" periode="1 Juli - 1 Agustus" desc="Lorem ipsum dolor si apmet dolor dolor dolor dolro"/>
            </template>
        </templateList>
        
    </div>
</template>
