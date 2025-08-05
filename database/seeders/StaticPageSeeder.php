<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use App\StaticPageType;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create homepage
        StaticPage::updateOrCreate(
            ['type' => StaticPageType::HOMEPAGE],
            [
                'title' => 'Premium Window & Door Frames - Quality Craftsmanship',
                'description' => 'Crafting quality window frames, door frames, and sliding doors with precision and style. Transform your space with our expert craftsmanship.',
                'content' => $this->getHomepageContent(),
                'main_image' => 'homepage-hero.jpg',
            ]
        );
    }

    private function getHomepageContent(): string
    {
        return '
        <article class="hero-section">
            <header class="hero-content">
                <h1>Premium Window & Door Frames</h1>
                <p>Crafting quality window frames, door frames, and sliding doors with precision and style. Transform your space with our expert craftsmanship.</p>
                <aside class="hero-stats">
                    <div class="stat">
                        <strong class="stat-number">500+</strong>
                        <span class="stat-label">Happy Customers</span>
                    </div>
                    <div class="stat">
                        <strong class="stat-number">15+</strong>
                        <span class="stat-label">Years Experience</span>
                    </div>
                    <div class="stat">
                        <strong class="stat-number">1000+</strong>
                        <span class="stat-label">Projects Completed</span>
                    </div>
                    <div class="stat">
                        <strong class="stat-number">24/7</strong>
                        <span class="stat-label">Support Available</span>
                    </div>
                </aside>
            </header>
        </article>

        <section class="services-section">
            <header>
                <h2>Our Services</h2>
                <p>We specialize in crafting high-quality frames and doors that enhance both the beauty and functionality of your space.</p>
            </header>
            
            <div class="services-grid">
                <article class="service-card">
                    <header>
                        <h3>Window Frames</h3>
                    </header>
                    <p>Custom window frames designed for durability and style. Available in various materials including wood, aluminum, and composite.</p>
                    <ul>
                        <li>Custom sizing and design</li>
                        <li>Energy-efficient options</li>
                        <li>Weather-resistant materials</li>
                        <li>Professional installation</li>
                    </ul>
                </article>
                
                <article class="service-card">
                    <header>
                        <h3>Door Frames</h3>
                    </header>
                    <p>Sturdy and elegant door frames that provide security and enhance your home\'s aesthetic appeal.</p>
                    <ul>
                        <li>Interior and exterior frames</li>
                        <li>Security-enhanced options</li>
                        <li>Sound-dampening features</li>
                        <li>Quick installation service</li>
                    </ul>
                </article>
                
                <article class="service-card">
                    <header>
                        <h3>Sliding Doors</h3>
                    </header>
                    <p>Modern sliding door solutions that maximize space and create seamless indoor-outdoor connections.</p>
                    <ul>
                        <li>Space-saving design</li>
                        <li>Smooth operation systems</li>
                        <li>Glass and panel options</li>
                        <li>Custom track systems</li>
                    </ul>
                </article>
            </div>
        </section>

        <section class="about-section">
            <header>
                <h2>About FrameCraft</h2>
            </header>
            <p>With over 15 years of experience in the industry, we\'ve built our reputation on quality craftsmanship, attention to detail, and exceptional customer service.</p>
            <p>Our team of skilled craftsmen uses only the finest materials and latest techniques to ensure your window frames, door frames, and sliding doors not only look beautiful but stand the test of time.</p>
            
            <div class="about-features">
                <article class="feature">
                    <header>
                        <h4>Quality Materials</h4>
                    </header>
                    <p>We use only premium materials that meet industry standards</p>
                </article>
                <article class="feature">
                    <header>
                        <h4>Expert Installation</h4>
                    </header>
                    <p>Professional installation by certified technicians</p>
                </article>
                <article class="feature">
                    <header>
                        <h4>Warranty Coverage</h4>
                    </header>
                    <p>Comprehensive warranty on all products and installation</p>
                </article>
            </div>
        </section>

        <section class="contact-section">
            <header>
                <h2>Get In Touch</h2>
            </header>
            <p>Ready to transform your space? Contact us for a free consultation and quote.</p>
            
            <address class="contact-info">
                <div class="contact-item">
                    <header>
                        <h4>Address</h4>
                    </header>
                    <p>123 Frame Street, Building District<br>City, State 12345</p>
                </div>
                <div class="contact-item">
                    <header>
                        <h4>Phone</h4>
                    </header>
                    <p><a href="tel:+15551234567">(555) 123-4567</a></p>
                </div>
                <div class="contact-item">
                    <header>
                        <h4>Email</h4>
                    </header>
                    <p><a href="mailto:info@framecraft.com">info@framecraft.com</a></p>
                </div>
            </address>
        </section>';
    }
}
