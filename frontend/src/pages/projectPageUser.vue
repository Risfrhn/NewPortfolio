<script lang="ts" setup>
    import templateList from '@/components/listProject.vue'; 
    import CardProject from '@/components/cardProjectPribadi.vue';
    import searchButton from '@/components/searchButton.vue';
    import filterButton from '@/components/buttonFilter.vue';
    import { ref, watch } from 'vue';

    const project = ref<any[]>([])
    const Search = ref("")
    const filter = ref("")

    async function fetchproject(q: string, cat: string) {
        if(!q && !cat){
            project.value = []
            return;
        }
        const res = await fetch(``)
        project.value = await res.json()
    }

    watch([Search, filter], ([newValue, newfilter])=>{
        fetchproject(newValue, newfilter)
    })
</script>

<template>
    <div class="container w-full mx-auto">
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        

        <templateList title="My projects" desc="Some of my recent projects">
            <template #controls>
                <searchButton @update="Search =$event"/>
                <filterButton @update="filter =$event"/>
            </template>

            <template #card>
                <CardProject image="/Image.png" name="Lalalili.com" type="App mobile" desc="lorem sasias asdjhasjhd asdjnjaskd ajsnd jkasdnkas asjdn aksjd asnd akd n"></CardProject>
                <CardProject image="/Image.png" name="Lalalili.com" type="App mobile" desc="lorem sasias asdjhasjhd asdjnjaskd ajsnd jkasdnkas asjdn aksjd asnd akd n"></CardProject>
                <CardProject image="/Image.png" name="Lalalili.com" type="App mobile" desc="lorem sasias asdjhasjhd asdjnjaskd ajsnd jkasdnkas asjdn aksjd asnd akd n"></CardProject>
                <CardProject image="/Image.png" name="Lalalili.com" type="App mobile" desc="lorem sasias asdjhasjhd asdjnjaskd ajsnd jkasdnkas asjdn aksjd asnd akd n"></CardProject>
                <CardProject image="/Image.png" name="Lalalili.com" type="App mobile" desc="lorem sasias asdjhasjhd asdjnjaskd ajsnd jkasdnkas asjdn aksjd asnd akd n"></CardProject>
                <CardProject image="/Image.png" name="Lalalili.com" type="App mobile" desc="lorem sasias asdjhasjhd asdjnjaskd ajsnd jkasdnkas asjdn aksjd asnd akd n"></CardProject>
            </template>
        </templateList>
    </div>
</template>
