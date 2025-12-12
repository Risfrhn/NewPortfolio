<script lang="ts" setup>
    import counterCard from "@/components/counterCard.vue";
    import table from "@/components/tableVar1.vue";
</script>

<template>
    <div class="w-full">
        <div class="absolute z-1 w-[300px] h-[300px] md:w-[400px] md:h-[400px]  rounded-full bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 opacity-40 animate-flare blur-[120px] top-[50px] left-[-100px]"></div>
        <div class="hidden  md:block absolute w-[300px] h-[300px] rounded-full bg-gradient-to-r from-pink-400 via-yellow-400 to-red-400 opacity-30 animate-flare-slow blur-[150px] bottom-[800px] xl:bottom-[40px] right-[0px]"></div>
        <p class="text-4xl lg:my-2 font-semibold min-h-[50px] bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 bg-clip-text text-transparent" style="filter: drop-shadow(0 0 18px rgba(168, 85, 247, 0.9));">My Product</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <counterCard :count=20 text="Total product" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
            <counterCard :count=20 text="Total project" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
            <counterCard :count=20 text="Total user" subText="Lorem ipsum dolor si amet" icon="fas fa-laptop-code"/>
        </div>
    </div>
</template>