<?php

namespace App\Http\Controllers\Web;

use App\Application\Advice\GetAdviceBySlug;
use App\Application\Advice\GetAdviceList;
use App\Application\Category\GetCategoryBySlug;
use App\Application\Product\GetProductList;
use App\Domain\Advice\Advice;
use App\Domain\Advice\AdviceFilter;
use App\Domain\Product\ProductFilter;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function bySlug($slug) {

        $category = $this->dispatch(new GetCategoryBySlug($slug));

        $productFilter = new ProductFilter();
        $productFilter->setLocale($this->locale);
        $productFilter->setCategoryId($category->id);

        $products = collect($this->dispatch(new GetProductList($productFilter, null, null)));
        return view("web.layout.category", compact("category", "products"));
    }
}