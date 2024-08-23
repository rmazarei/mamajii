<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <header class="grid items-center gap-2 py-5 lg:grid-cols-4 bg-white">

        <nav  class="flex flex-1 justify-start">
            <!--                class="rounded-full px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"-->
            <template v-if="$page.props.auth.user">
                <Link
                    v-if="$page.props.auth.user.user_type !== 'admin'"
                    :href="route('dashboard')"
                    class="bg-blue-400 text-white rounded-full p-2"
                >
                    داشبورد
                </Link>
                <a v-else class="bg-blue-400 text-white rounded-full p-2" :href="route('admin.dashboard')">
                    داشبورد
                </a>

            </template>
            <template v-else>

            </template>
            <template v-else>
                <div class="bg-blue-400 text-white rounded-full p-2">
                    <Link
                        :href="route('login')"
                        class="rounded-md pr-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        ورود
                    </Link>
                    <span>|</span>
                    <Link
                        :href="route('register')"
                        class="rounded-md pl-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        ثبت‌نام
                    </Link>
                </div>
            </template>
        </nav>
        <div class="main-nav-desktop flex justify-between text-[#707070] lg:col-span-2">
            <div><Link :href="'/'">صفحه اصلی</Link></div>
            <div><Link :href="'/articles'">مقالات</Link></div>
            <div><Link :href="'/courses'">دوره‌های ماماجی</Link></div>
            <div><Link :href="'/about'">درباره ما</Link></div>
            <div><Link :href="'/contact'">تماس با ما</Link></div>
        </div>
        <div class="flex justify-end">
            <img src="/images/logo01.png" alt="mamajii" class="w-[150px] border border-white">
        </div>

    </header>
</template>

<style scoped>

</style>
