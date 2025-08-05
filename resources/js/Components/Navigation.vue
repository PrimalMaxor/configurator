<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    categories: {
        type: Array,
        default: () => [],
    },
});

const searchQuery = ref('');
const activeDropdown = ref(null);

const toggleDropdown = (categoryId) => {
    activeDropdown.value = activeDropdown.value === categoryId ? null : categoryId;
};

const closeDropdown = () => {
    activeDropdown.value = null;
};

const openDropdown = (categoryId) => {
    activeDropdown.value = categoryId;
};
</script>

<template>
    <nav class="bg-white shadow-sm border-b">
        <!-- Top Navigation Bar -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Left Side: Logo and Search -->
                <div class="flex items-center space-x-6">
                    <div class="flex-shrink-0">
                        <Link href="/" class="text-2xl font-bold text-gray-900 hover:text-blue-600 transition duration-300">
                            FrameCraft
                        </Link>
                    </div>
                    
                    <!-- Search Bar -->
                    <div class="hidden md:block">
                        <div class="relative">
                            <input
                                v-model="searchQuery"
                                type="text"
                                placeholder="Search products..."
                                class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Account Links -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-6">
                        <Link href="/about" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-300">
                            About Us
                        </Link>
                        <Link href="/contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-300">
                            Contact
                        </Link>
                        <Link href="/account" class="bg-blue-50 text-blue-700 hover:bg-blue-100 px-4 py-2 rounded-lg text-sm font-medium transition duration-300">
                            My Account
                        </Link>
                        <Link href="/cart" class="bg-orange-500 text-white hover:bg-orange-600 px-4 py-2 rounded-lg text-sm font-medium transition duration-300 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                            </svg>
                            <span>My Cart</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Navigation Bar (only show if categories exist) -->
        <div v-if="categories.length > 0" class="bg-gray-50 border-t">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-center space-x-8 h-12">
                    <div
                        v-for="category in categories"
                        :key="category.id"
                        class="relative group"
                        @mouseenter="openDropdown(category.id)"
                        @mouseleave="closeDropdown"
                    >
                        <button class="flex items-center space-x-1 text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-300">
                            <span>{{ category.name }}</span>
                            <svg v-if="category.sub_categories && category.sub_categories.length > 0" class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div
                            v-if="category.sub_categories && category.sub_categories.length > 0 && activeDropdown === category.id"
                            class="absolute top-full left-0 mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50"
                            @mouseenter="openDropdown(category.id)"
                            @mouseleave="closeDropdown"
                        >
                            <Link
                                v-for="subCategory in category.sub_categories"
                                :key="subCategory.id"
                                :href="`/products?category=${subCategory.slug}`"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150"
                            >
                                {{ subCategory.name }}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template> 