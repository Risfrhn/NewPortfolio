<template>
  <div class="min-h-screen flex flex-col">
    <SidebarAdmin/>
    
    <!-- Konten halaman -->
    <main class="flex-1 bg-[#12121E] p-4 ml-0 sm:ml-64">
      <router-view /> 
    </main>
    
  </div>
</template>

<script lang="ts" setup>
import SidebarAdmin from '@/components/sidebarAdmin.vue';
</script>