<script lang="ts" setup>
    defineProps<{
        icon: string
        link: string
    }>()
</script>

<template>
    <router-link :to="`${link}`" class="py-3 px-3 rounded-xl bg-transparent border-2 border-[#a78bfa] inline-flex items-center justify-center hover:shadow-[0_0_20px_rgba(130,90,250,0.4)] transition-shadow duration-300">
        <i :class="`${icon} text-[#a78bfa] text-xl`"></i>
    </router-link>
</template>