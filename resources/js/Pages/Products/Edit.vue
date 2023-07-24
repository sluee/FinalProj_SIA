<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: Object
})
const form = useForm({
    name: props.product.name,
    description: props.product.description,
    price: props.product.price,
    qty: props.product.qty,
    pic: props.product.pic,

})

function submit() {
    form.patch('/products/' + props.product.id)
}

</script>

<template>
    <Head title="Edit Product" />

    <AppLayout>
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">Edit Product</h2>
                    <Link class="button1 mb-2 py-2 px-3 bg-gray-300 shadow border-gray-300 border hover:bg-gray-400 rounded" as="button" :href="'/products/' + product.id">Back</Link>
            </div>
        </template>

        <div class="py-6">
            <div class="flex flex-col justify-center items-center">
                <div class="relative flex flex-col items-center rounded-[20px] w-[800px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                    <div class="mt-2 mb-8 w-full">
                        <form @submit.prevent="submit" class="flex">
                            <div class="flex-1 pr-4">
                                <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-black">
                                    Product Details
                                </h4>
                                <div class="px-5 py-5">
                                    <label class="font-semibold text-sm text-gray-600  block" for="name">Product Name</label>
                                    <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.name"/>
                                    <div class="text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="price">Price</label>
                                    <input type="number" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.price" />
                                    <div class="text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>

                                    <label class="font-semibold text-sm text-gray-600  block" for="qty" >Quantity</label>
                                    <input type="number" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.qty" />
                                    <div class="text-red-600" v-if="form.errors.qty">{{ form.errors.qty }}</div>


                                    <label class="font-semibold text-sm text-gray-600  block" for="pic" >Product Photo</label>
                                    <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-800 rounded text-center text-gray-600 "    accept="image/jpeg" />
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                  </div>
                            </div>
                            <div class="flex-1 flex flex-col">
                                <h4 class="font-semibold text-sm text-gray-600  block">Product Description</h4>
                                <textarea cols="30" v-model="form.description" class=" flex-1 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 "></textarea>
                                <button class="px-4 py-2 mt-2 bg-blue-400 w-full rounded border border-blue-600 shadow hover:bg-blue-500">
                                    Edit Product
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
