<?php

namespace App\Application\Category;

use App\Domain\Category\Category;
use App\Domain\Category\CategoryRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class UpdateCategoryHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * UpdateCategoryHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|UpdateCategory $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        /** @var Category $category */
        $category = $this->categoryRepository->byId($command->id());
        $category->title = $command->title();
        $category->description = $command->description();
        $category->slug = $command->slug();
        $category->locale = $command->locale();
        $category->seo_title = $command->seo_title();
        $category->seo_description = $command->seo_description();
        $category->seo_keywords = $command->seo_keywords();
        $category->thumbnail_id = $command->thumbnail_id();

        $this->categoryRepository->store($category);
    }
}
