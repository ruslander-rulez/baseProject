<?php
namespace App\Domain\Advice;

use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use Illuminate\Database\Eloquent\Model;

interface AdviceRepository
{

    /**
     * @param AdviceFilter $adviceFilter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Advice[]
     */
    public function all(AdviceFilter $adviceFilter, ?Pagination $pagination = null, ?Sort $sort = null);

    /**
     * @param int $id
     *
     * @return Advice|null
     */
    public function byId($id);

    /**
     * @param $slug
     * @return Advice|null
     */
    public function bySlug($slug);

    /**
     * @param Model $advice
     */
    public function store(Model $advice);

    /**
     * @param Model $advice
     */
    public function delete(Model $advice);
}