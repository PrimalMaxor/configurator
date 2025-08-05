<script setup> 
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Navigation from '@/Components/Navigation.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    categories: {
        type: Array,
        default: () => [],
    },
});

const selectedFrameType = ref(null);

const frameTypes = [
    {
        id: 'window',
        name: 'Window Frame',
        description: 'Custom window frames for your home',
        icon: 'M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z',
        color: 'blue'
    },
    {
        id: 'door',
        name: 'Door Frame',
        description: 'Professional door frames and entrances',
        icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        color: 'green'
    },
    {
        id: 'sliding',
        name: 'Sliding Frame',
        description: 'Modern sliding door systems. high quality',
        icon: 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
        color: 'purple'
    }
];

const selectFrameType = (frameType) => {
    selectedFrameType.value = frameType;
};
</script>

<template>
    <Head title="Configurator - FrameCraft" />

    <div class="bg-white">
        <Navigation :categories="categories" />

        <!-- Main Content -->
        <main class="min-h-screen py-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="text-center mb-16">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4">Frame Configurator</h1>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Choose your frame type to get started with your custom configuration
                    </p>
                </div>

                <!-- Frame Type Selection -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div
                        v-for="frameType in frameTypes"
                        :key="frameType.id"
                        @click="selectFrameType(frameType)"
                        class="relative cursor-pointer group"
                    >
                        <div 
                            class="relative p-8 bg-white rounded-xl shadow-lg border-2 transition-all duration-300 hover:shadow-xl"
                            :class="selectedFrameType?.id === frameType.id 
                                ? `border-${frameType.color}-500 bg-${frameType.color}-50` 
                                : 'border-gray-200 hover:border-gray-300'"
                        >
                            <!-- Icon -->
                            <div class="flex justify-center mb-6">
                                <div 
                                    class="w-16 h-16 rounded-full flex items-center justify-center"
                                    :class="`bg-${frameType.color}-100 text-${frameType.color}-600`"
                                >
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="frameType.icon"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ frameType.name }}</h3>
                                <p class="text-gray-600">{{ frameType.description }}</p>
                            </div>

                            <!-- Selection Indicator -->
                            <div 
                                v-if="selectedFrameType?.id === frameType.id"
                                class="absolute top-4 right-4 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center"
                            >
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Continue Button -->
                <div v-if="selectedFrameType" class="text-center">
                    <Link 
                        :href="`/configurator/${selectedFrameType.id}`"
                        class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg rounded-lg transition duration-300 transform hover:scale-105 shadow-lg"
                    >
                        Continue with {{ selectedFrameType.name }}
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </Link>
                </div>
            </div>
        </main>

        <Footer />
    </div>
</template> 