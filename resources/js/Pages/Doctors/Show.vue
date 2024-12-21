<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import moment from "jalali-moment";
import {Link} from "@inertiajs/vue3";

const props = defineProps({doctor: Object})

const doctorTimes = props.doctor.times

const m = moment(new Date(), 'YYYY/M/D')
m.locale('fa')

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

                <template v-if="doctorTimes != null">
                    <p v-for="(index, weekDay) in weekDays">
                        <template v-if="doctorTimes[weekDay] === 'on'">
                            {{ index }}:
                            از
                            {{ doctorTimes['start_' + startEnds[weekDay]] }}
                            تا
                            {{ doctorTimes['end_' + startEnds[weekDay]] }}
                        </template>
                    </p>
                    <Link :href="route('booking.one', doctor.id)"
                          class="bg-blue-400 text-white text-center w-full rounded-full block my-2">
                        دریافت نوبت
                    </Link>
                </template>
                <div class="mt-2 border-t">
                    <span class="font-bold">آدرس:</span>
                    <p v-html="doctor.address"></p>
                </div>
            </div>
            <div class="col-span-8 md:col-span-4 lg:col-span-6">
                <p v-html="doctor.bio"></p>
            </div>
        </div>

    </AppLayout>
</template>


<style scoped>

</style>
