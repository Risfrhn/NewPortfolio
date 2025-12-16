<script lang="ts" setup>
    import { ref } from 'vue';

    defineProps<{
        src?: string
        label?: string
    }>()
    const emit = defineEmits<{(e: 'update:file', value:File|null):void}>()
    
    const image = ref<File>()
    const previewImage = (file: File)=>{
        return URL.createObjectURL(file)
    }

    const onChange = (e: Event)=>{
        const target = e.target as HTMLInputElement
        const file = target.files?.[0]
        if(file){
            emit('update:file', file ?? null)
            image.value = file
        }
    }

</script>

<template>
    <!-- input field -->
     <div class="flex flex-col">
        <p>{{ label }}</p>
        <div class="flex gap-2">
            <input ref="input" type="file" @change="onChange" class="border-none rounded-lg block w-full px-3 py-2.5 text-gray-200 placeholder-gray-500 pr-10 bg-[#1e1e1e] shadow-[inset_4px_4px_8px_#141414,inset_-4px_-4px_8px_#2a2a2a] focus:shadow-[inset_6px_6px_12px_#141414,inset_-6px_-6px_12px_#2a2a2a] transition-all duration-300" required />
        </div>
        <div class="flex flex-row gap-5">
            <div class="grid grid-cols-12 w-full">
                <div class="col-span-6">
                    <p class="text-gray-500 text-xs my-2">Current image:</p>    
                    <img :src="src" alt="" class="w-full bg-gray-800 py-5 px-5 rounded-md">
                </div>
                <div class="col-span-6">
                    <p class="text-gray-500 text-xs my-2">Upload image:</p>    
                    <img v-if="image" :src="previewImage(image)" alt="" class="w-full bg-gray-800 py-5 px-5 rounded-md">
                </div>
            </div>
        </div>
     </div>
</template>