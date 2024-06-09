<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Andry',
            'email' => 'andrymark00@gmail.com',
            'password' => 'andry1992',
            'role' => UserRoleEnum::ADMIN->value
        ]);

        User::query()->create([
            'name' => 'Andry',
            'email' => 'user@gmail.com',
            'password' => 'andry1992',
            'role' => UserRoleEnum::USER->value
        ]);


        User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            SubscriptionSeeder::class
        ]);
    }
}
