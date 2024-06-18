<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Status::exists()) {
            Status::create([
                'name' => 'AT_VENDOR'
            ]);

            Status::create([
                'name' => 'PICKED'
            ]);

            Status::create([
                'name' => 'DELIVERED'
            ]);

            Status::create([
                'name' => 'ASSIGNED'
            ]);
        }
    }
}
