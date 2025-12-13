<script lang="ts" setup>
    import counterCard from "@/components/counterCard.vue";
    import tableProduct from "@/components/tableVar1.vue";
    import axios from "axios";
    import { onMounted, ref } from "vue";
    import tags from '@/components/iconTags.vue';
    import buttonAction from '@/components/buttonAction.vue';
    import searchButton from '@/components/searchButton.vue';
    import filterButton from '@/components/buttonFilter.vue';
    import Pagination from "@/components/pagginationButton.vue";
    import Modal from '@/components/modal.vue';
    import ModalAction from '@/components/modalVar2.vue';
    import Tabs from '@/components/tabs.vue';
    import scrollImage from '@/components/scrollImageAction.vue'
    import inputImage from '@/components/inputFileVar1.vue'
    import inputField from "@/components/fieldInput.vue"

    // data project
    const project = ref<any[]>([])
    const loading = ref(false)

    // pagination
    const currentPage = ref(1)
    const lastPage =ref(1)

    // modal
    const openModal = ref(false)
    const openModalAction = ref(false)
    const selectedProject = ref<any>(null)
    const selectedProjectAction = ref<any>(null)
    const openModalProject = (product: any)=>{
        selectedProject.value = product
        openModal.value = true
    }
    const openModalProjectAction = (product: any)=>{
        selectedProjectAction.value = product
        openModalAction.value = true
    }
    const columns = [
        {key:'project_name', label:'Product name'},
        {key:'type_project', label:'Category'},
        {key:'Tech', label:'Tech'},
        {key:'price', label:'Price'},
        {key:'action', label:'Action'},
    ]

    // fetch data tabel
    const fetchData = async (page = 1) => {
        const res = await axios.get(`http://localhost:8000/api/Project/product?page=${page}`)
        project.value = res.data.data.data
        currentPage.value = res.data.data.current_page
        lastPage.value = res.data.data.last_page
    }

    // Delete data tabel
    const deleteData = async (id: number) => {
        const res = await axios.delete(`http://localhost:8000/api/Project/DeleteProjects/${id}`)
        fetchData()
    }

    const updateData = async (id: number)=>{
        const res = await axios.patch(`http://localhost:8000/api/Project/UpdateProjects/${id}`)
        fetchData()
    }

    onMounted(()=>{
        fetchData()
    })

    // dummy data
    const images = [
        'Images.png'
    ]
</script>

<template>
    <div class="w-full">
        <div class="absolute z-1 w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[50px] left-[-100px]"></div>
        <div class="hidden  md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        <p class="text-4xl lg:my-2 font-semibold min-h-[50px] bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">My Product</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <counterCard :count=20 text="Total product" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
            <counterCard :count=20 text="Total Viewer" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
            <counterCard :count=20 text="Total user" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
        </div>

        <div class="flex justify-end gap-2 my-5">
            <searchButton type="product" @update="project = $event"/>
            <filterButton type="product" @update="project = $event"/>
        </div>
        

        <tableProduct :columns="columns" :rows="project" :loading="loading">
            <template #cell-Tech="{row}">
                <tags class="scale-75" v-for="(tools, i) in row.Tech" :key="i" :nameTool="tools"/>
            </template>
            <template #cell-action="{row}">
                <buttonAction name="Edit" type="edit" @click="openModalProjectAction(row)"/>
                <buttonAction name="Delete" type="delete" @click="deleteData(row.id)"/>
                <buttonAction name="Detail" type="info" @click="openModalProject(row)"/>
            </template>
        </tableProduct>
    </div>
    <div class="flex items-center justify-center my-10">
        <Pagination :currentPage="currentPage" :lastPage="lastPage" @change="fetchData"/>
    </div>

    <Modal v-if="selectedProject" v-model:open="openModal"
        type="product"
        :name="selectedProject.project_name"
        :image="images" 
        :imageLogo="selectedProject?.logo_project" 
        :price="selectedProject.price" 
        
    >
        <template #tags>
            <tags v-for="(tools, i) in selectedProject?.Tech" :key="i" :nameTool="tools"></tags>
        </template>
        <template #tabsDeskription>
            <tabs
                id="1"
                title="Description"
                :desc="selectedProject.project_name"
                icon="fas fa-desktop">
                <p class="text-gray-600">{{ selectedProject?.description_project }}</p>
            </tabs>
        </template>
        <template #tabsFeature>
            <tabs
                id="1"
                title="Features"
                :desc="selectedProject.project_name"
                icon="fas fa-desktop">
                <p class="text-gray-600">{{ selectedProject?.feature }}</p>
            </tabs>
        </template>
    </Modal>
    <ModalAction v-if="selectedProjectAction && openModalAction" v-model:open="openModalAction"
        name="Update product"
        desc="Lorem ipsum dolor si amet"
    >
        <template #inputField0>
            <scrollImage/>
        </template>
         <template #inputField2>
            <inputImage/>
            <inputImage/>
            <inputField type="text" placeholder="Input text header here" label="Project name"/>
            <inputField type="text" placeholder="Input text about here"  label="Position"/>
            <inputField type="text" placeholder="Input text header here" label="Type project"/>
            <inputField type="text" placeholder="Input text about here"  label="Price"/>
            <inputField type="text" placeholder="Input text header here" label="Link app"/>
            <inputField type="text" placeholder="Input text about here"  label="Link web"/>
        </template>
        <template #inputField1>
            <inputField type="text" placeholder="Input text about here"  label="Description project"/>
            <inputField type="text" placeholder="Input text about here"  label="Tech stack"/>
        </template>
    </ModalAction>
</template>