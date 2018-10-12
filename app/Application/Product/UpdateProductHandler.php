<?php


namespace App\Application\Product;


use App\Domain\Product\ProductRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class UpdateProductHandler implements Handler
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * UpdateProductHandler constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|UpdateProduct $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $product = $this->productRepository->byId($command->id());

        $product->title = $command->title();
        $product->vendor_code = $command->vendor_code();
        $product->show_on_front = $command->show_on_front();
        $product->thumbnail_id = $command->thumbnail_id();
        if ($command->category_id()) {
            $product->category_id = $command->category_id();
        }
        $product->made_in = $command->made_in();
        $product->made_in_ico_id = $command->made_in_ico_id();
        $product->slug = $command->slug();
        $product->seo_title = $command->seo_title();
        $product->seo_description = $command->seo_description();
        $product->seo_keywords = $command->seo_keywords();
        $product->description = $command->description();
        $product->short_description = $command->short_description();
        $product->locale = $command->locale();

        $this->productRepository->store($product);

        $gallery = collect($command->gallery())->pluck("id");
        $this->productRepository->syncGallery($product, $gallery);
    }
}