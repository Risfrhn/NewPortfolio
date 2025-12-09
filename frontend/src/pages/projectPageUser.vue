<script lang="ts" setup>
    import templateList from '@/components/listProject.vue'; 
    import CardProject from '@/components/cardProjectPribadi.vue';
    import searchButton from '@/components/searchButton.vue';
    import filterButton from '@/components/buttonFilter.vue';
    import { onMounted, ref, watch } from 'vue';
    import axios from 'axios';
    import Modal from '@/components/modal.vue';
    import ButtonRef from '@/components/buttonRef.vue';
    import Tabs from '@/components/tabs.vue';
    import tags from '@/components/iconTools.vue';
    import Pagination from "@/components/pagginationButton.vue";

    const openModal = ref(false)
    const selectedProject = ref<any>(null)
    const openModalProject = (project: any) => {
        selectedProject.value = project
        openModal.value = true
    }

    const images = [
        'Images.png'
    ] 

    const project = ref<any[]>([])
    const currentPage = ref(1)
    const lastPage  = ref(1)
    const getDataProject = async (page = 1) => {
        const res = await axios.get(`http://localhost:8000/api/Project/portfolio`)
        project.value = res.data.data.data
        currentPage.value = res.data.data.current_page
        lastPage.value = res.data.data.last_page
    }

    onMounted(()=>{
        getDataProject()
    })

</script>

<template>
    <div class="container w-full mx-auto">
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        

        <templateList title="My projects" desc="Some of my recent projects">
            <template #control>
                a
                <searchButton type="portfolio" @update="project = $event"/>
                <filterButton type="portfolio" @update="project = $event"/>
            </template>

            <template #card>
                <CardProject v-if="project.length > 0" v-for="(data, i) in project" :key="i" image="/Image.png" :name="data.project_name" :type="data.type_project" :desc="data.description_project" @click="openModalProject(data)"></CardProject>
            </template>
        </templateList>
        <div class="flex items-center justify-center my-10">
            <Pagination :currentPage="currentPage" :lastPage="lastPage" @change="getDataProject"/>
        </div>
    </div>
    <Modal v-if="selectedProject" v-model:open="openModal" 
        :name="selectedProject?.project_name" 
        :image="images" 
        :imageLogo="selectedProject?.logo_project" 
        :PtName="selectedProject?.Company" 
        :durasi="selectedProject?.start_project + '-' + selectedProject?.end_project" 
        :posisi="selectedProject?.position">
        <template #buttonBuy>
            <ButtonRef link="" name="Buy product" class="ml-auto"></ButtonRef>
        </template>
        <template #tags>
            <tags v-for="(tools, i) in selectedProject?.Tech" 
                    :key="i" 
                    :nameTool="tools"
            />
        </template>
        <template #tabsDeskription>
            <Tabs 
                id="1" 
                title="Description" 
                :desc="selectedProject?.project_name" 
                icon="fas fa-desktop">
                <p class="text-gray-600">{{ selectedProject?.description_project }}</p>
            </Tabs>
        </template>
        <template #tabsFeature>
            <Tabs 
                id="2" 
                title="Features" 
                :desc="selectedProject?.project_name" 
                icon="fas fa-desktop">
                <p class="text-gray-600">{{ selectedProject?.feature }}</p>
            </Tabs>
        </template>
    </Modal>
</template>
