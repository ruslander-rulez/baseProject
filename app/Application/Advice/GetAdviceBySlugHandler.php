<?php
namespace App\Application\Advice;

use App\Domain\Advice\AdviceRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class GetAdviceBySlugHandler implements Handler
{
    /**
     * @var AdviceRepository
     */
    private $adviceRepository;

    /**
     * GetAdviceBySlugHandler constructor.
     * @param AdviceRepository $adviceRepository
     */
    public function __construct(AdviceRepository $adviceRepository)
    {
        $this->adviceRepository = $adviceRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetAdviceBySlug $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->adviceRepository->bySlug($command->slug());
    }
}