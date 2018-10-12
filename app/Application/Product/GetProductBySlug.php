<?php

namespace App\Application\Product;

use ItDevgroup\CommandBus\Command;

class GetProductBySlug implements Command
{
    /**
     * @var string
     */
    private $slug;

    /**
     * GetProductBySlug constructor.
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