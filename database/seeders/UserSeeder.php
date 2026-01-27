<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'mohanad',
            'title' => 'ndksnk',
            'avatar' => '',
            'email' => 'mo@g.com',
            'phone' => '0123456789',
            'password' => '12345678',
            'birthday' => '30-9-2004',
            'location' => 'cairo',
            'about' => 'ndknaskndksa',
            'map_embed' => 'ksjandksna',
            'social_links' => [],
            'email_contact' => 'mohandahmed015529.222.00@gmail.com',
        ]);
    }
}
