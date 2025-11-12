<script setup lang="ts">
    import { ref, onMounted, onBeforeUnmount, defineComponent, watch } from 'vue'
    import Typed from 'typed.js'
    import { useScrollStore } from '@/assets/ts/scroll';

    const typedElement = ref<HTMLElement | null>(null)
    let typedInstance: Typed | null = null

    onMounted(() => {
        // Typed.js
        typedInstance = new Typed(typedElement.value as HTMLElement, {
            strings: ['System Analyst', 'Web Developer'],
            typeSpeed: 80,
            backSpeed: 50,
            backDelay: 1500,
            loop: true,
            showCursor: false,
        });


        // untuk back to top
        const backToTop = document.getElementById('backToTop') as HTMLElement

        window.addEventListener('scroll', () =>{
            if(window.scrollY>500){
                backToTop.classList.remove('hidden')
            }else{
                backToTop.classList.add('hidden')
            }
        })

        backToTop.addEventListener('click', () =>{
            window.scrollTo({top:0, behavior:'smooth'})
        })


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

    
    const name= ref("");
    const desc= ref("");

    const sendEmail = ()=>{
        const subject = encodeURIComponent(`Message from ${name.value}`);
        const body = encodeURIComponent(`Halo nama saya ${name.value}, saya ingin ${desc.value}`);
        window.location.href = `mailto:rskyfrhn801@gmail.com?subject=${subject}&body=${body}`;
    };
    const sendWA = ()=>{
        const text = encodeURIComponent(`Halo nama saya ${name.value}, saya ingin ${desc.value}`);
        window.open(`https://wa.me/6281345765427?text=${text}`, "_blank");
    };
    
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
                <p class="text-white text-xs lg:text-[15px] my-2 font-thin ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic velit maiores laborum qui, fuga molestias. Recusandae libero tenetur ullam vel aspernatur, labore ex dignissimos asperiores deserunt, iste, illum impedit et.</p>

                <div class="flex flex-wrap my-5 gap-40">
                    <div class="w-[0%]">
                        <button class="inline-flex items-center justify-center p-0.5 text-sm font-medium tracking-wide text-white transition duration-300 rounded-full shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-full group-hover:bg-transparent group-hover:dark:bg-transparent">
                            Download CV
                            </span>
                        </button>   
                    </div>
                    <div class="w-[0%]">
                        <button class="inline-flex items-center justify-center p-0.5 text-sm font-medium tracking-wide text-white transition duration-300 rounded-full shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                            <span class="relative px-8 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-full group-hover:bg-transparent group-hover:dark:bg-transparent">
                            My product
                            </span>
                        </button> 
                    </div>
                </div>
                <div class="flex flex-nowrap gap-8">
                    
                    <a href="#" class="py-3 px-3 rounded-xl bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-linkedin text-[#a78bfa] text-xl"></i>
                    </a>
                
                
                    <a href="#" class="py-3 px-3 rounded-xl bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-github text-[#a78bfa] text-xl"></i>
                    </a>
                    
                    <a href="#" class="py-3 px-3 rounded-xl bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-instagram text-[#a78bfa] text-xl"></i>
                    </a>

                    <a href="#" class="py-3 px-3 rounded-xl bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-steam text-[#a78bfa] text-xl"></i>
                    </a>
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
        <div id="AboutSection" class="flex flex-wrap p-4 mt-[40px] md:mt-[150px]">
            <div class="w-[100%] md:w-[30%] mx-14 mb-32 md:mx-0 md:mb-0">
                <div class="w-[200px] h-[200px] lg:w-[250px] lg:h-[250px] xl:w-[300px] xl:h-[300px] rounded-xl shadow-lg rotate-[10deg] border-4 border-[#a78bfa] animate-glow translate-x-6 lg:translate-x-14  translate-y-11 lg:translate-y-10 xl:translate-y-1" style="background: linear-gradient(#0b0b14, #0b0b14) padding-box, linear-gradient(to right, #a855f7, #3b82f6, #6366f1) border-box;">
                    <img src="/HeaderHero.png" alt="" class="w-60 h-60 lg:w-80 lg:h-80 xl:w-96 xl:h-96 object-cover rotate-[-10deg] lg:translate-x-11 xl:translate-x-14 translate-x-11 translate-y-7">
                </div>
            </div>
            <div class="w-[100%] md:w-[70%] md:ps-20">
                <p class="text-white font-bold">About me</p>
                <p class="text-3xl lg:text-5xl lg:my-2 font-semibold min-h-[50px] bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Get to know me better</p>
                <p class="text-white text-[10px] lg:text-xs xl:text-sm font-thin leading-loose xl:leading-[25px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis nisi, ipsam ratione nostrum quam amet vitae iste consectetur fugiat officia aut, unde odit? Officia soluta voluptatum est inventore a omnis ipsum quod reiciendis! Neque, laudantium beatae culpa fugiat perferendis vero dolores tempora dicta esse corporis, veritatis dolore? Quo optio rerum laboriosam soluta harum laudantium ratione eius omnis nesciunt delectus accusamus provident et voluptates ad sapiente dolores, ducimus esse corporis, reprehenderit distinctio similique. Nemo magnam dicta est, voluptatum, explicabo dolores repellendus iure qui eligendi adipisci repellat quo quam ipsa tempore sint blanditiis iste eveniet! Iste reiciendis quos laboriosam sapiente. Recusandae, nihil?</p>
                
                <p class="text-white font-bold pt-7">Skill</p>
                <div class="flex flex-nowrap my-2 gap-4">
                    <div class="h-10 w-10 lg:h-12 lg:w-12 rounded-md bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-linkedin text-[#a78bfa] text-md lg:text-xl"></i>
                    </div>
                    <div class="h-10 w-10 lg:h-12 lg:w-12 rounded-md bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-linkedin text-[#a78bfa] text-md lg:text-xl"></i>
                    </div>
                    <div class="h-10 w-10 lg:h-12 lg:w-12 rounded-md bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-linkedin text-[#a78bfa] text-md lg:text-xl"></i>
                    </div>
                    <div class="h-10 w-10 lg:h-12 lg:w-12 rounded-md bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                        <i class="fab fa-linkedin text-[#a78bfa] text-md lg:text-xl"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- Services -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="ServicesSection" class="relative my-24">
            <div class="grid grid-cols-12 gap-4 z-10">
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">How I can help</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1 mb-10">Transforming ideas into impactful digital experiences</p>
                </div>
                <div class="col-span-12 z-10">
                    <div class="flex flex-wrap gap-5 place-content-center">
                        <div class="relative w-[300px] h-[280px] rounded-xl text-center group hover:bg-gradient-to-r hover:from-[#5b21b6] hover:via-[#3b82f6] hover:to-[#1e3a8a] hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-all duration-300 p-4"style="background-color: rgba(0, 0, 0, 0.5);">
                            <i class="fas fa-laptop-code text-[#a78bfa] text-6xl py-5"></i>
                            <p class="text-white text-xl font-bold py-2">Web development</p>
                            <p class="text-gray-500 text-sm font-md pb-5 group-hover:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd </p>
                            <div class="absolute top-[200px] right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[230px] right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[230px] right-[200px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-600 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[250px] right-[280px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[270px] right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-900 group-hover:-translate-y-10"></div>
                            <div class="absolute top-[230px] right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[250px] right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <i class="absolute z-0 top-[10px] left-[5px] fas fa-code text-[#a78bfa] text-md lg:text-[40px] opacity-10 rotate-[-10deg]"></i>
                        </div>
                        <div class="relative w-[300px] h-[280px] rounded-xl text-center group hover:bg-gradient-to-r hover:from-[#5b21b6] hover:via-[#3b82f6] hover:to-[#1e3a8a] hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-all duration-300 p-4"style="background-color: rgba(0, 0, 0, 0.5);">
                            <i class="fas fa-laptop-code text-[#a78bfa] text-6xl py-5"></i>
                            <p class="text-white text-xl font-bold py-2">Web development</p>
                            <p class="text-gray-500 text-sm font-md pb-5 group-hover:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd </p>
                            <div class="absolute top-[200px] right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[230px] right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[230px] right-[200px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-600 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[250px] right-[280px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[270px] right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-900 group-hover:-translate-y-10"></div>
                            <div class="absolute top-[230px] right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[250px] right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <i class="absolute z-0 top-[10px] left-[5px] fas fa-code text-[#a78bfa] text-md lg:text-[40px] opacity-10 rotate-[-10deg]"></i>
                        </div>
                        <div class="relative w-[300px] h-[280px] rounded-xl text-center group hover:bg-gradient-to-r hover:from-[#5b21b6] hover:via-[#3b82f6] hover:to-[#1e3a8a] hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-all duration-300 p-4"style="background-color: rgba(0, 0, 0, 0.5);">
                            <i class="fas fa-laptop-code text-[#a78bfa] text-6xl py-5"></i>
                            <p class="text-white text-xl font-bold py-2">Web development</p>
                            <p class="text-gray-500 text-sm font-md pb-5 group-hover:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd </p>
                            <div class="absolute top-[200px] right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[230px] right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[230px] right-[200px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-600 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[250px] right-[280px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[270px] right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-900 group-hover:-translate-y-10"></div>
                            <div class="absolute top-[230px] right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[250px] right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <i class="absolute z-0 top-[10px] left-[5px] fas fa-code text-[#a78bfa] text-md lg:text-[40px] opacity-10 rotate-[-10deg]"></i>
                        </div>
                        <div class="relative w-[300px] h-[280px] rounded-xl text-center group hover:bg-gradient-to-r hover:from-[#5b21b6] hover:via-[#3b82f6] hover:to-[#1e3a8a] hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-all duration-300 p-4"style="background-color: rgba(0, 0, 0, 0.5);">
                            <i class="fas fa-laptop-code text-[#a78bfa] text-6xl py-5"></i>
                            <p class="text-white text-xl font-bold py-2">Web development</p>
                            <p class="text-gray-500 text-sm font-md pb-5 group-hover:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. sjdnasjd asdiasd asdjnasd </p>
                            <div class="absolute top-[200px] right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[230px] right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[230px] right-[200px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-600 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[250px] right-[280px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[270px] right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-900 group-hover:-translate-y-10"></div>
                            <div class="absolute top-[230px] right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-700 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[250px] right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-800 group-hover:-translate-y-8"></div>
                            <i class="absolute z-0 top-[10px] left-[5px] fas fa-code text-[#a78bfa] text-md lg:text-[40px] opacity-10 rotate-[-10deg]"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden sm:block absolute z-0 md:top-[400px] xl:top-[300px] left-1/2 w-[300px] h-[300px] md:w-[700px] md:h-[600px] xl:w-[900px] xl:h-[200px] rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 blur-[120px] -translate-x-1/2 -translate-y-1/2"></div>
            <i class="absolute z-0 top-[-60px] left-[50px] md:top-[-50px] md:left-[50px] fas fa-laptop-code text-[#a78bfa] text-[50px] md:text-[100px] lg:text-[170px] opacity-20 rotate-[-10deg]"></i>
            <i class="absolute z-0 top-[-60px] right-[50px] fas fa-code text-[#a78bfa] text-[50px] md:text-[100px] lg:text-[100px] opacity-20 rotate-[-10deg]"></i>
        </div>

        <!-- Portfolio -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="PortfolioSection" class="relative my-24">
            <div class="grid grid-cols-12 my-24 gap-4 z-10">
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">What I’ve Done</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1 mb-5">Some of my recent projects</p>
                    <img src="/Boostrap.png" alt="" class="animate-icon-1 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 left-[50px] top-[70px] md:left-[230px] md:top-[70px] xl:top-[90px] xl:left-[300px]">
                    <img src="/Canva.png" alt="" class="animate-icon-1 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:left-[130px] left-[100px] top-[-30px] md:top-[30px] xl:top-[30px] xl:left-[150px]">
                    <img src="/Excel.png" alt="" class="animate-icon-3 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:left-[200px] left-[30px] top-[10px] md:top-[-10px] xl:top-[-10px] xl:left-[400px]">
                
                    <img src="/CI3.png" alt="" class="animate-icon-2 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:right-[230px] right-[50px] top-[70px] md:top-[70px] xl:top-[90px] xl:right-[300px]">
                    <img src="/Word.png" alt="" class="animate-icon-2 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:right-[130px] right-[100px] top-[-30px] md:top-[30px] xl:top-[30px] xl:right-[150px]">
                    <img src="/Laravel.png" alt="" class="animate-icon-3 z-10 absolute w-5 h-5 xl:w-10 xl:h-10 md:right-[200px] right-[30px] top-[10px] md:top-[-10px] xl:top-[-10px] xl:right-[400px]">
                </div>
                <div class="col-span-12 z-10">
                    <div class="flex flex-wrap gap-5 place-content-center"> 

                        <!-- card -->
                        <div class="relative w-[300px] h-[430px] xl:w-[400px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                            <img src="/Image.png" alt="" class="w-[280px] h-[240px] xl:w-[480px] xl:h-[300px] rounded-xl">
                            
                            <div class="flex flex-wrap gap-5 py-5">
                                <p class="text-md font-semibold text-white">WebApp.com</p>
                                <div class="py-1 px-6 text-black rounded-full text-[11px] ml-auto bg-white font-semibold">Web dev</div>
                            </div>
                            
                            <p class="text-sm text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique</p>

                            <!-- Dots -->
                            <div class="absolute top-[400px] right-[50px] xl:top-[450px] xl:right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[410px] right-[100px] xl:top-[450px] xl:right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-100 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[390px] right-[210px] xl:top-[460px] xl:right-[210px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-200 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[400px] right-[250px] xl:top-[470px] xl:right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-300 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[400px] right-[170px] xl:top-[470px] xl:right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-450 group-hover:-translate-y-9"></div>
                            <div class="absolute top-[400px] right-[220px] xl:top-[450px] xl:right-[220px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-500 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[400px] right-[120px] xl:top-[440px] xl:right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-600 group-hover:-translate-y-8"></div>
                        </div>
                        <div class="relative w-[300px] h-[430px] xl:w-[400px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                            <img src="/Image.png" alt="" class="w-[280px] h-[240px] xl:w-[480px] xl:h-[300px] rounded-xl">
                            
                            <div class="flex flex-wrap gap-5 py-5">
                                <p class="text-md font-semibold text-white">WebApp.com</p>
                                <div class="py-1 px-6 text-black rounded-full text-[11px] ml-auto bg-white font-semibold">Web dev</div>
                            </div>
                            
                            <p class="text-sm text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique</p>

                            <!-- Dots -->
                            <div class="absolute top-[400px] right-[50px] xl:top-[450px] xl:right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[410px] right-[100px] xl:top-[450px] xl:right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-100 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[390px] right-[210px] xl:top-[460px] xl:right-[210px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-200 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[400px] right-[250px] xl:top-[470px] xl:right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-300 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[400px] right-[170px] xl:top-[470px] xl:right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-450 group-hover:-translate-y-9"></div>
                            <div class="absolute top-[400px] right-[220px] xl:top-[450px] xl:right-[220px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-500 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[400px] right-[120px] xl:top-[440px] xl:right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-600 group-hover:-translate-y-8"></div>
                        </div>
                        <div class="relative w-[300px] h-[430px] xl:w-[400px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                            <img src="/Image.png" alt="" class="w-[280px] h-[240px] xl:w-[480px] xl:h-[300px] rounded-xl">
                            
                            <div class="flex flex-wrap gap-5 py-5">
                                <p class="text-md font-semibold text-white">WebApp.com</p>
                                <div class="py-1 px-6 text-black rounded-full text-[11px] ml-auto bg-white font-semibold">Web dev</div>
                            </div>
                            
                            <p class="text-sm text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique</p>

                            <!-- Dots -->
                            <div class="absolute top-[400px] right-[50px] xl:top-[450px] xl:right-[50px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 group-hover:-translate-y-5"></div>
                            <div class="absolute top-[410px] right-[100px] xl:top-[450px] xl:right-[100px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-100 group-hover:-translate-y-6"></div>
                            <div class="absolute top-[390px] right-[210px] xl:top-[460px] xl:right-[210px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-200 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[400px] right-[250px] xl:top-[470px] xl:right-[250px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-300 group-hover:-translate-y-8"></div>
                            <div class="absolute top-[400px] right-[170px] xl:top-[470px] xl:right-[170px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-450 group-hover:-translate-y-9"></div>
                            <div class="absolute top-[400px] right-[220px] xl:top-[450px] xl:right-[220px] w-2 h-2 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-500 group-hover:-translate-y-7"></div>
                            <div class="absolute top-[400px] right-[120px] xl:top-[440px] xl:right-[120px] w-1 h-1 rounded-full bg-[#a78bfa] opacity-50 transition-transform duration-500 delay-600 group-hover:-translate-y-8"></div>
                        </div>

                    </div>
                </div>
                <div class="col-span-12 mx-auto my-10 z-10">
                    <router-link 
                        to="/Projects"
                        class="inline-flex items-center justify-center p-0.5 text-sm font-medium tracking-wide text-white transition duration-300 rounded-full shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]"
                    >
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-full group-hover:bg-transparent">
                        Show all projects
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="hidden sm:block absolute z-0 md:top-[500px] left-1/2 w-[300px] h-[300px] md:w-[500px] md:h-[700px]  lg:w-[900px] lg:h-[500px] rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 blur-[120px] transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>  
        
        <!-- Product -->
        <div class="w-full h-[2px] mt-[40px] md:mt-[100px] bg-gradient-to-r from-transparent via-fuchsia-500 to-transparent" style="filter: drop-shadow(0 0 6px rgba(168,85,247,0.8));"></div>
        <div id="ProductSection" class="relative my-24">
            <div class="grid grid-cols-12 my-24 gap-4 z-10">
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Built with Code, Designed for You</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1 mb-5">Ready-to-use web applications built for performance and simplicity</p>
                </div>
                <div class="col-span-12 z-10">
                    <div class="grid grid-cols-12 place-content-center gap-3">

                        <!-- card -->
                        <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
                            <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                <div class="flex items-center gap-2 md:gap-5">
                                    <img src="/Image.png" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                                    <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm md:text-md font-semibold text-white">WebApp.com</p>
                                            <p class="text-xs md:text-sm text-white truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique.</p>
                                        </div>
                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Details
                                            </span>
                                        </a>

                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Buy Now
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
                            <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                <div class="flex items-center gap-2 md:gap-5">
                                    <img src="/Image.png" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                                    <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm md:text-md font-semibold text-white">WebApp.com</p>
                                            <p class="text-xs md:text-sm text-white truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique.</p>
                                        </div>
                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Details
                                            </span>
                                        </a>

                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Buy Now
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
                            <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                <div class="flex items-center gap-2 md:gap-5">
                                    <img src="/Image.png" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                                    <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm md:text-md font-semibold text-white">WebApp.com</p>
                                            <p class="text-xs md:text-sm text-white truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique.</p>
                                        </div>
                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Details
                                            </span>
                                        </a>

                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Buy Now
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
                            <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                <div class="flex items-center gap-2 md:gap-5">
                                    <img src="/Image.png" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                                    <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm md:text-md font-semibold text-white">WebApp.com</p>
                                            <p class="text-xs md:text-sm text-white truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique.</p>
                                        </div>
                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Details
                                            </span>
                                        </a>

                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Buy Now
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
                            <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                <div class="flex items-center gap-2 md:gap-5">
                                    <img src="/Image.png" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                                    <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm md:text-md font-semibold text-white">WebApp.com</p>
                                            <p class="text-xs md:text-sm text-white truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique.</p>
                                        </div>
                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Details
                                            </span>
                                        </a>

                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Buy Now
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 mx-2 bg-black/20">
                            <div class="relative w-full border-2 rounded-xl border-[#a78bfa] px-3 py-3 overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                <div class="flex items-center gap-2 md:gap-5">
                                    <img src="/Image.png" alt="" class="w-[40px] h-[40px] md:w-[50px] md:h-[50px] rounded-md md:rounded-xl">

                                    <div class="flex-1 min-w-0 flex items-center gap-1 md:gap-3">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm md:text-md font-semibold text-white">WebApp.com</p>
                                            <p class="text-xs md:text-sm text-white truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nam facilis sunt similique.</p>
                                        </div>
                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Details
                                            </span>
                                        </a>

                                        <a href="#" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-xl shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-xl group-hover:bg-transparent group-hover:dark:bg-transparent">
                                                Buy Now
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mx-auto my-10 z-10">
                    <a href="#"class="inline-flex items-center justify-center p-0.5 text-sm font-medium tracking-wide text-white transition duration-300 rounded-full shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-full group-hover:bg-transparent">
                            Show all projects
                        </span>
                    </a>
                </div>
            </div>
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
                            <form @submit.prevent class="flex flex-col mt-10 gap-3">
                                <input  v-model="name" type="text" placeholder="Your Name" class="p-3 rounded-lg bg-[#2c2c50] shadow-inner shadow-[inset_2px_2px_5px_rgba(0,0,0,0.7)] text-white placeholder-gray-400 focus:outline-none"/>                                
                                <textarea v-model="desc" placeholder="Your Message / Description" class="p-3 rounded-lg bg-[#2c2c50] shadow-inner shadow-[inset_2px_2px_5px_rgba(0,0,0,0.7)] text-white placeholder-gray-400 focus:outline-non" rows="4" required></textarea>

                                <div class="flex gap-3 mt-2">
                                    <button type="button" @click="sendEmail" class="flex-1 bg-transparent border-2 text-[#a78bfa] border-[#a78bfa] hover:bg-[#a78bfa] hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] hover:text-black transition-shadow duration-300 py-2 px-4 rounded-xl font-semibold">
                                    Send via Email
                                    </button>
                                    <button type="button" @click="sendWA" class="flex-1 bg-transparent border-2 text-green-600 border-green-600 hover:bg-green-600 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] hover:text-black transition-shadow duration-300 py-2 px-4 rounded-xl font-semibold">
                                    Send via WhatsApp
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-span-12 md:col-span-6 h-full bg-[#a78bfa]/10  rounded-xl pt-10 px-5">
                            <div class="col-span-12">
                                <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">Join Me Online</p>
                            </div>
                            <div class="col-span-12 mb-10">
                                <p class="text-gray-500 text-center mt-1">Stay in the loop with my projects and posts by following me.</p>
                            </div>
                            <div class="flex flex-wrap gap-3 md:place-content-center">
                                <a href="#" class="py-3 px-5 rounded-xl bg-transparent border-2 border-[#0077B5] inline-flex items-center justify-center gap-2 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                    <i class="fab fa-linkedin text-[#0077B5] text-xl"></i>
                                    <span class="text-[#0077B5] font-medium">LinkedIn/Muhammad Risky Farhan</span>
                                </a>
                                <a href="#" class="py-3 px-5 rounded-xl bg-transparent border-2 border-[#4141aa] inline-flex items-center justify-center gap-2 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                    <i class="fab fa-github text-[#4141aa] text-xl"></i>
                                    <span class="text-[#4141aa] font-medium">Github/Risfrhn</span>
                                </a>
                                <a href="#" class="py-3 px-5 rounded-xl bg-transparent border-2 border-[#8900df] inline-flex items-center justify-center gap-2 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                    <i class="fab fa-instagram text-[#8900df] text-xl"></i>
                                    <span class="text-[#8900df] font-medium">Instagram/risfrhn_</span>
                                </a>
                                <a href="#" class="py-3 px-5 rounded-xl bg-transparent border-2 border-[#D44638] inline-flex items-center justify-center gap-2 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                    <i class="fa-solid fa-envelope text-[#D44638] text-xl"></i>
                                    <span class="text-[#D44638] font-medium">Email/rskyfrhn801@gmail.com</span>
                                </a>
                                <a href="#" class="py-3 px-5 rounded-xl bg-transparent border-2 border-[#012f9a] inline-flex items-center justify-center gap-2 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                    <i class="fab fa-steam text-[#012f9a] text-xl"></i>
                                    <span class="text-[#012f9a] font-medium">Steam/FarhanKebab</span>
                                </a>
                                <a href="#" class="py-3 px-5 rounded-xl bg-transparent border-2 border-[#25D366] inline-flex items-center justify-center gap-2 hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
                                    <i class="fab fa-linkedin text-[#25D366] text-xl"></i>
                                    <span class="text-[#25D366] font-medium">Whatsapp/+6281345765427</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="backToTop"
    class="fixed bottom-6 right-6 px-5 py-3 hidden rounded-lg bg-gradient-to-r from-purple-500 to-indigo-600 text-white shadow-lg hover:shadow-[0_0_20px_rgba(130,90,250,0.6)] transition-all duration-300">
    ↑
    </button>
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