<?php

namespace App\Application\Attachment;

use App\Domain\Attachment\Attachment;
use App\Domain\Attachment\AttachmentRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ItDevgroup\CommandBus\Command;
use ItDevgroup\CommandBus\Handler;

class RegisterNewAttachmentHandler implements Handler
{
    /**
     * @var AttachmentRepository
     */
    private $attachmentRepository;

    /**
     * RegisterNewAttachmentHandler constructor.
     * @param AttachmentRepository $attachmentRepository
     */
    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    /**
     * Handle a Command object
     *
     * @param Command|RegisterNewAttachment $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        $filename = (string) Str::uuid() . "." . $command->file()->extension();
        $path = $command->file()->storeAs("public/uploads", $filename);
        $attachment = new Attachment();
        $attachment->path =  Storage::url($path);
        $this->attachmentRepository->store($attachment);
        return $attachment;
    }
}