<?php

namespace App\Http\Controllers\Dashboard;

use App\Application\Advice\CreateAdvice;
use App\Application\Advice\DeleteAdvice;
use App\Application\Advice\GetAdviceList;
use App\Application\Advice\UpdateAdvice;
use App\Application\Product\GetProductList;
use App\Application\Product\UpdateProduct;
use App\Domain\Advice\Advice;
use App\Domain\Advice\AdviceFilter;
use App\Domain\Attachment\Attachment;
use App\Domain\Category\Category;
use App\Domain\Core\Pagination;
use App\Domain\Product\Product;
use App\Domain\Product\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        return view("dashboard.product.index");
    }
    public function list(Request $request)
    {
        $this->validate($request, [
            "perPage" => "numeric|min:1",
            "page" => "numeric|min:1"
        ]);

        $filter = new ProductFilter();

        $sort = null;

        $pagination = new Pagination($request->get("page"), $request->get("perPage"));

        $items = $this->dispatch(new GetProductList($filter, $pagination, $sort));

        return new Response($items["items"], Response::HTTP_OK, ["maxCountItems" => $items["total"]]);
    }
    /**
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        $this->validate( $request,  [
            "id" => "required|numeric|exists:" . Product::ENTITY_TABLE . ",id",
            "title" => "required|string|max:255",
            "vendor_code" => "required|string|max:255",
           // "show_on_front" => "numeric|in:0,1",
            "thumbnail_id" => "nullable|exists:" . Attachment::ENTITY_TABLE . ",id",
            "category_id" => "exists:" . Category::ENTITY_TABLE . ",id",
            "made_in" => "nullable|string",
            "made_in_ico_id" => "nullable|exists:" . Attachment::ENTITY_TABLE . ",id",
            "locale" => "required|string",
            "slug" => [
                "required",
                "string",
                "max:60",
                Rule::unique(Product::ENTITY_TABLE)->where(function ($query) use ($request) {
                    return $query->where('locale', $request->get("locale"));
                })
                    ->ignore($request->get('id'))],
            "seo_title" => "nullable|string|max:255",
            "seo_description" => "nullable|string|max:255",
            "seo_keywords" => "nullable|string|max:255",
            "description" => "nullable|string",
            "short_description" => "nullable|string",
            "gallery" => "array",
            "gallery.*.id" => [
                Rule::requiredIf(function () use ($request) {
                    return isset ($request->get("gallery")[0]);
                }),
                Rule::exists(Attachment::ENTITY_TABLE, "id")
            ]
        ]);
        $this->dispatch(new UpdateProduct(
            $request->get("id"),
            $request->get("title"),
            $request->get("vendor_code"),
            (bool) $request->get("show_on_front"),
            $request->get("thumbnail_id"),
            $request->get("category_id"),
            $request->get("made_in"),
            $request->get("made_in_ico_id"),
            $request->get("locale"),
            $request->get("slug"),
            $request->get("seo_title"),
            $request->get("seo_description"),
            $request->get("seo_keywords"),
            $request->get("description"),
            $request->get("short_description"),
            $request->get("gallery")
        ));
        return new Response([], Response::HTTP_ACCEPTED);
    }
    public function create(Request $request)
    {
        $this->validate( $request,  [
            "short_text" => "nullable|string",
            "full_text" => "nullable|string",
            "attachment_id" => "nullable|exists:" . Attachment::ENTITY_TABLE . ",id",
            "title" => "required|string|max:255",
            "slug" => [
                "required",
                "string",
                "max:60",
                Rule::unique(Advice::ENTITY_TABLE)->where(function ($query) use ($request) {
                    return $query->where('locale', $request->get("locale"));
                })],
            "seo_title" => "nullable|string|max:255",
            "seo_description" => "nullable|string|max:255",
            "seo_keywords" => "nullable|string|max:255",
            "is_publish" => [Rule::in([Advice::IS_PUBLISH_TRUE, Advice::IS_PUBLISH_FALSE])],
            "locale" => "required|string",
            "is_show_on_front" => [Rule::in([Advice::IS_SHOW_ON_FRONT_FALSE, Advice::IS_SHOW_ON_FRONT_TRUE])],
        ]);

         $this->dispatch(new CreateAdvice(
            $request->get("short_text"),
            $request->get("full_text"),
            $request->get("attachment_id"),
            $request->get("title"),
            $request->get("slug"),
            $request->get("seo_title"),
            $request->get("seo_description"),
            $request->get("seo_keywords"),
            $request->get("is_publish"),
            $request->get("locale"),
            $request->get("is_show_on_front")
        ));
         return Response::create("", Response::HTTP_CREATED);
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            "id" => "required|exists:". Advice::ENTITY_TABLE . ",id"
        ]);
        $this->dispatch(new DeleteAdvice($request->get("id")));
        return new Response([], Response::HTTP_ACCEPTED);
    }

}