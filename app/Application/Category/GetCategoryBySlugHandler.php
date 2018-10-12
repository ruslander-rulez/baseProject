<?php
namespace App\Application\Category;

use App\Domain\Category\CategoryRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class GetCategoryBySlugHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetCategoryBySlug $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->categoryRepository->bySlug($command->slug());
    }
}