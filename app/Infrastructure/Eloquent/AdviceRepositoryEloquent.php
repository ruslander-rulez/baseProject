<?php
namespace App\Infrastructure\Eloquent;

use App\Domain\Advice\Advice;
use App\Domain\Advice\AdviceFilter;
use App\Domain\Advice\AdviceRepository;
use App\Domain\Core\Pagination;
use App\Domain\Core\Sort;
use Illuminate\Database\Query\Builder;

class AdviceRepositoryEloquent implements AdviceRepository
{
    use Helper;

    /**
     * @var Advice
     */
    private $model;

    public function __construct(Advice $model)
    {
        $this->model = $model;
    }

    /**
     * @param AdviceFilter $adviceFilter
     * @param Pagination|null $pagination
     * @param Sort|null $sort
     * @return Advice[]
     */
    public function all(AdviceFilter $adviceFilter, ?Pagination $pagination = null, ?Sort $sort = null)
    {
        $qb =  $this->model->newModelQuery();
            $qb->where(function ($query) use ($adviceFilter) {
            if ($adviceFilter->showOnFrontPage()) {
                $query->where("is_show_on_front", "=", $adviceFilter->showOnFrontPage());
            }
            if ($adviceFilter->isPublish()) {
                $query->where("is_publish", "=", $adviceFilter->isPublish());
            }
            if ($adviceFilter->locale()) {
                $query->where("locale", "=", $adviceFilter->locale());
            }
        });
            $qb->with("attachment");
        if ($pagination) {
            $maxItems =  $qb->count();
            $advices = $qb
                ->forPage($pagination->page(), $pagination->peerPage())
                ->get();

            return [
                "items" => $advices,
                "total" => $maxItems
            ];
        }
        $advices = $qb->get();


        return $advices;
    }

    /**
     * @param $slug
     * @return Advice|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function bySlug($slug)
    {
        $qb = $this->model->newModelQuery();
       return $qb->where("slug", $slug)
            ->where("is_publish", Advice::IS_PUBLISH_TRUE)
            ->firstOrFail();
    }
}