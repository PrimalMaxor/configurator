<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Premium Window & Door Frames - Quality Craftsmanship" />
    
    <div class="bg-white">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-gray-900">FrameCraft</h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#home" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="#services" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Services</a>
                            <a href="#about" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">About</a>
                            <a href="#contact" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <Link v-if="canLogin" :href="route('login')" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                            Log in
                        </Link>
                        <Link v-if="canRegister" :href="route('register')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Register
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-bold mb-6">
                            Premium Window & Door Frames
                        </h1>
                        <p class="text-xl mb-8 text-blue-100">
                            Crafting quality window frames, door frames, and sliding doors with precision and style. 
                            Transform your space with our expert craftsmanship.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#contact" class="bg-white text-blue-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 text-center">
                                Get Free Quote
                            </a>
                            <a href="#services" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-900 transition duration-300 text-center">
                                View Services
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8 border border-white/20">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-3xl font-bold mb-2">500+</div>
                                    <div class="text-sm">Happy Customers</div>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-3xl font-bold mb-2">15+</div>
                                    <div class="text-sm">Years Experience</div>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-3xl font-bold mb-2">1000+</div>
                                    <div class="text-sm">Projects Completed</div>
                                </div>
                                <div class="bg-white/20 rounded-lg p-4 text-center">
                                    <div class="text-3xl font-bold mb-2">24/7</div>
                                    <div class="text-sm">Support Available</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        We specialize in crafting high-quality frames and doors that enhance both the beauty and functionality of your space.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Window Frames -->
                    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Window Frames</h3>
                        <p class="text-gray-600 mb-6">
                            Custom window frames designed for durability and style. Available in various materials including wood, aluminum, and composite.
                        </p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Custom sizing and design</li>
                            <li>• Energy-efficient options</li>
                            <li>• Weather-resistant materials</li>
                            <li>• Professional installation</li>
                        </ul>
                    </div>

                    <!-- Door Frames -->
                    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Door Frames</h3>
                        <p class="text-gray-600 mb-6">
                            Sturdy and elegant door frames that provide security and enhance your home's aesthetic appeal.
                        </p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Interior and exterior frames</li>
                            <li>• Security-enhanced options</li>
                            <li>• Sound-dampening features</li>
                            <li>• Quick installation service</li>
                        </ul>
                    </div>

                    <!-- Sliding Doors -->
                    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Sliding Doors</h3>
                        <p class="text-gray-600 mb-6">
                            Modern sliding door solutions that maximize space and create seamless indoor-outdoor connections.
                        </p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Space-saving design</li>
                            <li>• Smooth operation systems</li>
                            <li>• Glass and panel options</li>
                            <li>• Custom track systems</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">About FrameCraft</h2>
                        <p class="text-lg text-gray-600 mb-6">
                            With over 15 years of experience in the industry, we've built our reputation on quality craftsmanship, 
                            attention to detail, and exceptional customer service.
                        </p>
                        <p class="text-lg text-gray-600 mb-8">
                            Our team of skilled craftsmen uses only the finest materials and latest techniques to ensure 
                            your window frames, door frames, and sliding doors not only look beautiful but stand the test of time.
                        </p>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600 mb-2">15+</div>
                                <div class="text-sm text-gray-600">Years Experience</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600 mb-2">100%</div>
                                <div class="text-sm text-gray-600">Satisfaction Rate</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Why Choose Us?</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Quality Materials</h4>
                                    <p class="text-sm text-gray-600">We use only premium materials that meet industry standards</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Expert Installation</h4>
                                    <p class="text-sm text-gray-600">Professional installation by certified technicians</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Warranty Coverage</h4>
                                    <p class="text-sm text-gray-600">Comprehensive warranty on all products and installation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Get In Touch</h2>
                    <p class="text-xl text-gray-600">
                        Ready to transform your space? Contact us for a free consultation and quote.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-6">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Address</h4>
                                    <p class="text-gray-600">123 Frame Street, Building District<br>City, State 12345</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Phone</h4>
                                    <p class="text-gray-600">(555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Email</h4>
                                    <p class="text-gray-600">info@framecraft.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-6">Request a Quote</h3>
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Service Needed</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option>Window Frames</option>
                                    <option>Door Frames</option>
                                    <option>Sliding Doors</option>
                                    <option>Multiple Services</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">FrameCraft</h3>
                        <p class="text-gray-400 mb-4">
                            Premium window frames, door frames, and sliding doors with expert craftsmanship and quality materials.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Services</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">Window Frames</a></li>
                            <li><a href="#" class="hover:text-white">Door Frames</a></li>
                            <li><a href="#" class="hover:text-white">Sliding Doors</a></li>
                            <li><a href="#" class="hover:text-white">Installation</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Company</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">About Us</a></li>
                            <li><a href="#" class="hover:text-white">Our Team</a></li>
                            <li><a href="#" class="hover:text-white">Testimonials</a></li>
                            <li><a href="#" class="hover:text-white">Careers</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Contact</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>(555) 123-4567</li>
                            <li>info@framecraft.com</li>
                            <li>123 Frame Street</li>
                            <li>City, State 12345</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 FrameCraft. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>
