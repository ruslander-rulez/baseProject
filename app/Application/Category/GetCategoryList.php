<?php

namespace App\Application\Category;

use App\Domain\Category\CategoryFilter;
use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use ItDevgroup\CommandBus\Command;

class GetCategoryList implements Command
{
    /**
     * @var Pagination
     */
    private $pagination;
    /**
     * @var CategoryFilter
     */
    private $filter;
    /**
     * @var Sort
     */
    private $sort;

    /**
     * GetAdviceList constructor.
     * @param CategoryFilter $filter
     * @param Pagination $pagination
     * @param Sort $sort
     */
    public function __construct(CategoryFilter $filter, ?Pagination $pagination, ?Sort $sort)
    {
        $this->pagination = $pagination;
        $this->filter = $filter;
        $this->sort = $sort;
    }

    /**
     * @return Pagination
     */
    public function pagination()
    {
        return $this->pagination;
    }

    /**
     * @return CategoryFilter
     */
    public function filter()
    {
        return $this->filter;
    }

    /**
     * @return Sort
     */
    public function sort()
    {
        return $this->sort;
    }
}