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
    import tagsInput from "@/components/fieldInputArray.vue"
    import buttonSubmit from "@/components/buttonSubmitFormVar2.vue"
    import dropdown from "@/components/dropdownVar1.vue"
    import alert from "@/components/alert.vue"
    import buttonAddData from "@/components/buttonSubmitForm.vue"

    // data project
    const project = ref<any[]>([])
    const loading = ref(false)

    // token sanctum
    const token = localStorage.getItem('token')

    // alert
    const alertVisible = ref(false)
    const alertText = ref('')
    const alertType = ref<'success' | 'error' | 'warning'>('success');


    // pagination
    const currentPage = ref(1)
    const lastPage =ref(1)

    // modal
    const openModal = ref(false)
    const openModalAction = ref(false)
    const selectedProject = ref<any>(null)
    const selectedProjectAction = ref<any>(null)
    const selectedType = ref('')
    const Tech = ref<string[]>([])
    const modalMode = ref<'add' | 'update'>('add')
    const openModalProject = (product: any)=>{
        selectedProject.value = product
        openModal.value = true
    }
    const openModalProjectAction = (product: any)=>{
        modalMode.value = 'update';
        selectedProjectAction.value = {...product}
        Tech.value = product.Tech 
        selectedType.value = product.type_project;
        openModalAction.value = true
        console.log(selectedProjectAction.value)
    }
    const openModalProjectActionAdd = (product: any)=>{
        modalMode.value = 'add';
        project.value = product
        Tech.value = product.Tech 
        selectedType.value = product.type_project;
        openModalAction.value = true
    }

    // Formating IDR
    const formatingIDR = (value: number | null)=>{
        return new Intl.NumberFormat('id-ID',{
            style: 'currency',
            currency: 'IDR'
        }).format(value ?? 0)
    }

    // fetch data tabel
    const columns = [
        {key:'project_name', label:'Product name'},
        {key:'type_project', label:'Category'},
        {key:'Tech', label:'Tech'},
        {key:'price', label:'Price'},
        {key:'action', label:'Action'},
    ]

    const dataDropdown = [
        {key: 'Website', value:'Website'},
        {key: 'App mobile', value:'App mobile'},
        {key: 'UI/UX Design', value:'UI/UX Design'},
        {key: 'App desktop', value:'App desktop'},
        {key: 'Documentation', value:'Documentation'},
    ]
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

    const imageFlyer = ref<File | null>(null)
    const onFlyerChange = (e: Event)=>{
        const target = e.target as HTMLInputElement
        if(target.files && target.files.length > 0){
            imageFlyer.value = target.files[0] ?? null
        }else{
            imageFlyer.value = null
        }
    }

    const imageLogo = ref<File | null>(null)
    const onLogoChange = (e: Event)=>{
        const target = e.target as HTMLInputElement
        if(target.files && target.files.length > 0){
            imageLogo.value = target.files[0] ?? null
            
        }else{
            imageLogo.value = null
        }
    }

    const addData = async()=>{
        const data = new FormData()
        data.append('project_name', selectedProjectAction.value.project_name)
        data.append('description_project', selectedProjectAction.value.description_project)
        data.append('feature', selectedProjectAction.value.feature)
        data.append('position', selectedProjectAction.value.position)
        data.append('type_project',  selectedType.value)
        data.append('price', Number(selectedProjectAction.value.price).toFixed(2))
        data.append('link_app', selectedProjectAction.value.link_app)
        data.append('link_website', selectedProjectAction.value.link_website)
        Tech.value.forEach(s=>data.append(`Tech[]`, s))
        if(imageFlyer.value){
            data.append('flyer_image', imageFlyer.value ?? null)
        }
        if(imageLogo.value){
            data.append('logo_project', imageLogo.value ?? null)
        }
        try{
            await axios.post(`http://localhost:8000/api/Project/CreateProjects`, data,
                {
                    headers:{
                        'content-type' : 'multipart/form-data',
                        'Authorization' : `Bearer ${token}`
                    }
                }
            )
            alertVisible.value = true
            alertText.value = 'Success update product'
            alertType.value = 'success'
            setTimeout(() => {
                openModalAction.value = false
                alertVisible.value = false
                fetchData()
            }, 3000);
        }catch(err: any){
            console.error('error', err.message?.data || err.message)
        }
    }

    const updateData = async (id: number)=>{
        const data = new FormData()
        data.append('project_name', selectedProjectAction.value.project_name)
        data.append('description_project', selectedProjectAction.value.description_project)
        data.append('feature', selectedProjectAction.value.feature)
        data.append('position', selectedProjectAction.value.position)
        data.append('type_project',  selectedType.value)
        data.append('price', Number(selectedProjectAction.value.price).toFixed(2))
        data.append('link_app', selectedProjectAction.value.link_app)
        data.append('link_website', selectedProjectAction.value.link_website)
        Tech.value.forEach(s=>data.append(`Tech[]`, s))
        if(imageFlyer.value){
            data.append('flyer_image', imageFlyer.value ?? null)
        }
        if(imageLogo.value){
            data.append('logo_project', imageLogo.value ?? null)
        }
        data.append('_method', 'PATCH');
        try{
            await axios.post(`http://localhost:8000/api/Project/UpdateProjects/${id}`, data,
                {
                    headers:{
                        'content-type' : 'multipart/form-data',
                        'Authorization' : `Bearer ${token}`
                    }
                }
            )
            alertVisible.value = true
            alertText.value = 'Success update product'
            alertType.value = 'success'
            setTimeout(() => {
                openModalAction.value = false
                alertVisible.value = false
                fetchData()
            }, 3000);
        }catch (err: any){
            console.error('error: ', err.response?.data || err.message)
        }
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

        <div class="flex flex-row gap-3 my-5">
            <div class="flex justify-start">
                <buttonAddData name="Add Data" @click="openModalProjectActionAdd(project)"/>
            </div>
            <div class="flex ml-auto gap-2">
                <searchButton type="product" @update="project = $event"/>
                <filterButton type="product" @update="project = $event"/>
            </div>
        </div>      

        <tableProduct :columns="columns" :rows="project" :loading="loading">
            <template #cell-Tech="{row}">
                <tags class="scale-75" v-for="(tools, i) in row.Tech" :key="i" :nameTool="tools"/>
            </template>
            <template #cell-price="{row}">
                {{ formatingIDR(row.price) }}
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
        :name="modalMode === 'add' ? 'Add product' : 'Update product'"
        desc="Lorem ipsum dolor si amet"
    >
        <template #inputField0>
            <scrollImage />
            <inputImage v-if="selectedProjectAction" @change="onFlyerChange" :src="`http://localhost:8000/storage/${selectedProjectAction.flyer_image}`"/>
            <inputImage v-if="selectedProjectAction" @change="onLogoChange"/>
        </template>
         <template #inputField2>
            <inputField type="text" placeholder="Input text header here" label="Project name" v-model="selectedProjectAction.project_name"/>
            <inputField type="text" placeholder="Input text about here"  label="Position" v-model="selectedProjectAction.position"/>
            <dropdown label="Project type" :drop="dataDropdown" v-model="selectedType"/>
            <inputField type="text" placeholder="Input text about here"  label="Price" v-model="selectedProjectAction.price"/>
            <inputField type="text" placeholder="Input text header here" label="Link app" v-model="selectedProjectAction.link_app"/>
            <inputField type="text" placeholder="Input text about here"  label="Link web" v-model="selectedProjectAction.link_website"/>
        </template>
        <template #inputField1>
            <inputField type="text" placeholder="Input text about here"  label="Description project" v-model="selectedProjectAction.description_project"/>
            <inputField type="text" placeholder="Input text about here"  label="Feature" v-model="selectedProjectAction.feature"/>
        </template>
        <template #buttonSubmit>
            <tagsInput v-model="Tech"/>
            <buttonSubmit v-if="modalMode === 'update'" name="Submit form" @click="()=>updateData(selectedProjectAction.id)"/>
            <buttonSubmit v-if="modalMode === 'add'" name="Submit form" @click="()=>addData()"/>    
        </template>
    </ModalAction>
    <alert class="z-[9999]" v-if="alertVisible" :type="alertType" :text="alertText"/>
</template>