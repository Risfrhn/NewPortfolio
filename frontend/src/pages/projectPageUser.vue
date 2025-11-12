<template>
    <div class="container w-full mx-auto">
        <div class="absolute w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        
        <div class="hidden md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        
        <div class="relative mt-36 mb-24">
            <div class="grid grid-cols-12 my-24 gap-4 z-10">
                <div class="col-span-12">
                    <p class="text-3xl text-center lg:text-5xl lg:my-2 font-semibold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">My projects</p>
                </div>
                <div class="col-span-12">
                    <p class="text-gray-500 text-center mt-1 mb-5">Some of my recent projects</p>
                </div>
                <div class="col-span-12 md:flex justify-end mx-auto md:mx-3 mt-12"> 
                    <form class="flex items-center gap-2"> 
                        <div class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                            <input type="text" id="simple-search" class="w-40 md:w-60 relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-md" placeholder="Search branch name..." required />
                        </div>
                        <button type="submit" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                                Search
                            </span>
                        </button>
                        <button href="#"  id="dropdown-button" data-dropdown-toggle="dropdown" class="inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                            <span class="relative px-2 md:px-4 py-2.5 transition-all ease-in duration-75 bg-[#0b0b14] rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                                Filter
                            </span>
                        </button> 
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                            </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-span-12 mt-5">
                    <div class="flex flex-wrap gap-3 justify-center">
                        <div class="relative w-[280px] h-[430px] xl:w-[370px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
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
                        <div class="relative w-[280px] h-[430px] xl:w-[370px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
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
                        <div class="relative w-[280px] h-[430px] xl:w-[370px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
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
                        <div class="relative w-[280px] h-[430px] xl:w-[370px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
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
                        <div class="relative w-[280px] h-[430px] xl:w-[370px] xl:h-[500px] border-2 rounded-xl border-[#a78bfa] px-3 py-3 group overflow-hidden hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
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
            </div>
        </div>
        
    </div>
</template>

<script lang="ts">

</script>

<style scoped>

</style>