<script setup lang="ts">
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { ref } from 'vue';

defineProps<{
    types: string[];
    materials: string[];
}>();

const selectedType = ref<string | null>(null);
const selectedMaterials = ref<Record<string, string>>({});

const selectType = (type: string) => {
    if (selectedType.value === type) {
        selectedType.value = null;
        delete selectedMaterials.value[type];
    } else {
        selectedType.value = type;
    }
};

const selectMaterial = (type: string, material: string) => {
    selectedMaterials.value[type] = material;
};
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
                Select a configuration type to get started
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl w-full relative z-10">
            <div v-for="(type, index) in types" :key="type" class="relative">
                <Card
                    class="group cursor-pointer bg-white/90 backdrop-blur-sm border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-200 hover:scale-[1.02]"
                    :class="{ 'ring-2 ring-blue-500 border-blue-300 shadow-lg': selectedType === type }"
                    @click="selectType(type)">
                    <CardHeader class="pb-3">
                        <CardTitle
                            class="text-center text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                            {{ type }}
                        </CardTitle>
                    </CardHeader>
                    <CardContent class="pt-0">
                        <p class="text-sm text-gray-500 text-center group-hover:text-gray-700 transition-colors">
                            Configure your {{ type.toLowerCase() }}
                        </p>
                    </CardContent>
                </Card>
                <Transition enter-active-class="transition-all duration-300 ease-out"
                    enter-from-class="max-h-0 opacity-0 transform translate-y-2"
                    enter-to-class="max-h-80 opacity-100 transform translate-y-0"
                    leave-active-class="transition-all duration-200 ease-in"
                    leave-from-class="max-h-80 opacity-100 transform translate-y-0"
                    leave-to-class="max-h-0 opacity-0 transform translate-y-2">
                    <Card v-if="selectedType === type"
                        class="mt-3 bg-white/95 backdrop-blur-sm border border-gray-200 shadow-md">
                        <CardContent class="p-5">
                            <h3 class="text-base font-semibold text-gray-900 mb-4 text-center">
                                Select Material
                            </h3>
                            <div class="grid grid-cols-2 gap-2">
                                <button v-for="material in materials" :key="material"
                                    @click.stop="selectMaterial(type, material)"
                                    class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-150" :class="selectedMaterials[type] === material
                                        ? 'bg-blue-500 text-white shadow-sm'
                                        : 'bg-gray-100 text-gray-700 hover:bg-gray-200 hover:text-gray-900'">
                                    {{ material }}
                                </button>
                            </div>
                            <div class="mt-4 flex justify-center">
                                <button v-if="selectedMaterials[type]" @click.stop
                                    class="px-5 py-2 bg-blue-500 text-white rounded-md font-medium hover:bg-blue-600 transition-colors duration-150 shadow-sm hover:shadow-md">
                                    Configure {{ selectedMaterials[type] }}
                                </button>
                            </div>
                        </CardContent>
                    </Card>
                </Transition>
            </div>
        </div>
    </div>
</template>