<?php

namespace App\Application\Attachment;

use Illuminate\Http\UploadedFile;
use ItDevgroup\CommandBus\Command;

class RegisterNewAttachment implements Command
{
    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * RegisterNewAttachment constructor.
     * @param UploadedFile $file
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return UploadedFile
     */
    public function file()
    {
        return $this->file;
    }
}