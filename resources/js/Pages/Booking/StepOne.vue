<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import moment from "jalali-moment";
import {ref} from "vue";

const props = defineProps({doctor: Object, months: Object})


const selectedMonth = ref(0)


</script>

<template>
    <AppLayout :title='doctor.name + " " + doctor.family'>
        <div class="rtl-list mt-5">
            <div>ماه</div>
            <div v-for="(monthYear, index) in months" :class="{selected: selectedMonth === index}" @click="selectedMonth = index">
                {{ monthYear[0] }}
                <br>
                {{ monthYear[1] }}
            </div>

        </div>

        <div class="rtl-list mt-5">
            <div>روز</div>
        </div>



    </AppLayout>
</template>

<style scoped>

</style>
