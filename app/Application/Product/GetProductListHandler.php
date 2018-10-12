<?php

namespace App\Application\Product;

use App\Domain\Product\ProductRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class GetProductListHandler implements Handler
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetProductList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->productRepository->all($command->filter() ,$command->pagination(), $command->sort());
    }
}