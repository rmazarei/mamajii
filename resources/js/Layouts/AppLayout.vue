<script setup>
import {onMounted, ref} from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import TopNavigation from "@/Components/ThemeParts/TopNavigation.vue";


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    title: String,
    metaDescription: String,
    metaKeywords: String,
});

const defaultMetaDescription = ref('ماماجی')
const defaultMetaKeywords = ref('ماماجی')


const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

function toggleSearch()
{
    // showMobileSearch.value = !showMobileSearch.value
    // document.getElementById('mobile-search-overlay').classList.toggle('hidden')
}
function toggleMobileMenu()
{
    // showMobileMenu.value = !showMobileMenu.value
    // document.getElementById('slide-mobile-menu').classList.toggle('open')
    // document.getElementById('overlay').classList.toggle('hidden')
}


// const productCategoriesStore = useProductCategoriesStore();
// const productCategories = productCategoriesStore.categories;

</script>

<template>
    <div>
        <!--        <Head :title="title" />-->
        <Head>
            <title>{{ title }}</title>
            <meta head-key="description" name="description" :content="metaDescription ? metaDescription : defaultMetaDescription" />
            <meta head-key="keywords" name="keywords" :content="metaKeywords ? metaKeywords : defaultMetaKeywords" />
        </Head>
        <Banner />

        <div class="bg-gray-200 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <TopNavigation />


                    <!-- Page Content -->
                    <main>
                        <slot />
                    </main>
                </div>
            </div>
        </div>

    </div>
</template>
