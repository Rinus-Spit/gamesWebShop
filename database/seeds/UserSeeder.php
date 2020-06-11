<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rinus Spit',
            'email' => 'rinus.spit@home.nl',
            'password' => Hash::make('X5c5TbhR9L339nb'),
        ]);
        $users = factory(App\User::class, 50)->create();
    }
}
