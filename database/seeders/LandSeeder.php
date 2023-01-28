<?php

namespace Database\Seeders;

use App\Models\Land;
use App\Models\landDirection;
use App\Models\Landscape;
use App\Models\LandSiteDescription;
use Illuminate\Database\Seeder;

class LandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        landscape::create(['name'=>'ب/3312 مخطط 2']);
        landscape::create(['name'=>'ج|7842 مخطط أ']);
        landDirection::create(['name'=>'جنوبي 12 وشمالي 22']);
        landDirection::create(['name'=>'15 غربي 8 شمالي']);
        LandSiteDescription::create(['name' => 'على شارع عام']);
        LandSiteDescription::create( ['name' => "على زاوية"]);

        Land::factory(16)->create();
    }
}
