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
    const product = ref<any[]>([])
    const detailProduct = ref<any>(null)
    const formDataProduct = ref<any>(null)
    

    // token sanctum
    const token = localStorage.getItem('token')

    // alert & loading
    const alertVisible = ref(false)
    const alertText = ref('')
    const alertType = ref<'success' | 'error' | 'warning'>('success');
    const loading = ref(false)


    // pagination
    const currentPage = ref(1)
    const lastPage =ref(1)

    // modal
    const openModal = ref(false)
    const openModalAction = ref(false)
    
    // const selectedType = ref('')
    // const Tech = ref<string[]>([])
    const modalMode = ref<'add' | 'update'>('add')
    const openDetailProduct = (product: any)=>{
        detailProduct.value = product
        openModal.value = true
    }
    const openFormModal = (mode: 'add' | 'update', product?: any)=>{
        modalMode.value = mode
        formDataProduct.value = product ? {...product, Tech: product.Tech ? [...product.Tech] : []}
        : createEmptyProduct()
        // Tech.value = product.Tech 
        // formDataProduct.value = product.type_project;
        openModalAction.value = true
        // console.log(selectedProjectAction.value)
    }
    // const openModalProjectActionAdd = (product: any)=>{
    //     modalMode.value = 'add';
    //     project.value = product
    //     Tech.value = product.Tech 
    //     selectedType.value = product.type_project;
    //     openModalAction.value = true
    // }

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
        {key: 'App dekstop', value:'App dekstop'},
        {key: 'Documentation', value:'Documentation'},
    ]

    const fetchData = async (page = 1) => {
        const res = await axios.get(`http://localhost:8000/api/Project/product?page=${page}`)
        product.value = res.data.data.data
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
    const createEmptyProduct = () => ({
        project_name: '',
        type_project: '',
        price: 0,
        Tech: [],
        description_project: '',
        feature: '',
        position: '',
        link_app: '',
        link_website: '',
        flyer_image: null,
        logo_project: null
    })

    const addData = async()=>{
        const data = new FormData()
        data.append('project_name', formDataProduct.value.project_name)
        data.append('description_project', formDataProduct.value.description_project)
        data.append('feature', formDataProduct.value.feature)
        data.append('position', formDataProduct.value.position)
        data.append('type',  'product')
        data.append('type_project',  formDataProduct.value.type_project)
        data.append('price', Number(formDataProduct.value.price).toFixed(2))
        data.append('link_app', formDataProduct.value.link_app)
        data.append('link_website', formDataProduct.value.link_website)
        formDataProduct.value.Tech.forEach((s:string)=>data.append(`Tech[]`, s))
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
        data.append('project_name', formDataProduct.value.project_name)
        data.append('description_project', formDataProduct.value.description_project)
        data.append('feature', formDataProduct.value.feature)
        data.append('position', formDataProduct.value.position)
        data.append('type',  'product')
        data.append('type_project',  formDataProduct.value.type_project)
        data.append('price', Number(formDataProduct.value.price).toFixed(2))
        data.append('link_app', formDataProduct.value.link_app)
        data.append('link_website', formDataProduct.value.link_website)
        formDataProduct.value.Tech.forEach((s:string)=>data.append(`Tech[]`, s))
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
                <buttonAddData name="Add Data" @click="openFormModal('add')"/>
            </div>
            <div class="flex ml-auto gap-2">
                <searchButton type="product" @update="product = $event"/>
                <filterButton type="product" @update="product = $event"/>
            </div>
        </div>      

        <tableProduct :columns="columns" :rows="product" :loading="loading">
            <template #cell-Tech="{row}">
                <tags class="scale-75" v-for="(tools, i) in row.Tech" :key="i" :nameTool="tools"/>
            </template>
            <template #cell-price="{row}">
                {{ formatingIDR(row.price) }}
            </template>
            <template #cell-action="{row}">
                <buttonAction name="Edit" type="edit" @click="openFormModal('update', row)"/>
                <buttonAction name="Delete" type="delete" @click="deleteData(row.id)"/>
                <buttonAction name="Detail" type="info" @click="openDetailProduct(row)"/>
            </template>
        </tableProduct>
    </div>
    <div class="flex items-center justify-center my-10">
        <Pagination :currentPage="currentPage" :lastPage="lastPage" @change="fetchData"/>
    </div>

    <Modal v-if="detailProduct" v-model:open="openModal"
        type="product"
        :name="detailProduct.project_name"
        :image="images" 
        :imageLogo="detailProduct?.logo_project" 
        :price="detailProduct.price" 
        
    >
        <template #tags>
            <tags v-for="(tools, i) in detailProduct?.Tech" :key="i" :nameTool="tools"></tags>
        </template>
        <template #tabsDeskription>
            <tabs
                id="1"
                title="Description"
                :desc="detailProduct.project_name"
                icon="fas fa-desktop">
                <p class="text-gray-600">{{ detailProduct?.description_project }}</p>
            </tabs>
        </template>
        <template #tabsFeature>
            <tabs
                id="1"
                title="Features"
                :desc="detailProduct.project_name"
                icon="fas fa-desktop">
                <p class="text-gray-600">{{ detailProduct?.feature }}</p>
            </tabs>
        </template>
    </Modal>

    <ModalAction v-if="formDataProduct && openModalAction" v-model:open="openModalAction"
        :name="modalMode === 'add' ? 'Add product' : 'Update product'"
        desc="Lorem ipsum dolor si amet"
    >
        <template #inputField0>
            <scrollImage />
            <inputImage v-if="formDataProduct" @change="onFlyerChange" :src="`http://localhost:8000/storage/${formDataProduct.flyer_image}`"/>
            <inputImage v-if="formDataProduct" @change="onLogoChange"/>
        </template>
         <template #inputField2>
            <inputField type="text" placeholder="Input text header here" label="Project name" v-model="formDataProduct.project_name"/>
            <inputField type="text" placeholder="Input text about here"  label="Position" v-model="formDataProduct.position"/>
            <dropdown label="Project type" :drop="dataDropdown" v-model="formDataProduct.type_project"/>
            <inputField type="text" placeholder="Input text about here"  label="Price" v-model="formDataProduct.price"/>
            <inputField type="text" placeholder="Input text header here" label="Link app" v-model="formDataProduct.link_app"/>
            <inputField type="text" placeholder="Input text about here"  label="Link web" v-model="formDataProduct.link_website"/>
        </template>
        <template #inputField1>
            <inputField type="text" placeholder="Input text about here"  label="Description project" v-model="formDataProduct.description_project"/>
            <inputField type="text" placeholder="Input text about here"  label="Feature" v-model="formDataProduct.feature"/>
        </template>
        <template #buttonSubmit>
            <tagsInput v-model="formDataProduct.Tech"/>
            <buttonSubmit @click="modalMode === 'add' ? addData() : updateData(formDataProduct.id)" name="Submit form"/> 
        </template>
    </ModalAction>
    <alert class="z-[9999]" v-if="alertVisible" :type="alertType" :text="alertText"/>
</template>