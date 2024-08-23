<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>


        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="antialiased">
        @inertia

        <footer>
            <div class="grid grid-cols-6 gap-4 text-white">
                <div class="">
                    <h5 class="text-lg font-bold">لینک‌های مهم</h5>
                    <ul>
                        <li><a href="">مشاوره پزشکی</a></li>
                        <li><a href="">حریم خصوصی</a></li>
                        <li><a href="">خرید پکیج بارداری</a></li>
                    </ul>
                </div>
                <div class="">
                    <h5 class="text-lg font-bold">ماماجی</h5>
                    <ul>
                        <li><a href="">تماس با ما</a></li>
                        <li><a href="">درباره ماماجی</a></li>
                        <li><a href="">قوانین و مقررات</a></li>
                        <li><a href="">ثبت نام پزشک و مشاور</a></li>
                    </ul>
                </div>
                <div class="col-start-5 text-center col-span-2">
                    <img src="/images/logo01.png" alt="mamajii" class="mx-auto">
                    <br>
                    <span class="">تهران، شهریار، ساختمان پزشکان، پلاک ۸</span>
                </div>
            </div>
        </footer>
        <div class="copy-right text-center py-5">
            کلیه حقوق این وب سایت متعلق به سایت ماماجی است.
        </div>
    </body>
</html>
