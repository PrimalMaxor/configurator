<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navigation from '@/Components/Navigation.vue';
import Footer from '@/Components/Footer.vue';
import Hero from '@/Components/Hero.vue';
import Material from '@/Components/Material.vue';
import Content from '@/Components/Content.vue';

defineProps({
    homepage: {
        type: Object,
        default: null,
    },
});

</script>

<template>
    <Head :title="homepage?.title || 'FrameCraft - Premium Window & Door Frames'" />

    <div class="bg-white">
        <Navigation />

        <Hero :homepage="homepage" />

        <section id="materials" class="bg-gray-50 pb-12">
            <div class="text-center pt-16 pb-2">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Materials</h2>
            </div>
            <div class="flex flex-wrap justify-center gap-6 px-4 pt-12 mx-auto">
                <Material label="Wood" material="wood" image="wood.jpg" title="Wood" description="Wood is a natural material that is strong and durable. It is a popular choice for window frames and doors." />
                <Material label="Vinyl" material="vinyl" image="vinyl.jpg" title="Vinyl" description="Vinyl is a synthetic material that is strong and durable. It is a popular choice for window frames and doors." />
                <Material label="Aluminium" material="aluminium" image="aluminium.jpg" title="Aluminium" description="Aluminium is a synthetic material that is strong and durable. It is a popular choice for window frames and doors." />
                <Material label="Stock" material="stock" image="stock.jpg" title="Stock" description="Stock is a synthetic material that is strong and durable. It is a popular choice for window frames and doors." />
            </div>
    </section>

        <div class="bg-blue-50">
            <Content :hasHeroSection="true" :page="homepage" />
        </div>

        <Footer />
    </div>
</template>
