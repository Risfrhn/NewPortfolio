<script setup lang="ts">
    import { ref, onMounted, onBeforeUnmount, defineComponent, watch } from 'vue'
    import Typed from 'typed.js'
    import { useScrollStore } from '@/assets/ts/scroll';
    import Icon from "@/components/icon.vue";
    import Tabs from "@/components/tabs.vue";
    import contacts from "@/components/contact.vue";
    import SendMessages from "@/components/sendMessages.vue";
    import BackToTop from "@/components/buttonBackToTop.vue";
    import CardProject from "@/components/cardProjectPribadi.vue";
    import CardProduct from "@/components/cardProduct.vue";
    import CardService from "@/components/cardServices.vue";
    import ButtonRef from "@/components/buttonRef.vue";
    import buttonSubmit from '@/components/buttonSubmitForm.vue';
    import IconSosmed from '@/components/iconSosmed.vue';
    import templateListProduct from '@/components/listProduct.vue';
    import templateListProject from '@/components/listProject.vue';
    import modal from '@/components/modal.vue';
    import tags from '@/components/iconTags.vue';
    import axios from 'axios';
    
    // Modal
    const openModal = ref(false)
    const selectedProject = ref<any>(null);
    const openModalProject = (project: any)=>{
        selectedProject.value = project;
        openModal.value = true;
    }
    const images = [
        "/Image.png"
    ]

    // FETCH DATA
    // Landing data
    const dataLanding = ref<any>({})
    const fetchHeaderSkill = ref<string[]>([])
    const getDataLanding = async () =>{
        const res = await axios.get('http://localhost:8000/api/Landing')
        const data = res.data[0]
        dataLanding.value = res.data[0]
        fetchHeaderSkill.value = data.HeaderSkill;
    } 

    // Portfolio
    const dataPortfolio = ref<any[]>([]);
    const getDataPortfolio = async () =>{
        const res = await axios.get('http://localhost:8000/api/Project/portfolio');
        dataPortfolio.value = res.data.data.data;
    }
    

    // Product
    const dataProduct = ref<any[]>([])
    const getDataProduct = async () =>{ 
        const res = await axios.get('http://localhost:8000/api/Project/product');
        dataProduct.value = res.data.data.data;
    }
    // BATAS FETCH DATA

    // typed.js
    const typedElement = ref<HTMLElement | null>(null)
    let typedInstance: Typed | null = null
    

    onMounted(() => {
        // fetch data
        getDataLanding();
        getDataPortfolio();
        getDataProduct();


        // Typed.js
        watch(fetchHeaderSkill, (value) => {
            if(value.length > 0){
                typedInstance = new Typed(typedElement.value as HTMLElement, {
                    strings: value,
                    typeSpeed: 80,
                    backSpeed: 50,
                    backDelay: 1500,
                    loop: true,
                    showCursor: false,
                });
            }
        })


        // Scroll to top
        const scrolled = scroll.targetId
         if(scrolled){
            const el =document.getElementById(scrolled)
            if (el) el.scrollIntoView({behavior:'smooth'})
            scroll.reset()
         }
    });

    onBeforeUnmount(() => {
    if (typedInstance) typedInstance.destroy()
    });

    
    // untuk navbar
    const scroll = useScrollStore()
    watch(
        () => scroll.targetId,
        (id)=>{
            if(!id)return
                const el = document.getElementById(id)
                if(el)el.scrollIntoView({behavior:'smooth'})
                scroll.reset()
            }        
    )
</script>



<template>
    <div class="container w-full mx-auto">
        <!-- Flare -->
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        
        <!-- konten -->

        <!-- header -->
        <div id="HeroSection" class="flex flex-wrap p-4 place-content-center pt-20 md:pt-24 lg:pt-40">
            <div class="w-[100%] md:w-[50%]">
                <p class="text-white my-2">Hello, Im</p>
                <p class="text-white my-2 text-4xl lg:text-5xl font-semibold">Risky Farhan</p>
                <p class="text-4xl lg:text-5xl my-2 font-semibold min-h-[50px] bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" ref="typedElement"></p>
                <p class="text-white text-xs lg:text-[15px] my-2 font-thin">{{dataLanding.HeaderDesk}}</p>

                <div class="flex flex-wrap my-5 gap-40">
                    <div class="w-[0%]">
                        <ButtonRef link="" name="Download CV"></ButtonRef> 
                    </div>
                    <div class="w-[0%]">
                        <ButtonRef link="/Product" name="My product"></ButtonRef>
                    </div>
                </div>
                <div class="flex flex-nowrap gap-8">
                    <IconSosmed link="www.linkedin.com/in/muhammad-risky-farhan-596783309" icon="fab fa-linkedin"></IconSosmed>
                    <IconSosmed link="https://github.com/Risfrhn/" icon="fab fa-github"></IconSosmed>
                    <IconSosmed link="https://www.instagram.com/risfrhn_/" icon="fab fa-instagram"></IconSosmed>
                    <IconSosmed link="https://steamcommunity.com/id/Zoow1/" icon="fab fa-steam"></IconSosmed>
                </div>

            </div>
            <div class="w-[100%] md:w-[50%] py-14 flex justify-center hidden md:flex">
                
                <img src="/Boostrap.png" alt="" class="animate-icon-1 absolute w-10 h-10 translate-x-[300px] hidden xl:block">
                <img src="/Canva.png" alt="" class="animate-icon-1 absolute w-10 h-10 -translate-x-[150px] -translate-y-[100px]">
            
            
                <img src="/CI3.png" alt="" class="animate-icon-2 absolute w-10 h-10  -translate-x-[130px] -translate-y-[30px]">
                <img src="/Word.png" alt="" class="animate-icon-2 absolute w-10 h-10 translate-x-[150px]  xl:translate-x-[200px] -translate-y-[100px]">
            
            
                <img src="/Excel.png" alt="" class="animate-icon-3 absolute w-10 h-10 -translate-x-[170px] translate-y-[200px]">
                <img src="/Laravel.png" alt="" class="animate-icon-3 absolute w-10 h-10 -translate-x-[100px] translate-y-[250px]">
                <img src="/Tailwind.png" alt="" class="animate-icon-3 absolute w-10 h-10 translate-x-[150px] xl:translate-x-[250px] translate-y-[250px]">
                
                <div class="w-[200px] h-[200px] lg:w-[250px] lg:h-[250px] xl:w-[300px] xl:h-[300px] rounded-xl shadow-lg rotate-[10deg] border-4 border-[#a78bfa] animate-glow translate-x-6 lg:translate-x-14  -translate-y-4 lg:-translate-y-14" style="background: linear-gradient(#0b0b14, #0b0b14) padding-box, linear-gradient(to right, #a855f7, #3b82f6, #6366f1) border-box;">
                    <img src="/HeaderHero.png" alt="" class="w-60 h-60 lg:w-80 lg:h-80 xl:w-96 xl:h-96 object-cover rotate-[-10deg] lg:translate-x-10 xl:translate-x-14 translate-x-11 translate-y-7">
                </div>
            </div>
        </div>


        <!-- About me -->
        <div id="AboutSection" class="relative mt-14 md:mt-32 mb-24 md:mb-52 px-3">
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-4 hidden md:block">
                    <div class="w-[200px] h-[200px] lg:w-[250px] lg:h-[250px] xl:w-[300px] xl:h-[300px] rounded-xl shadow-lg rotate-[10deg] border-4 border-[#a78bfa] animate-glow translate-x-6 lg:translate-x-14  translate-y-11 lg:translate-y-10 xl:translate-y-1" style="background: linear-gradient(#0b0b14, #0b0b14) padding-box, linear-gradient(to right, #a855f7, #3b82f6, #6366f1) border-box;">
                        <img src="/HeaderHero.png" alt="" class="w-60 h-60 lg:w-80 lg:h-80 xl:w-96 xl:h-96 object-cover rotate-[-10deg] lg:translate-x-11 xl:translate-x-14 translate-x-11 translate-y-7">
                    </div>
                </div>
                <div class="col-span-12 md:col-span-8 md:ps-20">
                    <p class="text-white text-xs font-bold">About me</p>
                    <p class="text-3xl lg:text-5xl lg:my-2 font-semibold min-h-[50px] bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Get to know me better</p>
                    <p class="text-white text-[10px] lg:text-xs xl:text-sm font-thin leading-loose xl:leading-[25px] pb-5">{{dataLanding.AboutDesk}}</p>

                    <ButtonRef link="/Journey" name="My experience"></ButtonRef> 
                </div>
            </div>
        </div>


        <!-- Services -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="ServicesSection" class="relative my-24">
            <div class="grid grid-cols-12 gap-4 z-10 px-5">
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">How I can help</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1 mb-10">Transforming ideas into impactful digital experiences</p>
                </div>
                <div class="col-span-12 my-14 z-10">
                    <div class="flex flex-wrap gap-3 place-content-center">
                        <CardService icon="fas fa-laptop-code" name="Web development" desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd"></CardService>
                        <CardService icon="fas fa-laptop-code" name="Web development" desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd"></CardService>
                        <CardService icon="fas fa-laptop-code" name="Web development" desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd"></CardService>
                        <CardService icon="fas fa-laptop-code" name="Web development" desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd"></CardService>
                    </div>
                </div>
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">My expertise</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1 mb-10">The main tools supporting my work and expertise</p>
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <Tabs id="1" title="Web development" icon="fas fa-desktop" desc="Specializing in building responsive and user-friendly web applications.">
                        <Icon  nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                    </Tabs>
                </div>
                <div class="col-span-12 lg:col-span-6">
                   <Tabs id="2" title="Mobile development" icon="fas fa-mobile" desc="Specializing in building responsive and user-friendly web applications.">
                        <Icon  nameTool="Laravel" image="/Image.png" :level= "1"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                        <Icon nameTool="Laravel" image="/Image.png" :level= "4"/>
                   </Tabs>
                </div>
            </div>
            <div class="hidden sm:block absolute z-0 md:top-[400px] xl:top-[300px] left-1/2 w-[300px] h-[300px] md:w-[700px] md:h-[600px] xl:w-[900px] xl:h-[200px] rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 blur-[120px] -translate-x-1/2 -translate-y-1/2"></div>
            <i class="absolute z-0 top-[-60px] left-[50px] md:top-[-50px] md:left-[50px] fas fa-laptop-code text-[#a78bfa] text-[50px] md:text-[100px] lg:text-[170px] opacity-20 rotate-[-10deg]"></i>
            <i class="absolute z-0 top-[-60px] right-[50px] fas fa-code text-[#a78bfa] text-[50px] md:text-[100px] lg:text-[100px] opacity-20 rotate-[-10deg]"></i>
        </div>

        <!-- Portfolio -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="PortfolioSection" class="relative my-24">
            <templateListProject title="What I’ve Done" desc="Some of my recent projects">
                <img src="/Boostrap.png" alt="" class="animate-icon-1 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 left-[50px] top-[70px] md:left-[230px] md:top-[70px] xl:top-[90px] xl:left-[300px]">
                <img src="/Canva.png" alt="" class="animate-icon-1 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:left-[130px] left-[100px] top-[-30px] md:top-[30px] xl:top-[30px] xl:left-[150px]">
                <img src="/Excel.png" alt="" class="animate-icon-3 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:left-[200px] left-[30px] top-[10px] md:top-[-10px] xl:top-[-10px] xl:left-[400px]">
            
                <img src="/CI3.png" alt="" class="animate-icon-2 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:right-[230px] right-[50px] top-[70px] md:top-[70px] xl:top-[90px] xl:right-[300px]">
                <img src="/Word.png" alt="" class="animate-icon-2 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:right-[130px] right-[100px] top-[-30px] md:top-[30px] xl:top-[30px] xl:right-[150px]">
                <img src="/Laravel.png" alt="" class="animate-icon-3 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:right-[200px] right-[30px] top-[10px] md:top-[-10px] xl:top-[-10px] xl:right-[400px]">

                <template #card>
                    <CardProject 
                        v-if="dataPortfolio.length > 0"
                        v-for="(data, i) in dataPortfolio.slice(0,3)" 
                        :key="i"  
                        image="Image.png" 
                        :name="data.project_name || ''" 
                        :type="data.type_project || ''" 
                        :desc="data.description_project || ''"
                        @click="openModalProject(data)">
                    </CardProject>
                </template>
                <template #button>
                    <ButtonRef link="/Projects" name="Show all projects"></ButtonRef>
                </template>
            </templateListProject>
            <div class="hidden sm:block absolute z-[0] md:top-[500px] left-1/2 w-[300px] h-[300px] md:w-[500px] md:h-[700px]  lg:w-[900px] lg:h-[500px] rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 blur-[120px] transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>  
        
        <!-- Product -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="ProductSection" class="relative my-24">
            <templateListProduct title="Built with Code, Designed for You" desc="Ready-to-use web applications built for performance and simplicity">
                <template #card>
                    <CardProduct
                        v-if="dataProduct.length > 0"
                        v-for="(data, i) in dataProduct.slice(0, 6)" 
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
                <template #button>
                    <ButtonRef link="/Product" name="Show all product"></ButtonRef>
                </template>
            </templateListProduct>
            <div class="hidden sm:block absolute z-0 md:top-[300px] left-1/2 w-[300px] h-[300px] md:w-[500px] md:h-[700px]  lg:w-[900px] lg:h-[300px] rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 blur-[120px] transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>


        <!-- kontak -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="ContactSection" class="relative mt-24 mb-40 mx-3">
            <div class="grid grid-cols-12 my-24 gap-4 z-10">
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Get in touch</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1">Want to collaborate or build custom software? Get in touch!</p>
                </div>
                <div class="col-span-12">
                    <div class="grid grid-cols-12 my-10 h-full gap-4 z-10">
                        <div class="col-span-12 md:col-span-6 h-full bg-[#a78bfa]/10 rounded-xl pt-10 px-5">
                            <div class="col-span-12">
                                <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Send message</p>
                            </div>
                            <div class="col-span-12">
                                <p class="text-gray-500 text-center mt-1">Want to collaborate or build custom software? Get in touch!</p>
                            </div>
                            <SendMessages/>
                        </div>
                        <div class="col-span-12 md:col-span-6 h-full bg-[#a78bfa]/10  rounded-xl pt-10 px-5">
                            <div class="col-span-12">
                                <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Join Me Online</p>
                            </div>
                            <div class="col-span-12 mb-10">
                                <p class="text-gray-500 text-center mt-1">Stay in the loop with my projects and posts by following me.</p>
                            </div>
                            <div class="flex flex-wrap gap-3 md:place-content-center">
                                <contacts name="LinkedIn/Muhammad Risky Farhan" icon="fab fa-linkedin" link="www.linkedin.com/in/muhammad-risky-farhan-596783309" bgColor="#0077B5"></contacts>
                                <contacts name="Github/Risfrhn" icon="fab fa-github" link="https://github.com/Risfrhn/" bgColor="#4141aa"></contacts>
                                <contacts name="Instagram/risfrhn_" icon="fab fa-instagram" link="https://www.instagram.com/risfrhn_/" bgColor="#8900df"></contacts>
                                <contacts name="Email/rskyfrhn801@gmail.com" icon="fa-solid fa-envelope" link="" bgColor="#D44638"></contacts>
                                <contacts name="Steam/FarhanKebab" icon="fab fa-steam" link="https://steamcommunity.com/id/Zoow1/" bgColor="#012f9a"></contacts>
                                <contacts name="Whatsapp/+6281345765427" icon="fab fa-phone" link="wa.me/081345765427" bgColor="#25D366"></contacts>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <BackToTop/>
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



<style scoped>
    @keyframes glow {
    0%, 100% {
        filter: drop-shadow(0 0 8px rgba(168, 85, 247, 0.3));
    }
    50% {
        filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));
    }
    }

    .animate-glow {
    animation: glow 2s ease-in-out infinite;
    }

    @keyframes flare {
        0%, 100% { transform: translate(0,0) scale(1); opacity: 0.4; }
        50% { transform: translate(50px, 50px) scale(1.2); opacity: 0.6; }
    }

    @keyframes flare-slow {
        0%, 100% { transform: translate(0,0) scale(1); opacity: 0.3; }
        50% { transform: translate(-80px, -50px) scale(1.3); opacity: 0.5; }
    }

    .animate-flare {
        animation: flare 6s ease-in-out infinite;
    }

    .animate-flare-slow {
        animation: flare-slow 10s ease-in-out infinite;
    }
 
    
    @keyframes icon-animate {
        0%, 100% { transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) scale(0.5); opacity: 0.3; }
        50% { transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) scale(1.3); opacity: 0.5; }
    }


    
    .animate-icon-1{
        animation: icon-animate 5s ease-in-out infinite;
        animation-delay: 0s;
    }

    .animate-icon-2{
        animation: icon-animate 5s ease-in-out infinite;
        animation-delay: 2s;
    }

    .animate-icon-3{
        animation: icon-animate 5s ease-in-out infinite;
        animation-delay: 4s;
    }
</style>