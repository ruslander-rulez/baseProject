<?php

namespace App\Http\Controllers\Web;

use App\Application\Advice\GetAdviceBySlug;
use App\Application\Advice\GetAdviceList;
use App\Domain\Advice\Advice;
use App\Domain\Advice\AdviceFilter;
use Illuminate\Http\Request;

class AdviceController extends Controller
{
    public function list(Request $request) {

        $filter = new AdviceFilter();
        $filter->setLocale($this->locale);
        $filter->setIsPublish(Advice::IS_PUBLISH_TRUE);
        $advices = $this->dispatch(new GetAdviceList($filter, null, null));

        return view("web.{$this->locale}.articles", compact("advices"));
    }

    public function bySlug($slug) {

        $advice = $this->dispatch(new GetAdviceBySlug($slug));

        return view("web.layout.article", compact("advice"));
    }
}