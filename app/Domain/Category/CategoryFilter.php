<?php
namespace App\Domain\Category;

class CategoryFilter
{
    private $locale;

    /**
     * @return mixed
     */
    public function locale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale): void
    {
        $this->locale = $locale;
    }
}
