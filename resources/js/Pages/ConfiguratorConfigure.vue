<script setup> 
import { Head } from '@inertiajs/vue3';
import Navigation from '@/Components/Navigation.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    categories: {
        type: Array,
        default: () => [],
    },
    frameType: {
        type: String,
        required: true,
    },
    frameConfig: {
        type: Object,
        required: true,
    },
    svg: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <Head :title="`${frameType} Configuration - FrameCraft`" />

    <div class="bg-white">
        <Navigation :categories="categories" />

        <!-- Main Content -->
        <main class="min-h-screen py-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="text-center mb-16">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4">
                        {{ frameType.charAt(0).toUpperCase() + frameType.slice(1) }} Frame Configuration
                    </h1>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Configure your {{ frameType }} frame settings
                    </p>
                </div>

                <!-- SVG Preview -->
                <div class="bg-gray-50 rounded-lg p-8 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Frame Preview</h2>
                    <div class="bg-white rounded-lg border border-gray-200 p-6 flex justify-center">
                        <div v-html="svg" class="pt-12 pb-12 pl-12 pr-12"></div>
                    </div>
                </div>

            </div>
        </main>

        <Footer />
    </div>
</template> 