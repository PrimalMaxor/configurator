<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    homepage: {
        type: Object,
        default: null,
    },
});
</script>

<template>
    <section id="home" class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white" 
        :style="homepage?.main_image ? `background-image: url('/storage/${homepage.main_image}'); background-size: cover; background-position: center;` : ''">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        {{ homepage?.title || 'Premium Window & Door Frames' }}
                    </h1>
                    <p class="text-xl mb-8 text-blue-100">
                        {{ homepage?.description || 'Crafting quality window frames, door frames, and sliding doors with precision and style. Transform your space with our expert craftsmanship.' }}
                    </p>
                    <Link
                        href="/configurator" 
                        class="inline-flex items-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-semibold text-lg rounded-lg transition duration-300 transform hover:scale-105 shadow-lg"
                    >
                        Start from Scratch
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template> 