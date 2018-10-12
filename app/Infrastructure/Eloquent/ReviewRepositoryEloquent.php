<?php
namespace App\Infrastructure\Eloquent;

use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use App\Domain\Product\ReviewRepository;
use App\Domain\Review\Review;
use App\Domain\Review\ReviewFilter;

class ReviewRepositoryEloquent implements ReviewRepository
{
    use Helper;

    /**
     * @var Review
     */
    private $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    /**
     * @param ReviewFilter $filter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Review[]
     */
    public function all(ReviewFilter $filter, ?Pagination $pagination = null, ?Sort $sort = null)
    {
        $qb =  $this->model->newModelQuery();
        $qb->with(["attachment"]);


        if ($pagination) {
            $items =  $qb->forPage($pagination->page(), $pagination->peerPage())->get();
            $maxItems =  $qb->count();
            return [
                "items" => $items,
                "total" => $maxItems
            ];
        }
        return $qb->get()->all();
    }
}