<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = [
            [
                'title' => 'Dry Bulk Carriers',
                'slug' => 'dry-bulk-carriers',
                'description' => 'Specialized vessels for transporting dry cargo including grains, coal, iron ore, and other bulk commodities. Our expertise spans all vessel sizes and market segments.',
                'vessel_sizes' => 'Handysize (10,000-35,000 DWT) to Capesize (180,000+ DWT)',
                'cargo_types' => 'Iron ore, coal, grain, bauxite, phosphate, and more',
                'services' => 'Chartering, sale & purchase, valuation, market analysis',
                'status' => true,
            ],
            [
                'title' => 'General Cargo',
                'slug' => 'general-cargo',
                'description' => 'Versatile vessels designed to carry various types of cargo including project cargo and heavy lifts. Perfect for specialized transportation needs.',
                'vessel_sizes' => 'Multi-purpose vessels from 1,000 to 20,000 DWT',
                'cargo_types' => 'Project cargo, heavy lifts, breakbulk, machinery',
                'services' => 'Multi-purpose Vessels, Heavy Lift Carriers, Project Cargo Specialists, Breakbulk Operations',
                'status' => true,
            ],
            [
                'title' => 'Container Ships',
                'slug' => 'container-ships',
                'description' => 'Modern container vessels for efficient transportation of containerized cargo across global trade routes. State-of-the-art technology and optimal efficiency.',
                'vessel_sizes' => 'Feeder to Ultra Large Container Vessels (ULCV)',
                'cargo_types' => 'Containerized goods, manufactured products, consumer goods',
                'services' => 'Container chartering, slot chartering, liner services, port operations',
                'status' => true,
            ],
            [
                'title' => 'Tanker Vessels',
                'slug' => 'tanker-vessels',
                'description' => 'Specialized vessels for transporting liquid cargo including crude oil, refined products, chemicals, and LNG/LPG. Advanced safety and environmental standards.',
                'vessel_sizes' => 'Product tankers to VLCC/ULCC crude carriers',
                'cargo_types' => 'Crude oil, refined products, chemicals, LNG, LPG',
                'services' => 'Crude oil transportation, product tanker chartering, chemical tanker operations',
                'status' => true,
            ],
            [
                'title' => 'Offshore Support Vessels',
                'slug' => 'offshore-support-vessels',
                'description' => 'Specialized vessels supporting offshore oil and gas operations, wind farms, and marine construction projects. Advanced technology and safety systems.',
                'vessel_sizes' => 'Platform Supply Vessels, Anchor Handling Tugs, Crew Transfer Vessels',
                'cargo_types' => 'Offshore equipment, supplies, personnel, construction materials',
                'services' => 'Platform Supply Vessels, Anchor Handling Tugs, Crew Transfer Vessels, Offshore Support',
                'status' => true,
            ],
            [
                'title' => 'Passenger & Ferry Vessels',
                'slug' => 'passenger-ferry-vessels',
                'description' => 'Passenger vessels and ferries for commercial and tourism operations. Comfort, safety, and efficiency for passenger transportation.',
                'vessel_sizes' => 'Small ferries to large cruise vessels',
                'cargo_types' => 'Passengers, vehicles, tourism services',
                'services' => 'Passenger ferry operations, cruise vessel management, tourism services',
                'status' => true,
            ],
        ];

        foreach ($sectors as $sector) {
            Sector::create($sector);
        }
    }
}
