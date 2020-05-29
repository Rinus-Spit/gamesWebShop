<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'wargame',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'cardgame',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'boardgame',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'mind sport',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'strategy game',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'computergame',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'dicegame',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
