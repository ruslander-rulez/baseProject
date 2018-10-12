<?php
namespace App\Domain\Category;

use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use Illuminate\Database\Eloquent\Model;

interface CategoryRepository
{
    /**
     * @param CategoryFilter $filter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Category[]
     */
    public function all(CategoryFilter $filter, ?Pagination $pagination = null, ?Sort $sort = null);


    /**
     * @param int $id
     *
     * @return Category|null
     */
    public function byId($id);

    /**
     * @param Model $category
     */
    public function store(Model $category);

    /**
     * @param Model $category
     */
    public function delete(Model $category);

    /**
     * @param $slug
     * @return Category
     */
    public function bySlug($slug);
}