<template>
  <div class="min-h-screen flex flex-col">
    <SidebarAdmin/>
    
    <!-- Konten halaman -->
    <main class="flex-1">
      <router-view /> 
    </main>
    

    <Footers/>
  </div>
</template>

<script lang="ts" setup>
import Footers from '@/components/footer.vue';
import SidebarAdmin from '@/components/sidebarAdmin.vue';
</script>