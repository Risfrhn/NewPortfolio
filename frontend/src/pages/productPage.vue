<script lang="ts" setup>
    import templateList from '@/components/listProject.vue'; 
    import CardProduct from '@/components/cardProduct.vue';
    import searchButton from '@/components/searchButton.vue';
    import filterButton from '@/components/buttonFilter.vue';
    import templateListProduct from '@/components/listProduct.vue';
    import buttonSubmit from '@/components/buttonSubmitForm.vue';
    import modal from '@/components/modal.vue';
    import tags from '@/components/iconTools.vue';
    import Tabs from "@/components/tabs.vue";
    import ButtonRef from "@/components/buttonRef.vue";
    import Pagination from "@/components/pagginationButton.vue";
    import { ref, onMounted } from 'vue';
    import axios from 'axios';

    const images = [
        "/Image.png"
    ];

    // MODAL
    const openModal = ref(false);
    const selectedProject = ref<any>(null);
    const openModalProject = (project: any) =>{
        selectedProject.value = project;
        openModal.value = true; 
    }
    // BATAS MODAL


    // FETCH DATA
    const dataProduct = ref<any[]>([]);
    const currentPage = ref(1)
    const lastPage = ref(1)
    const getDataProduct = async (page = 1) => {
        const res = await axios.get(`http://localhost:8000/api/Project/product?page=${page}`);
        dataProduct.value = res.data.data.data
        currentPage.value = res.data.data.current_page
        lastPage.value = res.data.data.last_page
    }
    // BATAS FETCH DATA

    onMounted(()=>{
        getDataProduct();
    })
</script>

<template>
    <div class="container w-full mx-auto">
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        

        <templateListProduct title="Built with Code, Designed for You" desc="Ready-to-use web applications built for performance and simplicity">
            <template #control>
                <searchButton type="product" @update="dataProduct = $event"/>
                <filterButton type="product" @update="dataProduct = $event"/>
            </template>

            <template #card>
                    <CardProduct
                        v-if="dataProduct.length > 0"
                        v-for="(data, i) in dataProduct" 
                        :key="i"
                        :name="data.project_name" 
                        :image="data.logo_image" 
                        :desc="data.description_project">
                        <template #button1>
                            <buttonSubmit 
                                @click="openModalProject(data)" 
                                link="" 
                                name="Detail">
                            </buttonSubmit>
                            <buttonSubmit name="Buy"/>
                        </template>
                    </CardProduct>
            </template>
        </templateListProduct>
        <div class="flex items-center justify-center my-10">
            <Pagination :currentPage="currentPage" :lastPage="lastPage" @change="getDataProduct"></Pagination>
        </div>
    </div>
    <modal v-if="selectedProject" v-model:open="openModal" 
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
    </modal>
</template>
