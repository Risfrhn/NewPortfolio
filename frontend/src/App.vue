<template>
  <div class="min-h-screen flex flex-col">
    <Navbar />
    
    <!-- Konten halaman -->
    <main class="flex-1">
      <router-view /> 
    </main>

    <Footers />
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Navbar from "./components/navigasiBar.vue";
import Footers from "./components/footer.vue";

onMounted(() => {
  initFlowbite()
})
</script>

<style scoped></style>
