<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    label: {
        type: String,
        required: true,
    },
    material: {
        type: String,
        required: true,
    },
    image: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 w-80 max-w-full">
        <img :src="`/storage/${image}`" :alt="label" class="w-full h-48 object-cover rounded-t-lg"> 
        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ title }}</h3>
            <p class="text-gray-600 mb-4">{{ description }}</p>
            <Link 
                :href="`/products?material=${material}`"
                class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium"
            >
                View {{ label }} products
            </Link>
        </div>
    </div>
</template>