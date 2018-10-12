<?php


namespace App\Application\Category;

use ItDevgroup\CommandBus\Command;

class GetCategoryBySlug implements Command
{
    /**
     * @var string
     */
    private $slug;

    /**
     * @param $slug
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function slug()
    {
        return $this->slug;
    }
}