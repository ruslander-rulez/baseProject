<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\AbstractController;
use Illuminate\Support\Facades\App;

class Controller extends AbstractController
{
    protected $locale;
    /**
     * Controller constructor.
     * @param \ItDevgroup\CommandBus\CommandBus $dispatcher
     */
    public function __construct(\ItDevgroup\CommandBus\CommandBus $dispatcher)
    {
        parent::__construct($dispatcher);
        $this->setCurrentLocale();
    }

    private function setCurrentLocale() {
        $host = explode(".", request()->getHttpHost());
        if (count($host) > 2){
            App::setLocale($host[0]);
        }
        $this->locale = $host[0];
    }
}