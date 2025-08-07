<script setup lang="ts">
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { ref, onMounted, watch } from 'vue';

interface Configuration {
    id: number;
    material: string;
    data: any;
    created_at: string;
    updated_at: string;
}

const currentView = ref<'visualize' | 'technical'>('visualize');
const svgContent = ref<string>('');
const isLoading = ref(false);
const error = ref<string>('');

const toggleView = () => {
    currentView.value = currentView.value === 'visualize' ? 'technical' : 'visualize';
};

const loadSvg = async () => {
    isLoading.value = true;
    error.value = '';
    
    try {
        const url = new URL(`/configuration/${props.configuration.id}/${currentView.value === 'visualize' ? 'visual' : 'technical'}`, window.location.origin);
        
        const response = await fetch(url);
        
        if (!response.ok) {
            throw new Error('Failed to load SVG');
        }
        
        svgContent.value = await response.text();
    } catch (err) {
        error.value = err instanceof Error ? err.message : 'An error occurred';
        console.error('Error loading SVG:', err);
    } finally {
        isLoading.value = false;
    }
};

const props = defineProps<{
    configuration: Configuration;
}>();

onMounted(() => {
    loadSvg();
});

watch(currentView, () => {
    loadSvg();
});

const downloadSvg = () => {
    if (!svgContent.value) return;
    
    const blob = new Blob([svgContent.value], { type: 'image/svg+xml' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `configuration-${props.configuration.id}-${currentView.value}.svg`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
};
</script>

<template>
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-6xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    Configuration Details
                </h1>
                <p class="text-gray-600">
                    Material: {{ configuration.material }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg">
                    <div class="flex items-center justify-center space-x-4 mb-4">
                        <button 
                            @click="toggleView"
                            :disabled="isLoading"
                            :class="[
                                'px-6 py-3 rounded-lg font-medium transition-all duration-200',
                                currentView === 'visualize' 
                                    ? 'bg-blue-500 text-white shadow-lg' 
                                    : 'bg-gray-200 text-gray-700 hover:bg-gray-300',
                                isLoading ? 'opacity-50 cursor-not-allowed' : ''
                            ]"
                        >
                            <span v-if="isLoading && currentView === 'visualize'" class="animate-spin mr-2">⟳</span>
                            Visualize
                        </button>
                        <button 
                            @click="toggleView"
                            :disabled="isLoading"
                            :class="[
                                'px-6 py-3 rounded-lg font-medium transition-all duration-200',
                                currentView === 'technical' 
                                    ? 'bg-blue-500 text-white shadow-lg' 
                                    : 'bg-gray-200 text-gray-700 hover:bg-gray-300',
                                isLoading ? 'opacity-50 cursor-not-allowed' : ''
                            ]"
                        >
                            <span v-if="isLoading && currentView === 'technical'" class="animate-spin mr-2">⟳</span>
                            Technical
                        </button>
                    </div>

                   
                    <div class="mt-6">
                        <!-- Loading state -->
                        <div v-if="isLoading" class="flex items-center justify-center py-12">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                            <span class="ml-3 text-gray-600">Loading SVG...</span>
                        </div>

                        <!-- Error state -->
                        <div v-else-if="error" class="text-center py-8">
                            <div class="text-red-500 mb-2">
                                <svg class="w-12 h-12 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-lg font-medium">Error loading SVG</p>
                                <p class="text-sm text-gray-600">{{ error }}</p>
                            </div>
                            <button 
                                @click="loadSvg"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors"
                            >
                                Retry
                            </button>
                        </div>

                        <!-- SVG content -->
                        <div v-else-if="svgContent" class="flex justify-center">
                            <div 
                                class="border border-gray-200 rounded-lg bg-white"
                                style="width: 100%; max-width: 600px; max-height: 400px; display: flex; align-items: center; justify-content: center;"
                            >
                                <div 
                                    v-html="svgContent"
                                    style="max-width: 100%; max-height: 100%; width: auto; height: auto;"
                                ></div>
                            </div>
                        </div>

                        <!-- Empty state -->
                        <div v-else class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                            <p>No SVG content available</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Configuration Details</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Material:</span>
                            <span class="font-medium capitalize">{{ configuration.material }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Created:</span>
                            <span class="text-sm text-gray-500">{{ new Date(configuration.created_at).toLocaleDateString() }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="text-sm text-gray-500">{{ new Date(configuration.updated_at).toLocaleDateString() }}</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <button 
                            @click="downloadSvg"
                            :disabled="!svgContent || isLoading"
                            class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                        >
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            Download SVG
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 