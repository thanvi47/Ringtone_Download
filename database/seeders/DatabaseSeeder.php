<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(1)->create(
//             [
//                'name'=>'sadi',
//                'email'=>'sadi@gmail.com',
////                'email_verified_at'=>now(),
////                'user_type'=>'admin',
//                'password'=>bcrypt('a'), // password is 'password'
//                'remember_token'=>Str::random(10),
//
//
//             ]
//        );
        $user =new User();
        $user->name = 'sadi';
        $user->email = 'sadi@gmail.com';
        $user->email_verified_at = now();
        $user->password= bcrypt('a');
         $user->remember_token = Str::random(10);
        $user->save();


        Category::create(['name'=>'Classical',]);
        Category::create(['name'=>'Animals',]);
        Category::create(['name'=>'Funny',]);
        Category::create(['name'=>'SMS',]);
        Category::create(['name'=>'Alarms',]);
        Category::create(['name'=>'Children',]);
        Category::create(['name'=>'Standard',]);
        Category::create(['name'=>'Music',]);
        Category::create(['name'=>'Holiday',]);
        Category::create(['name'=>'Nature',]);

    }

}
