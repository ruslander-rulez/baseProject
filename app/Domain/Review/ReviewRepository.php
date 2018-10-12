<?php
namespace App\Domain\Product;

use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use App\Domain\Review\ReviewFilter;
use Illuminate\Database\Eloquent\Model;

interface ReviewRepository
{
    /**
     * @param ReviewFilter $filter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Product[]
     */
    public function all(ReviewFilter $filter, ?Pagination $pagination = null, ?Sort $sort = null);


    /**
     * @param int $id
     *
     * @return Product|null
     */
    public function byId($id);

    /**
     * @param Model $product
     */
    public function store(Model $product);

    /**
     * @param Model $product
     */
    public function delete(Model $product);

}