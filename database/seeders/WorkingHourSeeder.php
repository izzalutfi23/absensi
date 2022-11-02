<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Config;

class WorkingHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rule = [
            'in' => '07:00',
            'out' => '15:00'
        ];

        Config::create([
            'name' => 'time',
            'rule' => json_encode($rule)
        ]);
    }
}
