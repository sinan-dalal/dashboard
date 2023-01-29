<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'full_name' => 'معتصم الهمداني',
            'phone_number' => '5555555555',
            'email' => 'mutasim@hamdani.com',
            'email_verified_at' => now(),
        ]);
    }
}
