<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Главная',
                'order' => '1',
            ]
        ];
        DB::table('pages')->insert($data);
    }
}
