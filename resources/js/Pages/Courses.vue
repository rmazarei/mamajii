<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {onMounted, ref} from "vue";

const currentPage = 1
const lastPage = 1
const educationalContents = ref([])
const loading = ref(true)
const error = ref(null)
const fetchAllEducationalContents = async (page = 1) => {
    try {
        const response = await axios.get(`/api/V1/Client/EducationalContents?page=${page}`)
        educationalContents.value = response.data.data
    } catch (err){
        error.value = "خطایی در بارگذاری محتواها رخ داده است."
    } finally {
        loading.value = false
    }
}


onMounted(() => {
    fetchAllEducationalContents()
})

</script>

<template>
    <AppLayout title="دوره‌ها">
        <h1 class="text-2xl text-blue-500 text-center my-4 font-bold">دوره‌ها</h1>
        <div class="courses-wrapper grid grid-cols-1 ms:grid-cols-2 lg:grid-cols-4">
            <div class="border rounded p-3" v-for="course in educationalContents">
                <h2 class="text-black text-xl text-center">{{ course.title }}</h2>
                <p class="card-text">
                    <strong>قیمت: </strong>
                    <span v-if="course.final_price === 0">رایگان</span>
                    <span v-else>{{ (course.final_price.toLocaleString('fa')) }} تومان</span>
                </p>

                <p class="card-text line-through opacity-50" v-if="course.discount > 0">
                    <strong>قیمت: </strong>
                    <span >
                      {{ course.price.toLocaleString('fa') }}
                    </span>
                </p>
                <p class="card-text">
                    <strong>تاریخ ایجاد:</strong> {{ new Date(course.created_at).toLocaleDateString('fa-IR') }}
                </p>
            </div>

        </div>
        <div class="pagination">
            <button @click="fetchAllEducationalContents(currentPage - 1)" :disabled="currentPage === 1">قبلی</button>
            <button @click="fetchAllEducationalContents(currentPage + 1)" :disabled="currentPage === lastPage">بعدی</button>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
