<template>
    <div class="mx-auto mt-5 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md  hover:shadow-lg ">
        <div class="cursor-pointer " @click="open(supplier)">
            <div class="p-4">
            <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ supplier.name }}</h2>
            <p class="mb-2 text-base dark:text-gray-300 text-gray-700">{{ supplier.email }}</p>
            <div class="flex items-center">
                <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">{{ supplier.phone }}</p>
                <!-- <p class="text-base  font-medium text-gray-500  dark:text-gray-300">{{ product.qty }}pcs.</p> -->

            </div>
            </div>

        </div>

      </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    supplier: Object
})

function open(product) {
    router.visit('/suppliers/' + supplier.id)
}



</script>


