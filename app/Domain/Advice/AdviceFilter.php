<?php
namespace App\Domain\Advice;

class AdviceFilter
{
    /**
     * @var int
     */
    private $locale;

    /**
     * @var int
     */
    private $showOnFrontPage;

    /**
     * @var int
     */
    private $isPublish;

    /**
     * @return int
     */
    public function locale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return int
     */
    public function showOnFrontPage()
    {
        return $this->showOnFrontPage;
    }

    /**
     * @param int $showOnFrontPage
     */
    public function setShowOnFrontPage(int $showOnFrontPage): void
    {
        $this->showOnFrontPage = $showOnFrontPage;
    }

    /**
     * @return int
     */
    public function isPublish()
    {
        return $this->isPublish;
    }

    /**
     * @param int $isPublish
     */
    public function setIsPublish(int $isPublish): void
    {
        $this->isPublish = $isPublish;
    }

}
