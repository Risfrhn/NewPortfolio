<script lang="ts" setup>
    import buttonAction from './buttonAction.vue';

    const props = defineProps<{
        columns: { key:string, label:string} []
        rows: any[]
        loading?: boolean
    }>()
</script>

<template>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg my-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-400 uppercase bg-gray-700 text-center">
                <tr>
                    <th v-for="index in columns" :key="index.key" scope="col" class="py-3 px-6">{{ index.label }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-[#1D1D29] border-b dark:border-gray-700" v-if="loading">
                    <td class="py-4 px-6 text-center" :colspan="columns.length"><img src="/Loading.gif" alt=""></td>
                </tr>
                <tr class="bg-[#1D1D29] border-b dark:border-gray-700" v-for="row in rows" :key="row.id">
                    <td class="py-4 px-6" v-for="col in columns" :key="col.key">
                        <div class="flex gap-2 place-content-center">
                            <slot :name="`cell-${col.key}`" :row="row"> {{ row[col.key] }}</slot>
                        </div>
                    </td>
                </tr>

                <tr class="bg-[#1D1D29] border-b dark:border-gray-700" v-if="!loading && rows.length === 0">
                    <td class="py-4 px-6" :colspan="columns.length">
                        <div class="flex gap-2 place-content-center">
                            <img src="/error.gif" alt="">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
  </div>
</template>
