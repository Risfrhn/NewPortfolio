<script lang="ts" setup>
    import counterCard from "@/components/counterCard.vue";
    import buttonModal from "@/components/buttonSubmitForm.vue"
    import modal from "@/components/modalVar2.vue"
    import inputField from "@/components/fieldInput.vue"
    import fieldInputArray from "@/components/fieldInputArray.vue"
    import tags from '@/components/iconTags.vue';
    import buttonSubmit from "@/components/buttonSubmitFormVar2.vue"
    import { onMounted, ref } from "vue";
    import axios from "axios";

    const openModal = ref(false)
    const dataModal = ref<any>(null);
    const openModalDataLanding = (landingData: any)=>{
        dataModal.value=landingData
        openModal.value = true
    }

    const token = localStorage.getItem('token')
    const skill = ref<string[]>([])
    const aboutDesk = ref('')
    const headerDesk = ref('')
    const CV = ref<File | null>(null)
    const data = ref<any>()

    const getData = async()=>{
        const res = await axios.get('http://localhost:8000/api/Landing')
        data.value = res.data[0]
        skill.value = res.data[0].HeaderSkill
    }

    const onFileChange = (e: Event) => {
        const target = e.target as HTMLInputElement
        if (target.files && target.files.length > 0) {
            CV.value = target.files[0] ?? null
        }
    }

    const updateData = async ()=>{
        const formData = new FormData()
        formData.append('HeaderDesk', headerDesk.value)
        formData.append('AboutDesk', aboutDesk.value)
        formData.append('HeaderSkill', JSON.stringify(skill.value))
        if (CV.value) {
            formData.append('CV', CV.value)
        }

        await axios.post(`http://localhost:8000/api/UpdatedLanding`, formData, 
            {
                headers:{
                    'content-type' : 'multipart/form-data',
                    'Authorization' : `Bearer ${token}`
                }
            }
        )
    }

    

    onMounted(()=>{
        getData()
    })
</script>

<template>
    <div class="w-full">
        <div class="absolute z-1 w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[50px] left-[-100px]"></div>
        <div class="hidden  md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        <buttonModal @click="openModalDataLanding(data)" class="my-5" name="Edit Landing page" />
        <modal v-if="dataModal" class="z-[9999]" name="Edit data landing page" desc="Update any landing page content or details that need changes here">
            <template #tagSlot>
                <tags class="scale-75" nameTool="Landing Information"/>
            </template>
            <template #inputField1>
                    <inputField type="text" placeholder="Input text header here" v-model="headerDesk" :value="dataModal.HeaderDesk"/>
                    <inputField type="text" placeholder="Input text about here" v-model="aboutDesk" :value="dataModal.AboutDesk"/>
                    <inputField type="file" placeholder="Upload CV here" @change="onFileChange"/>
                    <p v-if="dataModal?.CV" class="text-sm text-gray-500 mt-1">
                        Current file: {{ dataModal.CV.split('/').pop() }}
                    </p>
                    <fieldInputArray v-model="skill"/>
            </template>
            <template #buttonSubmit>
                <buttonSubmit @click="updateData" name="Submit form"/>
            </template>
        </modal>
        <div class="flex flex-row mb-5">
            <div class="w-full p-10 bg-[#1D1D29]/30 rounded-md hidden md:block z-[99] backdrop-blur-lg shadow-xl">
                <div class="flex flex-row">
                    <div class="col-span-12">
                        <p class="text-xl lg:text-4xl font-bold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent">Welcome back Mr.Risky</p>
                        <p class="w-72 lg:w-96 text-[10px] lg:text-sm text-gray-500">Hey there! I was wondering if you have any good news or positive updates to share today?</p>
                    </div>
                    <img class=" absolute right-10 -top-5 lg:right-10 lg:-top-16 w-40 lg:w-52" src="/Finance.gif" alt="">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <counterCard :count=20 text="Total project" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
            <counterCard :count=20 text="Total project" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
            <counterCard :count=20 text="Total project" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
        </div>
        <div class="flex flex-row my-5">
            <div class="w-full bg-white p-5">
                <p>Dasboard element</p>
            </div>
        </div>
    </div>
</template>