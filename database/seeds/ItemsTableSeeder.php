<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Product 001', 'amount' => 2],
            ['name' => 'Product 002', 'amount' => 7],
            ['name' => 'Product 005', 'amount' => 0],
            ['name' => 'Product 007', 'amount' => 6],
            ['name' => 'Product 008', 'amount' => 0],
            ['name' => 'Product 010', 'amount' => 4],
            ['name' => 'Product 015', 'amount' => 5],
        ];

        foreach ($items as $item) {
            DB::table('items')->insert($item);
        }
    }
}
