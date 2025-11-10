<script setup lang="ts">
    import { ref, onMounted, onBeforeUnmount } from 'vue'
    import Typed from 'typed.js'

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
    });

    onBeforeUnmount(() => {
    if (typedInstance) typedInstance.destroy()
    });
</script>



<template>
    <div class="container w-full mx-auto">
        <!-- Flare -->
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        
        <!-- konten -->

        <!-- header -->
        <div class="flex flex-wrap p-4 place-content-center pt-20 md:pt-24 lg:pt-40">
            <div class="w-[100%] md:w-[50%]">
                <p class="text-white my-2">Hello, Im</p>
                <p class="text-white my-2 text-4xl lg:text-5xl my-2 font-semibold">Risky Farhan</p>
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
        <div class="flex flex-wrap p-4 mt-[40px] md:mt-[150px]">
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
        <div class="grid grid-cols-12 my-24 gap-4">
            <div class="col-span-12">
                <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">How I can help</p>
            </div>
            <div class="col-span-12">
                <p class="text-gray-500 text-center mt-1 mb-10">Transforming ideas into impactful digital experiences</p>
            </div>
            <div class="col-span-12">
                <div class="flex flex-wrap gap-5 place-content-center">
                    <div class="w-[300px] h-[400px] border-4 rounded-xl bg-[#0b0b14] border-[#a78bfa] hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300 p-4">
                        <i class="fab fa-steam text-[#a78bfa] text-xl"></i>
                        <p>Web development</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod molestiae sunt laboriosam. Consequuntur omnis corrupti delectus impedit a atque totam ad reprehenderit vel necessitatibus officiis distinctio, illum voluptatibus mollitia fuga!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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