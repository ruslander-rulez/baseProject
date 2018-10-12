<?php

namespace App\Application\Advice;

use App\Domain\Advice\Advice;
use App\Domain\Advice\AdviceRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class CreateAdviceHandler implements Handler
{
    /**
     * @var AdviceRepository
     */
    private $adviceRepository;

    /**
     * UpdateAdviceHandler constructor.
     * @param AdviceRepository $adviceRepository
     */
    public function __construct(AdviceRepository $adviceRepository)
    {
        $this->adviceRepository = $adviceRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|CreateAdvice $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $advice = new Advice();

        $advice->locale = $command->locale();
        $advice->attachment_id = $command->attachment_id();
        $advice->is_publish = Advice::IS_PUBLISH_TRUE;
        if (!$command->is_publish()) {
            $advice->is_publish = Advice::IS_PUBLISH_FALSE;
        }
        $advice->seo_keywords = $command->seo_keywords();
        $advice->seo_description= $command->seo_description();
        $advice->seo_title = $command->seo_title();
        $advice->slug = $command->slug();
        $advice->title = $command->title();
        $advice->full_text = $command->full_text();
        $advice->short_text = $command->short_text();
        $advice->is_show_on_front = Advice::IS_SHOW_ON_FRONT_TRUE;
        if (!$command->is_show_on_front()) {
            $advice->is_publish = Advice::IS_SHOW_ON_FRONT_FALSE;
        }

        $this->adviceRepository->store($advice);
    }
}