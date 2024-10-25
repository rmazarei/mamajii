<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import moment from "jalali-moment";
import {onMounted, ref} from "vue";

const props = defineProps({doctor: Object, months: Object, weekDays: Object})

const today = ref(moment(new Date()).locale('fa'));
const endOfMonth = moment(new Date()).locale('fa').endOf("month");
const currentMonth = moment(new Date()).locale('fa').format("MM");


const daysList = ref([]);

const selectedMonth = ref(0)
const selectedDate = ref(0)

const makeDaysList = () => {
    daysList.value = []
    for (let i = 0; i < 31; i++) {
        today.value.add(1, 'day')
        if (props.weekDays.includes(today.value.format("ddd")))
            daysList.value.push([today.value.format("YYYY/MM/DD"), today.value.format("ddd")])
    }

}

const setMonth = (monthIndex) => {
    selectedMonth.value = monthIndex;
    today.value = moment(new Date()).locale('fa')
    today.value = today.value.add(monthIndex, 'month')
    makeDaysList()
}

onMounted(() => {
    makeDaysList()
})

</script>

<template>
    <AppLayout :title='doctor.name + " " + doctor.family'>
        <div class="title-one mt-5">ماه</div>
        <div class="rtl-list">
            <div v-for="(monthYear, index) in months" :class="{selected: selectedMonth === index}"
                 @click="setMonth(index)">
                {{ monthYear[0] }}
                <br>
                {{ monthYear[1] }}
            </div>

        </div>

        <div class="title-one mt-5">روز</div>
        <div class="rtl-list overflow-auto pb-3">
            <div v-for="(item, index) in daysList" :key="index" :class="{selected: selectedDate === index}"
                 class="px-3"
                 @click="selectedDate = index">
                {{ item[1] }} {{ item[0] }}
            </div>
        </div>

    </AppLayout>
</template>

<style scoped>

</style>
