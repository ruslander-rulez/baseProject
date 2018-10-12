<?php

namespace App\Http\Controllers\Web;

use App\Application\Advice\GetAdviceList;
use App\Application\Category\GetCategoryList;
use App\Application\Product\GetProductList;
use App\Domain\Advice\Advice;
use App\Domain\Advice\AdviceFilter;
use App\Domain\Category\CategoryFilter;
use App\Domain\Product\ProductFilter;
use InvalidArgumentException;

class PageController extends Controller
{

    public function index()
    {
        $adviceFilter = new AdviceFilter();
        $adviceFilter->setLocale($this->locale);
        $adviceFilter->setShowOnFrontPage(Advice::IS_SHOW_ON_FRONT_TRUE);
        $adviceFilter->setIsPublish(Advice::IS_PUBLISH_TRUE);
        $advices = $this->dispatch(new GetAdviceList($adviceFilter, null, null));


        $categoryFilter = new CategoryFilter();
        $categoryFilter->setLocale($this->locale);
        $categories = $this->dispatch(new GetCategoryList($categoryFilter, null, null));

        $productFilter = new ProductFilter();
        $productFilter->setShowOnFront(true);
        $productFilter->setLocale($this->locale);
        $products = $this->dispatch(new GetProductList($productFilter, null, null));


        return view("web." . $this->locale. ".index", compact("advices", "categories", "products"));
    }
    public function page($page)
    {
        try {
            return view("web." . $this->locale. ".$page");
        } catch (InvalidArgumentException $exception) {
            abort(404);
        }
    }
}