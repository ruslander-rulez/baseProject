<?php
namespace App\Domain\Product;

class ProductFilter
{
    /**
     * @var boolean
     */
    private $showOnFront;

    private $categoryId;

    /**
     * @var string
     */
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

    /**
     * @return mixed
     */
    public function showOnFront()
    {
        return $this->showOnFront;
    }

    /**
     * @param mixed $showOnFront
     */
    public function setShowOnFront($showOnFront): void
    {
        $this->showOnFront = $showOnFront;
    }

    /**
     * @return mixed
     */
    public function categoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }
}
