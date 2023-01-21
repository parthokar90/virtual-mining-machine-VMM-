<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'role'=>'admin',
                'name'=>'Admin',
                'email'=>'admin@email.com',
                'password' => Hash::make(12345678),
            ],
            [
                'role'=>'user',
                'name'=>'User One',
                'email'=>'user_one@email.com',
                'password' => Hash::make(12345678),
            ],
            [
                'role'=>'user',
                'name'=>'User Two',
                'email'=>'user_two@email.com',
                'password' => Hash::make(12345678),
            ],
          
        ];

        foreach($data as $user){
            User::create($user);
        }
        
    }
}
