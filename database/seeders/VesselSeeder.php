<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vessel;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vessels = [
            [
                'name' => 'Bulk Carrier - 82,000 DWT',
                'type' => 'Bulk Carrier',
                'description' => 'Modern bulk carrier with excellent cargo handling capabilities. Well-maintained vessel suitable for various dry bulk cargoes.',
                'capacity' => 82000,
                'length' => 225.0,
                'width' => 32.0,
                'draft' => 14.5,
                'daily_rate' => 25000,
                'flag' => 'Panama',
                'built_year' => 2018,
                'imo_number' => '9876543',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tanker - 115,000 DWT',
                'type' => 'Tanker',
                'description' => 'CPP Tanker with advanced navigation systems and safety equipment. Ideal for oil transportation.',
                'capacity' => 115000,
                'length' => 274.0,
                'width' => 48.0,
                'draft' => 16.8,
                'daily_rate' => null, // For sale
                'flag' => 'Singapore',
                'built_year' => 2020,
                'imo_number' => '9876544',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Container Ship - 8,500 TEU',
                'type' => 'Container Ship',
                'description' => 'Eco-friendly container vessel with Tier III compliance. Equipped with advanced container handling systems.',
                'capacity' => 85000,
                'length' => 366.0,
                'width' => 51.0,
                'draft' => 15.5,
                'daily_rate' => 35000,
                'flag' => 'Hong Kong',
                'built_year' => 2019,
                'imo_number' => '9876545',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'General Cargo - 12,000 DWT',
                'type' => 'General Cargo',
                'description' => 'Versatile general cargo vessel with heavy lift capabilities. Suitable for project cargo and general merchandise.',
                'capacity' => 12000,
                'length' => 140.0,
                'width' => 22.0,
                'draft' => 8.5,
                'daily_rate' => null, // For sale
                'flag' => 'Malta',
                'built_year' => 2017,
                'imo_number' => '9876546',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'LNG Tanker - 174,000 m³',
                'type' => 'LNG Tanker',
                'description' => 'State-of-the-art LNG carrier with membrane containment system. Designed for efficient LNG transportation.',
                'capacity' => 174000,
                'length' => 290.0,
                'width' => 46.0,
                'draft' => 12.5,
                'daily_rate' => 85000,
                'flag' => 'Norway',
                'built_year' => 2021,
                'imo_number' => '9876547',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'PSV - 4,000 DWT',
                'type' => 'Platform Supply Vessel',
                'description' => 'Platform supply vessel designed for offshore operations. Equipped with dynamic positioning system.',
                'capacity' => 4000,
                'length' => 85.0,
                'width' => 18.0,
                'draft' => 6.5,
                'daily_rate' => null, // For sale
                'flag' => 'UK',
                'built_year' => 2016,
                'imo_number' => '9876548',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'name' => 'Chemical Tanker - 25,000 DWT',
                'type' => 'Chemical Tanker',
                'description' => 'Chemical tanker with stainless steel tanks. Certified for carrying various chemical cargoes.',
                'capacity' => 25000,
                'length' => 165.0,
                'width' => 28.0,
                'draft' => 10.2,
                'daily_rate' => 28000,
                'flag' => 'Netherlands',
                'built_year' => 2018,
                'imo_number' => '9876549',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 7,
            ],
            [
                'name' => 'Ro-Ro Vessel - 6,500 CEU',
                'type' => 'Ro-Ro Vessel',
                'description' => 'Roll-on/roll-off vessel designed for vehicle transportation. Multiple decks for efficient cargo handling.',
                'capacity' => 6500,
                'length' => 200.0,
                'width' => 32.0,
                'draft' => 9.8,
                'daily_rate' => 32000,
                'flag' => 'Italy',
                'built_year' => 2019,
                'imo_number' => '9876550',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'name' => 'Fishing Vessel - 2,500 DWT',
                'type' => 'Fishing Vessel',
                'description' => 'Modern fishing vessel with advanced fish processing facilities. Equipped with modern navigation and safety systems.',
                'capacity' => 2500,
                'length' => 75.0,
                'width' => 16.0,
                'draft' => 5.5,
                'daily_rate' => null, // For sale
                'flag' => 'Japan',
                'built_year' => 2015,
                'imo_number' => '9876551',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 9,
            ],
        ];

        foreach ($vessels as $vessel) {
            Vessel::create($vessel);
        }
    }
}
