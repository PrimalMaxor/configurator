<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <Link href="/" class="text-2xl font-bold text-gray-900 hover:text-blue-600 transition duration-300">
                            FrameCraft
                        </Link>
                    </div>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            Home
                        </a>
                        <a href="#services" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            Services
                        </a>
                        <a href="#about" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            About
                        </a>
                        <a href="#contact" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            Contact
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
</template> 