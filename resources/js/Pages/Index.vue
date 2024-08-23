<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {Swiper, SwiperSlide} from "swiper";
</script>

<template>
    <AppLayout title="صفحه اصلی">
        <h1>HOME</h1>

        <Swiper slides-per-view="3" speed="500" loop="true" css-mode="true">
            <SwiperSlide>1111111111</SwiperSlide>
            <SwiperSlide>2222222222</SwiperSlide>
            <SwiperSlide>3333333333</SwiperSlide>
            <SwiperSlide>4444444444</SwiperSlide>
            <SwiperSlide>5555555555</SwiperSlide>

        </Swiper>
        
    </AppLayout>
</template>

<style scoped>

</style>
