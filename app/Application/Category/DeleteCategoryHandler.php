<?php
namespace App\Application\Category;

use App\Domain\Advice\AdviceRepository;
use App\Domain\Category\CategoryRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class DeleteCategoryHandler implements Handler
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * DeleteAdviceHandler constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|DeleteAdvice $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $category = $this->categoryRepository->byId($command->id());
        $this->categoryRepository->delete($category);
    }
}