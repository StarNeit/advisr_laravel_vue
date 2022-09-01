<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            DB::table('contacts')->insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'phone' => '+44 1632 960802',
                'address' => Str::random(10),
                'user_id' => $user->id
            ]);
        }
    }
}
