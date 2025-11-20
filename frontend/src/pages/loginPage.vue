<script lang="ts" setup>
    import { ref } from 'vue';
    const activeTabs = ref("login"); 
    const showPassword = ref(false);  
</script>

<template>
    <div class="relative grid grid-cols-12 w-full min-h-screen bg-[#0b0b14] place-items-center overflow-hidden">
        <div class="absolute z-0 w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[-100px] left-[-100px]"></div>
        <div class="z-0 absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[40px] right-[0px]"></div>
        <div class="col-span-12 z-10">
            <div class="w-full max-w-sm mx-auto p-10 rounded-xl bg-white/5 backdrop-blur-xl">
                <p class="text-xl text-center font-bold bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent mt-2">Welcome back Mr. Risky!</p>
                <p class="text-xs text-center text-gray-500 mb-5">We are happy to see you again</p>
                <form>
                    <div class="mb-5 relative">
                        <input type="email" class="border-none rounded-lg block w-full px-3 py-2.5 text-gray-200 placeholder-gray-500 pr-10 bg-[#1e1e1e] shadow-[inset_4px_4px_8px_#141414,inset_-4px_-4px_8px_#2a2a2a] focus:shadow-[inset_6px_6px_12px_#141414,inset_-6px_-6px_12px_#2a2a2a] transition-all duration-300" placeholder="Input Email here..." required />

                        <span class="absolute inset-y-0 right-2 flex items-center px-3 text-gray-400 pointer-events-none">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                    </div>

                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="password" class="border-none rounded-lg block w-full px-3 py-2.5 text-gray-200 placeholder-gray-500 pr-10 bg-[#1e1e1e] shadow-[inset_4px_4px_8px_#141414,inset_-4px_-4px_8px_#2a2a2a] focus:shadow-[inset_6px_6px_12px_#141414,inset_-6px_-6px_12px_#2a2a2a] transition-all duration-300" placeholder="Input Password here..." required/>
                        <a class="absolute inset-y-0 right-2 flex items-center px-3 text-gray-600 cursor-pointer" @click.prevent="showPassword = !showPassword">
                            <i v-if="!showPassword" key="eye" class="fa-regular fa-eye"></i>
                            <i v-else key="slash" class="fa-solid fa-eye-slash"></i>
                        </a>
                    </div>
                    <div class="flex mt-2">
                        <a href="" class="ml-auto font-semibold text-sm bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent">Forgot password</a>
                    </div>
                    <button type="button" class="inline-flex w-full items-center my-3 justify-center p-0.5 text-sm font-medium tracking-wide text-white transition duration-300 rounded-full shadow-lg focus-visible:outline-none whitespace-nowrap group bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none hover:shadow-[0_0_20px_rgba(130,90,250,0.4)]">
                        <span class="relative px-5 py-2.5 w-full transition-all ease-in duration-75 bg-[#0b0b14] rounded-full group-hover:bg-transparent group-hover:dark:bg-transparent">
                            Submit
                        </span>
                    </button> 
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
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
</style>