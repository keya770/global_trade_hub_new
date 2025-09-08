<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main services
        $services = [
            [
                'name' => 'Tanker Chartering',
                'description' => 'Specialized chartering services for all tanker types including CPP, DPP, and gas carriers',
                'content' => 'Our tanker chartering services provide comprehensive solutions for all types of tanker vessels. We specialize in CPP (Clean Petroleum Products), DPP (Dirty Petroleum Products), and gas carriers including LNG and LPG vessels.',
                'icon' => 'fas fa-handshake',
                'is_active' => true,
                'sort_order' => 1,
                'sub_services' => [
                    [
                        'name' => 'CPP Tankers',
                        'description' => 'Clean petroleum product tanker chartering',
                        'icon' => 'fas fa-gas-pump',
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'DPP Tankers',
                        'description' => 'Dirty petroleum product tanker chartering',
                        'icon' => 'fas fa-oil-can',
                        'is_active' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'name' => 'Gas Carriers',
                        'description' => 'LNG and LPG vessel chartering',
                        'icon' => 'fas fa-fire',
                        'is_active' => true,
                        'sort_order' => 3,
                    ],
                ]
            ],
            [
                'name' => 'Sale & Purchase',
                'description' => 'Expert brokerage for newbuild, second-hand vessels, and scrap vessel transactions',
                'content' => 'Our sale and purchase team provides expert brokerage services for all vessel types. We handle newbuild contracts, second-hand vessel sales, and scrap vessel transactions with the highest level of professionalism.',
                'icon' => 'fas fa-exchange-alt',
                'is_active' => true,
                'sort_order' => 2,
                'sub_services' => [
                    [
                        'name' => 'Newbuild Contracts',
                        'description' => 'New vessel construction contracts',
                        'icon' => 'fas fa-ship',
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'Second-hand Sales',
                        'description' => 'Pre-owned vessel transactions',
                        'icon' => 'fas fa-handshake',
                        'is_active' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'name' => 'Scrap Vessels',
                        'description' => 'End-of-life vessel disposal',
                        'icon' => 'fas fa-recycle',
                        'is_active' => true,
                        'sort_order' => 3,
                    ],
                ]
            ],
            [
                'name' => 'Valuation',
                'description' => 'Professional vessel condition inspections and comprehensive survey coordination',
                'content' => 'Our valuation services include professional vessel condition inspections, comprehensive survey coordination, and detailed market analysis. We provide accurate valuations for all vessel types.',
                'icon' => 'fas fa-clipboard-check',
                'is_active' => true,
                'sort_order' => 3,
                'sub_services' => [
                    [
                        'name' => 'Condition Surveys',
                        'description' => 'Comprehensive vessel condition assessments',
                        'icon' => 'fas fa-search',
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'Market Analysis',
                        'description' => 'Current market value assessments',
                        'icon' => 'fas fa-chart-line',
                        'is_active' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'name' => 'Survey Coordination',
                        'description' => 'Professional surveyor coordination',
                        'icon' => 'fas fa-users',
                        'is_active' => true,
                        'sort_order' => 3,
                    ],
                ]
            ],
            [
                'name' => 'Marine Services',
                'description' => 'Complete technical support including underwater repairs, salvage, and towing operations',
                'content' => 'Our marine services division provides complete technical support including underwater repairs, salvage operations, towing services, and emergency response. We ensure your vessels receive the highest quality technical support.',
                'icon' => 'fas fa-tools',
                'is_active' => true,
                'sort_order' => 4,
                'sub_services' => [
                    [
                        'name' => 'Underwater Repairs',
                        'description' => 'Professional underwater hull repairs',
                        'icon' => 'fas fa-water',
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'Salvage Operations',
                        'description' => 'Emergency salvage and recovery services',
                        'icon' => 'fas fa-life-ring',
                        'is_active' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'name' => 'Towing Services',
                        'description' => 'Professional vessel towing operations',
                        'icon' => 'fas fa-anchor',
                        'is_active' => true,
                        'sort_order' => 3,
                    ],
                ]
            ],
        ];

        foreach ($services as $serviceData) {
            $subServices = $serviceData['sub_services'];
            unset($serviceData['sub_services']);
            
            $service = Service::create($serviceData);
            
            foreach ($subServices as $subServiceData) {
                $subServiceData['service_id'] = $service->id;
                SubService::create($subServiceData);
            }
        }
    }
}
