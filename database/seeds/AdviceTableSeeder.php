<?php

use Illuminate\Database\Seeder;

class AdviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("advice")->insert([
            [
                "id" => 1,
                "created_at" => Carbon\Carbon::now(),
                "updated_at" => Carbon\Carbon::now(),
                "attachment_id" => null,
                "slug" => "advice1",
                "full_text" => "<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequuntur in, ipsam magnam natus quisquam
    reprehenderit sequi ullam. Necessitatibus quos ratione sed sit veritatis! Commodi cumque dolorum inventore
    perferendis quaerat.
</div>
<div>At consequatur debitis dignissimos dolor enim mollitia necessitatibus, neque, officiis perferendis praesentium quas
    quisquam saepe totam, vel vero. Alias aspernatur dolorem illum inventore maiores officia quae quis reiciendis sint
    voluptatibus.
</div>
<div>Aliquam aperiam dignissimos, dolore fugit hic minima nemo repudiandae sequi temporibus ullam? Dolorum ducimus illum
    iste neque obcaecati? Asperiores assumenda aut dolores exercitationem hic illo impedit porro quisquam rerum
    suscipit.
</div>
<div>Adipisci, aspernatur corporis deleniti dicta distinctio dolor eaque eos explicabo hic incidunt iste iure natus
    nihil nisi officia placeat porro possimus provident quam quas qui quis quo recusandae sint vel?
</div>
<div>Aliquid architecto, assumenda blanditiis ducimus facere laborum odit quidem temporibus ut. Aliquam, aperiam,
    asperiores consequatur cumque ducimus eaque expedita explicabo facilis ipsa perspiciatis porro quod reiciendis
    sapiente sunt voluptatem voluptatum.
</div>",
                "title" => "КАК ПРАВИЛЬНО НОСИТЬ ЭКСТЕНДЕР",
                "is_publish" => \App\Domain\Advice\Advice::IS_PUBLISH_TRUE,
                "is_show_on_front" => \App\Domain\Advice\Advice::IS_SHOW_ON_FRONT_FALSE,
                "locale" => "ru",
                "seo_title" => "",
                "seo_description" => "",
                "seo_keywords" => ""
            ],
        ]);
    }
}
