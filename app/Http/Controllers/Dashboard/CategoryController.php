<?php

namespace App\Http\Controllers\Dashboard;

use App\Application\Category\CreateCategory;
use App\Application\Category\DeleteCategory;
use App\Application\Category\GetCategoryList;
use App\Application\Category\UpdateCategory;
use App\Domain\Attachment\Attachment;
use App\Domain\Category\Category;
use App\Domain\Category\CategoryFilter;
use App\Domain\Core\Pagination;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view("dashboard.category.index");
    }
    public function list(Request $request)
    {
        $this->validate($request, [
            "perPage" => "numeric|min:1",
            "page" => "numeric|min:1"
        ]);

        $filter = new CategoryFilter();

        $sort = null;
        $pagination = null;
        if ($request->get("perPage")) {
            $pagination = new Pagination($request->get("page"), $request->get("perPage"));
        }

        $items = $this->dispatch(new GetCategoryList($filter, $pagination, $sort));

        return new Response(
            isset($items["items"]) ? $items["items"] : $items,
            Response::HTTP_OK,
            isset($items["total"]) ? ["maxCountItems" => $items["total"]] : []
        );
    }
    /**
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        $this->validate( $request,  [
            "id" => "required|numeric|exists:" . Category::ENTITY_TABLE . ",id",
            "description" => "nullable|string",
            "thumbnail_id" => "nullable|exists:" . Attachment::ENTITY_TABLE . ",id",
            "title" => "required|string|max:255",
            "slug" => [
                "required",
                "string",
                "max:60",
                Rule::unique(Category::ENTITY_TABLE)->where(function ($query) use ($request) {
                    return $query->where('locale', $request->get("locale"));
                })
                    ->ignore($request->get('id'))],
            "seo_title" => "nullable|string|max:255",
            "seo_description" => "nullable|string|max:255",
            "seo_keywords" => "nullable|string|max:255",
            "locale" => "required|string",
        ]);
        $this->dispatch(new UpdateCategory(
            $request->get("id"),
            $request->get("description"),
            $request->get("thumbnail_id"),
            $request->get("title"),
            $request->get("slug"),
            $request->get("seo_title"),
            $request->get("seo_description"),
            $request->get("seo_keywords"),
            $request->get("locale")
        ));
        return new Response([], Response::HTTP_ACCEPTED);
    }

    /**
     * @param Request $request
     * @return Response|mixed
     */
    public function create(Request $request)
    {
        $this->validate( $request,  [
            "description" => "nullable|string",
            "thumbnail_id" => "nullable|exists:" . Attachment::ENTITY_TABLE . ",id",
            "title" => "required|string|max:255",
            "slug" => [
                "required",
                "string",
                "max:60",
                Rule::unique(Category::ENTITY_TABLE)->where(function ($query) use ($request) {
                    return $query->where('locale', $request->get("locale"));
                })
                    ->ignore($request->get('id'))],
            "seo_title" => "nullable|string|max:255",
            "seo_description" => "nullable|string|max:255",
            "seo_keywords" => "nullable|string|max:255",
            "locale" => "required|string",
        ]);
        $this->dispatch(new CreateCategory(
            $request->get("description"),
            $request->get("thumbnail_id"),
            $request->get("title"),
            $request->get("slug"),
            $request->get("seo_title"),
            $request->get("seo_description"),
            $request->get("seo_keywords"),
            $request->get("locale")
        ));
        return new Response([], Response::HTTP_CREATED);
    }
    public function delete(Request $request)
    {
        $this->validate($request, [
            "id" => "required|exists:". Category::ENTITY_TABLE . ",id"
        ]);
        $this->dispatch(new DeleteCategory($request->get("id")));
        return new Response([], Response::HTTP_ACCEPTED);
    }

}