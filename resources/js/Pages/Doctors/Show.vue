<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({doctor: Object})

const doctorTimes = props.doctor.times

const weekDays = {
    'sat': 'شنبه',
    'sun': 'یک شنبه',
    'mon': 'دو شنبه',
    'tue': 'سه شنبه',
    'wed': 'چهار شنبه',
    'thu': 'پنج شنبه',
    'fri': 'جمعه',
}

const startEnds = {
    'sat': 0,
    'sun': 1,
    'mon': 2,
    'tue': 3,
    'wed': 4,
    'thu': 5,
    'fri': 6,
}

</script>

<template>
    <AppLayout :title='doctor.name + " " + doctor.family'>
        <h1 class="my-2 text-center text-2xl font-bold text-blue-500">
            {{ doctor.name }} {{ doctor.family }}
        </h1>

        <div class="grid grid-cols-8 gap-4">
            <div
                class="hospital-info col-span-8 md:col-span-4 lg:col-span-2 border rounded p-2 bg-white rounded-lg shadow-lg">


                <p v-for="(index, weekDay) in weekDays">
                    <template v-if="doctorTimes[weekDay] === 'on'">
                        {{ index }}:
                        از
                        {{ doctorTimes['start_' + startEnds[weekDay]] }}
                        تا
                        {{ doctorTimes['end_' + startEnds[weekDay]] }}
                    </template>
                </p>
            </div>
            <div class="col-span-8 md:col-span-4 lg:col-span-6">

            </div>
        </div>

    </AppLayout>
</template>


<style scoped>

</style>
