<?php

namespace App\Application\Advice;

use App\Domain\Advice\AdviceFilter;
use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use ItDevgroup\CommandBus\Command;

class GetAdviceList implements Command
{
    /**
     * @var Pagination
     */
    private $pagination;
    /**
     * @var AdviceFilter
     */
    private $filter;
    /**
     * @var Sort
     */
    private $sort;

    /**
     * GetAdviceList constructor.
     * @param AdviceFilter $filter
     * @param Pagination $pagination
     * @param Sort $sort
     */
    public function __construct(AdviceFilter $filter, ?Pagination $pagination, ?Sort $sort)
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
     * @return AdviceFilter
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