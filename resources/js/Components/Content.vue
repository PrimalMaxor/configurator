<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    hasHeroSection: {
        type: Boolean,
        default: false,
    },
    page: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div v-if="page">
        <div v-if="!hasHeroSection" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h1 class="text-5xl font-bold text-gray-900 leading-tight">{{ page.title }}</h1>
                        <p class="text-xl text-gray-600 leading-relaxed">{{ page.description }}</p>
                    </div>
                    <div v-if="page.main_image" class="relative">
                        <img 
                            :src="`/storage/${page.main_image}`" 
                            :alt="page.title"
                            class="w-full h-96 object-cover rounded-2xl shadow-2xl"
                        >
                    </div>
                </div>
            </div>
        </div>

        <!-- Show the main content -->
        <div v-if="page.content" class="py-16 pt-3 bg-gray-200">
            <div class="max-w-4xl mx-auto px-4">
                <div v-if="hasHeroSection" class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Content</h2>
                </div>
                <div class="prose prose-lg max-w-none" v-html="page.content"></div>
            </div>
        </div>
    </div>
</template>