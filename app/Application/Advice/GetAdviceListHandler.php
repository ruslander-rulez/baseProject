<?php

namespace App\Application\Advice;

use App\Domain\Advice\AdviceRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class GetAdviceListHandler implements Handler
{
    /**
     * @var AdviceRepository
     */
    private $adviceRepository;

    /**
     * GetAdviceListHandler constructor.
     * @param AdviceRepository $adviceRepository
     */
    public function __construct(AdviceRepository $adviceRepository)
    {
        $this->adviceRepository = $adviceRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|GetAdviceList $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->adviceRepository->all($command->filter() ,$command->pagination(), $command->sort());
    }
}