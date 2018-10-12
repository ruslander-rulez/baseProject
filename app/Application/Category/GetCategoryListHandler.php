<?php

namespace App\Application\Category;

use App\Domain\Category\CategoryRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class GetCategoryListHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * GetAdviceListHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetCategoryList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->categoryRepository->all($command->filter() ,$command->pagination(), $command->sort());
    }
}