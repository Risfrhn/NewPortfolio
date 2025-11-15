<script lang="ts" setup>
    import { ref } from 'vue';
    const emit = defineEmits<{(e: 'filter', value:string): void}>()
    const selected = ref("")

    const option = ["UI/UX", "Web development", "Mobile development"]
</script>

<template>
    <label class="relative inline-flex items-center justify-center p-0.5 text-xs md:text-sm font-medium tracking-wide text-white transition duration-300 rounded-md shadow-lg bg-gradient-to-r from-purple-400 via-blue-500 to-indigo-600 hover:from-purple-600 hover:to-blue-500 cursor-pointer">
    
    <!-- Tampilan tombol -->
    <span class="px-2 md:px-4 py-2.5 bg-[#0b0b14] rounded-md transition-all duration-150 ease-in-out group-hover:bg-transparent">
      Filter
    </span>

    <!-- Select asli tapi disembunyikan -->
    <select
      v-model="selected"
      @change="emit('filter', selected)"
      class="absolute inset-0 w-full h-full opacity-0 cursor-pointer bg-gray-600"
    >
      <option value="">All categories</option>
      <option v-for="c in option" :key="c" :value="c">
        {{ c }}
      </option>
    </select>

  </label>
</template>