<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Vincent',
            'email'             => 'vincent@gmail.com',
            'password'          => Hash::make('qqqqqq'),
            'photo_profile'     => 'foto',
            'role_id'           => Role::where('name','admin')->value('id')
        ]);
    }
}
