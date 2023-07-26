<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin</h2>
        </template>

        <div class="py-12">
            <form  @submit.prevent="submit">
                  <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                    <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">Send Email</h1>
                    <div class="space-y-4">
                      <div>
                        <label for="subject" class="text-lx font-serif text-lg">Subject:</label>
                        <input type="text" v-model="form.subject" id="subject" class="ml-2 outline-none py-1 px-6 text-md border-2 rounded-md" />
                      </div>
                      <div>
                        <label for="message" class="block mb-2 text-lg font-serif">Message:</label>
                        <textarea id="message" v-model="form.message" cols="30" rows="10" placeholder="write here.." class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md"></textarea>
                      </div>
                      <button type="submit" class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-blue-600 hover:bg-blue-800 border-gray-200 ">Send Email</button>

                    </div>
                  </div>
              </form>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head , useForm} from '@inertiajs/vue3';

const form = useForm({
    subject: '',
    message: ''
})
  const submit = () => {
    form.post('/admin/send-email')

    form.subject = ''
    form.message = ''
}


</script>
