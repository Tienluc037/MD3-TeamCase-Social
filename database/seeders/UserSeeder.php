<?php

namespace Database\Seeders;

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
        $user = new User();
        $user->name = "Admin";
        $user->email = "Admin@mail.com";
        $user->password = Hash::make(123123);
        $user->address = "Hà nội";
        $user->role_id = 1;
        $user->save();
    }
}
