<?php
namespace App\Domain\Product;

use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use Illuminate\Database\Eloquent\Model;

interface ProductRepository
{
    /**
     * @param ProductFilter $filter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Product[]
     */
    public function all(ProductFilter $filter, ?Pagination $pagination = null, ?Sort $sort = null);


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

    /**
     * @param Product $product
     * @param $gallery
     * @return array
     */
    public function syncGallery(Product $product, $gallery);

    /**
     * @param $slug
     * @return Product
     */
    public function bySlug($slug);
}