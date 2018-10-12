<?php
namespace App\Application\Advice;

use App\Domain\Advice\AdviceRepository;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class DeleteAdviceHandler implements Handler
{
    /**
     * @var AdviceRepository
     */
    private $adviceRepository;

    /**
     * DeleteAdviceHandler constructor.
     * @param AdviceRepository $adviceRepository
     */
    public function __construct(AdviceRepository $adviceRepository)
    {
        $this->adviceRepository = $adviceRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|DeleteAdvice $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $advice = $this->adviceRepository->byId($command->id());
        $this->adviceRepository->delete($advice);
    }
}