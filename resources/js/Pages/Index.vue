<script setup>

import {Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout title="صفحه اصلی">
        <div class="home-main-slider">
            <h3 class="text-2xl font-weight-bold">متن آزمایشی</h3>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
        </div>
        <div class="mt-5 mb-2 text-center">
            <h4>خدمات ماماجی</h4>
        </div>
        <div class="home-main-icons flex-col md:flex-row ">
            <Link class=""><img src="/images/home-main-icons-01.webp" alt="بیمارستان‌ها"></Link>
            <Link class=""><img src="/images/home-main-icons-02.webp" alt="ماماها"></Link>
            <Link class=""><img src="/images/home-main-icons-03.webp" alt="تقویم بارداری"></Link>
            <Link class=""><img src="/images/home-main-icons-04.webp" alt="نوبت آنلاین"></Link>
            <Link class=""><img src="/images/home-main-icons-05.webp" alt="پرسش و پاسخ"></Link>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
