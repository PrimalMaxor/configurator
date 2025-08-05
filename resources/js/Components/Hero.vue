<script setup>
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
                </div>
            </div>
        </div>
    </section>
</template> 