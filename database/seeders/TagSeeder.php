<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory('20')->create();
        for($i=0; $i<100; $i ++){
            try{
                DB::table('post_tag')->insert(
                    [
                        'post_id' => rand(1,30),
                        'tag_id' => rand(1,20)
                    ]
                );
            }catch(UniqueConstraintViolationException $e){
                Log::info($e->getMessage());
                continue;
            }
        }
    }
}
