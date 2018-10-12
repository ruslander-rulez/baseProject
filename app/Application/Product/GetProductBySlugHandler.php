<?php
namespace App\Application\Product;

use App\Domain\Product\ProductRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class GetProductBySlugHandler implements Handler
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * GetAdviceBySlugHandler constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetProductBySlug $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->productRepository->bySlug($command->slug());
    }
}