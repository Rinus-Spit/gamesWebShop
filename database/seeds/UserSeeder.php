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
        DB::table('users')->insert([
            'name' => 'Donald Duck',
            'email' => 'donald.duck@disney.com',
            'password' => Hash::make('L8BetPbkgvEnY6g'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mickey Mouse',
            'email' => 'mickey.mouse@disney.com',
            'password' => Hash::make('X5c5TbhR9L339nb'),
        ]);
    }
}
