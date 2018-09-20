<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\AbstractController;

class Controller extends AbstractController
{
    /**
     * Controller constructor.
     * @param \ItDevgroup\CommandBus\CommandBus $dispatcher
     */
    public function __construct(\ItDevgroup\CommandBus\CommandBus $dispatcher)
    {
        parent::__construct($dispatcher);
    }
}