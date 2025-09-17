<?php

namespace Database\Seeders;

use App\Models\SubService;
use Illuminate\Database\Seeder;

class SubSubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing sub-services to add sub-sub-services to them
        $cppTankers = SubService::where('name', 'CPP Tankers')->first();
        $dppTankers = SubService::where('name', 'DPP Tankers')->first();
        $gasCarriers = SubService::where('name', 'Gas Carriers')->first();
        $newbuildContracts = SubService::where('name', 'Newbuild Contracts')->first();
        $conditionSurveys = SubService::where('name', 'Condition Surveys')->first();

        // Add sub-sub-services to CPP Tankers
        if ($cppTankers) {
            SubService::create([
                'name' => 'Gasoline Tankers',
                'description' => 'Specialized chartering for gasoline transport',
                'content' => 'Our gasoline tanker chartering services ensure safe and efficient transport of gasoline products with strict safety protocols and compliance standards.',
                'icon' => 'fas fa-gas-pump',
                'service_id' => $cppTankers->service_id,
                'parent_id' => $cppTankers->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            SubService::create([
                'name' => 'Diesel Tankers',
                'description' => 'Diesel fuel transport chartering services',
                'content' => 'Professional diesel tanker chartering with experienced crews and modern vessels equipped with advanced safety systems.',
                'icon' => 'fas fa-oil-can',
                'service_id' => $cppTankers->service_id,
                'parent_id' => $cppTankers->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }

        // Add sub-sub-services to DPP Tankers
        if ($dppTankers) {
            SubService::create([
                'name' => 'Crude Oil Tankers',
                'description' => 'Crude oil transport chartering',
                'content' => 'Specialized crude oil tanker chartering with vessels designed for optimal crude oil transport and handling.',
                'icon' => 'fas fa-oil-can',
                'service_id' => $dppTankers->service_id,
                'parent_id' => $dppTankers->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            SubService::create([
                'name' => 'Heavy Fuel Oil Tankers',
                'description' => 'Heavy fuel oil transport services',
                'content' => 'Professional heavy fuel oil tanker chartering with specialized vessels for high-viscosity fuel transport.',
                'icon' => 'fas fa-fire',
                'service_id' => $dppTankers->service_id,
                'parent_id' => $dppTankers->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }

        // Add sub-sub-services to Gas Carriers
        if ($gasCarriers) {
            SubService::create([
                'name' => 'LNG Carriers',
                'description' => 'Liquefied Natural Gas transport',
                'content' => 'Specialized LNG carrier chartering with state-of-the-art vessels designed for safe LNG transport at -162°C.',
                'icon' => 'fas fa-snowflake',
                'service_id' => $gasCarriers->service_id,
                'parent_id' => $gasCarriers->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            SubService::create([
                'name' => 'LPG Carriers',
                'description' => 'Liquefied Petroleum Gas transport',
                'content' => 'Professional LPG carrier chartering with vessels equipped for propane and butane transport.',
                'icon' => 'fas fa-fire',
                'service_id' => $gasCarriers->service_id,
                'parent_id' => $gasCarriers->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }

        // Add sub-sub-services to Newbuild Contracts
        if ($newbuildContracts) {
            SubService::create([
                'name' => 'Bulk Carrier Newbuilds',
                'description' => 'New bulk carrier construction contracts',
                'content' => 'Specialized newbuild contracts for bulk carriers with leading shipyards and advanced vessel designs.',
                'icon' => 'fas fa-ship',
                'service_id' => $newbuildContracts->service_id,
                'parent_id' => $newbuildContracts->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            SubService::create([
                'name' => 'Tanker Newbuilds',
                'description' => 'New tanker vessel construction',
                'content' => 'Professional tanker newbuild contracts with focus on safety, efficiency, and environmental compliance.',
                'icon' => 'fas fa-tanker',
                'service_id' => $newbuildContracts->service_id,
                'parent_id' => $newbuildContracts->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }

        // Add sub-sub-services to Condition Surveys
        if ($conditionSurveys) {
            SubService::create([
                'name' => 'Hull Surveys',
                'description' => 'Comprehensive hull condition assessments',
                'content' => 'Detailed hull surveys including thickness measurements, structural integrity assessment, and corrosion evaluation.',
                'icon' => 'fas fa-search',
                'service_id' => $conditionSurveys->service_id,
                'parent_id' => $conditionSurveys->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            SubService::create([
                'name' => 'Machinery Surveys',
                'description' => 'Engine and machinery condition evaluation',
                'content' => 'Professional machinery surveys including main engine, auxiliary engines, and all mechanical systems assessment.',
                'icon' => 'fas fa-cogs',
                'service_id' => $conditionSurveys->service_id,
                'parent_id' => $conditionSurveys->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }
    }
}
