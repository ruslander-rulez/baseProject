<?php

namespace App\Application\Category;

use ItDevgroup\CommandBus\Command;

class DeleteCategory implements Command
{
    private $id;

    /**
     * @param $id
     */
    public function __construct($id)
    {

        $this->id = $id;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }
}