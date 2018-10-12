<?php
namespace App\Infrastructure\Eloquent;

use App\Domain\Category\Category;
use App\Domain\Category\CategoryRepository;
use App\Domain\Category\CategoryFilter;
use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;

class CategoryRepositoryEloquent implements CategoryRepository
{
    use Helper;

    /**
     * @var Category
     */
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * @param CategoryFilter $filter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Category[]
     */
    public function all(CategoryFilter $filter, ?Pagination $pagination = null, ?Sort $sort = null)
    {

        if ($pagination) {
            $items =  $this->model->forPage($pagination->page(), $pagination->peerPage())->with("thumbnail")->get();
            $maxItems =  $this->model->count();
            return [
                "items" => $items,
                "total" => $maxItems
            ];
        }
        return $this->model->all();
    }

    /**
     * @param $slug
     * @return Category|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function bySlug($slug)
    {
        $qb = $this->model->newModelQuery();
        return $qb->where("slug", $slug)
            ->firstOrFail();
    }
}