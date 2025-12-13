<script lang="ts" setup>
    import { ref } from 'vue';
    import tags from "@/components/iconTags.vue"
    import buttonAdd from "@/components/buttonSubmitForm.vue"
</script>

<template>
    <!-- input field -->
     <div class="flex flex-col">
        <p>Input flyer</p>
        <div class="flex gap-2">
            <input type="file" class="border-none rounded-lg block w-full px-3 py-2.5 text-gray-200 placeholder-gray-500 pr-10 bg-[#1e1e1e] shadow-[inset_4px_4px_8px_#141414,inset_-4px_-4px_8px_#2a2a2a] focus:shadow-[inset_6px_6px_12px_#141414,inset_-6px_-6px_12px_#2a2a2a] transition-all duration-300" required />
        </div>
        <p class="text-gray-500 text-xs my-2">Current image:</p>    
        <img src="/Image.png" alt="" class="w-full rounded-md">
     </div>
</template>