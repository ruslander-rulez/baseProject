<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("product")->insert([
            [
                "id" => 1,
                "title" => "Вакуумный экстендер Penismaster + Andropenis 3 в 1",
                "vendor_code" => "454",
                "thumbnail_id" => null,
                "category_id" => 1,
                "made_in" => "Сделано в Дании",
                "made_in_ico_id" => null,
                "locale" => "ru",
                "slug" => "peni-chrome",
                "seo_title" => "PENIMASTER CHROME",
                "seo_description" => "PENIMASTER CHROME",
                "seo_keywords" => "PENIMASTER CHROME",
                "description" => "PeniMaster является одним из лучших экстендеров ремешкового типа для увеличения пениса. Конструкция и материалы позволяют тренировать пенис в течение длительного времени, что повышает эффективность использования экстендера. Ношение экстендера PeniMaster вызывает рост тканей пениса и повышает сексуальную выносливость. Пенис становится длиннее, толще и прямее в расслабленном и возбужденном состоянии, эрекция длится дольше. Также, кратковременное использование в течение буквально 15-20 минут, позволяет вытянуть пенис до максимальной естественной длинны (например для посещения саун и т.д.).",
                "short_description" => "Сочетание самой удобной вакуумной системы от Penimaster и лучшего механического экстендера Andropenis",
                "created_at" => Carbon\Carbon::now(),
                "updated_at" => Carbon\Carbon::now(),
            ],
        ]);
    }
}
