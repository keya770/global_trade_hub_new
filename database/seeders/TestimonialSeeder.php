<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'John Davis',
                'client_position' => 'CEO',
                'company_name' => 'Maritime Solutions Ltd',
                'testimonial' => 'SMA Ship Brokers has been instrumental in our fleet expansion. Their expertise in vessel acquisition and market analysis helped us make informed decisions that significantly improved our operations.',
                'rating' => 5,
                'service_type' => 'Vessel Acquisition',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Sarah Mitchell',
                'client_position' => 'Operations Director',
                'company_name' => 'TankerCo',
                'testimonial' => 'The team at SMA Ship Brokers provided exceptional chartering services. Their market knowledge and negotiation skills helped us secure favorable terms for our tanker fleet.',
                'rating' => 5,
                'service_type' => 'Chartering Services',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Robert Wilson',
                'client_position' => 'Managing Director',
                'company_name' => 'Bulk Shipping Co',
                'testimonial' => 'Outstanding valuation services! SMA Ship Brokers\'s detailed analysis helped us understand the true market value of our vessels and make strategic decisions.',
                'rating' => 5,
                'service_type' => 'Vessel Valuation',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'client_name' => 'Maria Rodriguez',
                'client_position' => 'Fleet Manager',
                'company_name' => 'Caribbean Cargo Lines',
                'testimonial' => 'Their vessel management services are top-notch. We\'ve seen a 25% improvement in operational efficiency since partnering with SMA Ship Brokers.',
                'rating' => 4,
                'service_type' => 'Vessel Management',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'client_name' => 'David Chen',
                'client_position' => 'Director',
                'company_name' => 'Pacific Maritime Group',
                'testimonial' => 'The market insights and consulting services provided by SMA Ship Brokers have been invaluable for our strategic planning and business growth.',
                'rating' => 5,
                'service_type' => 'Consulting',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'client_name' => 'Emma Thompson',
                'client_position' => 'CEO',
                'company_name' => 'Atlantic Shipping',
                'testimonial' => 'Professional, reliable, and results-driven. SMA Ship Brokers has consistently delivered exceptional service across all our maritime needs.',
                'rating' => 5,
                'service_type' => 'General Services',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
