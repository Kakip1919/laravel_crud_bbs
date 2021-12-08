<?php

use Illuminate\Database\Seeder;

class MenberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("menbers")->insert(
            [
                [
            "name" => "山田",
            "telephone" => "xxxx-xxxxx",
            "created_at" => now(),
            "updated_at" => now(),
                    ],
                ]
        );
    }
}
