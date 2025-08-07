<script setup lang="ts">
defineProps<{
    type: string;
    material: string;
    presets: any[];
}>();
</script>

<template>
    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-6 relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-32 h-32 bg-blue-100 rounded-full opacity-30 animate-pulse"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-indigo-100 rounded-full opacity-40 animate-bounce"
                style="animation-delay: 1s;"></div>
            <div class="absolute bottom-40 left-1/4 w-20 h-20 bg-purple-100 rounded-full opacity-30 animate-pulse"
                style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 right-1/3 w-28 h-28 bg-cyan-100 rounded-full opacity-25 animate-bounce"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 via-transparent to-indigo-50/30"></div>
        </div>

        <div class="text-center mb-12 relative z-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-3">
                Configuration Tool
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Select a preset for your {{ type }}
            </p>
        </div>
    </div>
</template>