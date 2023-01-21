<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\admin\UserDetails;

class userDetailsTableSeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();

        foreach($users as $user){
            $data=[
                    'user_id'=>$user->id,
                    'taka'=>3000,
                    'coin'=>0,
            ];

            UserDetails::create($data);
        }
    }
}
