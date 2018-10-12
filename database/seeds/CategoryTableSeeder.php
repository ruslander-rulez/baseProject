<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("category")->insert([
            [
                "id" => 1,
                "title" => "Экстендеры",
                "description" => "",
                "seo_title" => "",
                "seo_description" => "",
                "seo_keywords" => "",
                "locale" => "ru",
                "slug" => "extendery",
                "created_at" => Carbon\Carbon::now(),
                "updated_at" => Carbon\Carbon::now(),
            ],
            [
                "id" => 2,
                "title" => "Вакуумные Помпы",
                "description" => "",
                "seo_title" => "",
                "seo_description" => "",
                "seo_keywords" => "",
                "locale" => "ru",
                "slug" => "vakumnie-pompi",
                "created_at" => Carbon\Carbon::now(),
                "updated_at" => Carbon\Carbon::now(),
            ],
            [
                "id" => 3,
                "title" => "Другие товары",
                "description" => "",
                "seo_title" => "",
                "seo_description" => "",
                "seo_keywords" => "",
                "locale" => "ru",
                "slug" => "drugie-tovary",
                "created_at" => Carbon\Carbon::now(),
                "updated_at" => Carbon\Carbon::now(),
            ],
        ]);
    }
}
