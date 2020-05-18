<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::updateOrCreate(
            [
                'name' => 'SiteEnable'
            ],
            [
                'value' => '1'
            ]
        );
    }
}
