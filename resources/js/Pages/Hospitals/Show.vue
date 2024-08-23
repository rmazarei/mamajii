<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
defineProps({hospital:Object})
</script>

<template>
    <AppLayout :title="hospital.name">
        <h1 class="my-2 text-center text-2xl font-bold text-blue-500">{{ hospital.name }}</h1>
        <div class="grid grid-cols-8 gap-4">
            <div class="hospital-info col-span-8 md:col-span-4 lg:col-span-2 border rounded p-2 bg-white rounded-lg shadow-lg">
                <div>
                    <span>آدرس: </span>
                    {{  hospital.address }}
                </div>
                <div>
                    <span>تلفن: </span>
                    {{  hospital.tel }}
                </div>
                <div>
                    <span>ساعت آغاز کار: </span>
                    {{  hospital.start_time }}
                </div>
                <div>
                    <span>ساعت پایان کار: </span>
                    {{  hospital.end_time }}
                </div>
            </div>
            <p class="col-span-8 md:col-span-4 lg:col-span-6" v-html="hospital.bio"></p>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>