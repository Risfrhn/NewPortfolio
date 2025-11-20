<template>
  <div class="min-h-screen flex flex-col">
    <Navbar/>
    
    <!-- Konten halaman -->
    <main class="flex-1">
      <router-view /> 
    </main>
    

    <Footers/>
  </div>
</template>

<script lang="ts" setup>
    import Footers from '@/components/footer.vue';
    import Navbar from '@/components/navigasiBar.vue';
</script>