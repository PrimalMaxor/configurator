<script setup lang="ts">
import { Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { Button } from '@/components/ui/button';

interface Props {
    open: boolean;
    configType: string;
    configMaterial: string;
}

interface Emits {
    (e: 'update:open', value: boolean): void;
    (e: 'startFromScratch', type: string, material: string): void;
    (e: 'usePreset', type: string, material: string): void;
}

const props = defineProps<Props>();
const emit = defineEmits<Emits>();

const handleStartFromScratch = () => {
    emit('startFromScratch', props.configType, props.configMaterial);
    emit('update:open', false);
};

const handleUsePreset = () => {
    emit('usePreset', props.configType, props.configMaterial);
    emit('update:open', false);
};

const handleClose = () => {
    emit('update:open', false);
};
</script>

<template>
    <Dialog :open="open" @update:open="(value: boolean) => emit('update:open', value)">
        <DialogContent class="sm:max-w-md bg-white border border-gray-200 shadow-xl">
            <DialogHeader>
                <DialogTitle class="text-xl font-semibold text-gray-900">
                    Configuration Options
                </DialogTitle>
                <DialogDescription class="text-gray-600">
                    Choose how you want to configure your {{ configType }} with {{ configMaterial }}
                </DialogDescription>
            </DialogHeader>
            <div class="space-y-4 py-4">
                <div class="grid grid-cols-1 gap-4">
                    <button
                        @click="handleStartFromScratch"
                        class="flex items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group"
                    >
                        <div class="text-center">
                            <div class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 mb-1">
                                Start from Scratch
                            </div>
                            <div class="text-sm text-gray-500 group-hover:text-gray-700">
                                Create a new configuration from the beginning
                            </div>
                        </div>
                    </button>
                    <button
                        @click="handleUsePreset"
                        class="flex items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group"
                    >
                        <div class="text-center">
                            <div class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 mb-1">
                                Use Preset
                            </div>
                            <div class="text-sm text-gray-500 group-hover:text-gray-700">
                                Start with a pre-configured template
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <DialogFooter>
                <Button variant="outline" @click="handleClose" class="border-gray-300 text-gray-700 hover:bg-gray-50">
                    Cancel
                </Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template> 