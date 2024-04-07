<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<100; $i ++){
            try{
                DB::table('subscriptions')->insert(
                    [
                        'author_id' => rand(1,11),
                        'reader_id' => rand(1,11)
                    ]
                );
            }catch(UniqueConstraintViolationException $e){
                Log::info($e->getMessage());
                continue;
            }
        }
        //
    }
}
