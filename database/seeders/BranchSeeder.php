<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BranchType;
use App\Models\Region;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Main Warehouse', 'description' => 'Central storage facility'],
            ['name' => 'Distribution Center', 'description' => 'Regional distribution hub'],
            ['name' => 'Transit Hub', 'description' => 'Cross-docking facility'],
            ['name' => 'Delivery Station', 'description' => 'Last-mile delivery center'],
            ['name' => 'Office', 'description' => 'Administrative office'],
        ];

        foreach ($types as $type) {
            BranchType::firstOrCreate(['name' => $type['name']], $type);
        }

        $regions = [
            ['name' => 'North Zone', 'code' => 'NZ'],
            ['name' => 'South Zone', 'code' => 'SZ'],
            ['name' => 'East Zone', 'code' => 'EZ'],
            ['name' => 'West Zone', 'code' => 'WZ'],
            ['name' => 'Central Zone', 'code' => 'CZ'],
        ];

        foreach ($regions as $region) {
            Region::firstOrCreate(['name' => $region['name']], $region);
        }
    }
}
