<?php

namespace App\Http\Controllers\Web;

use App\Application\Category\GetCategoryList;
use App\Application\Product\GetProductBySlug;
use App\Domain\Category\CategoryFilter;

class ProductController extends Controller
{
    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bySlug($slug) {

        $categoryFilter = new CategoryFilter();
        $categoryFilter->setLocale($this->locale);
        $categories = $this->dispatch(new GetCategoryList($categoryFilter, null, null));

        $product = $this->dispatch(new GetProductBySlug($slug));

        return view("web.layout.product", compact("product", "categories"));
    }
}