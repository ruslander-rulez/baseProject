<?php

use Illuminate\Database\Seeder;

class AttachmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("attachment")->insert([
            [
                "id" => 1,
                "created_at" => Carbon\Carbon::now();
                "updated_at" => Carbon\Carbon::now();
            ],
        ]);
    }
}
