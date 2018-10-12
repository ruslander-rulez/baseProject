<?php


namespace App\Application\Category;


use ItDevgroup\CommandBus\Command;

class CreateCategory implements Command
{
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $thumbnail_id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $seo_title;
    /**
     * @var string
     */
    private $seo_description;
    /**
     * @var string
     */
    private $seo_keywords;
    /**
     * @var string
     */
    private $locale;

    /**
     * UpdateCategory constructor.
     * @param string $description
     * @param int $thumbnail_id
     * @param string $title
     * @param string $slug
     * @param string $seo_title
     * @param string $seo_description
     * @param string $seo_keywords
     * @param string $locale
     */
    public function __construct(
        $description,
        $thumbnail_id,
        $title,
        $slug,
        $seo_title,
        $seo_description,
        $seo_keywords,
        $locale
    ) {
        $this->description = $description;
        $this->thumbnail_id = $thumbnail_id;
        $this->title = $title;
        $this->slug = $slug;
        $this->seo_title = $seo_title;
        $this->seo_description = $seo_description;
        $this->seo_keywords = $seo_keywords;
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function thumbnail_id()
    {
        return $this->thumbnail_id;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function slug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function seo_title()
    {
        return $this->seo_title;
    }

    /**
     * @return string
     */
    public function seo_description()
    {
        return $this->seo_description;
    }

    /**
     * @return string
     */
    public function seo_keywords()
    {
        return $this->seo_keywords;
    }

    /**
     * @return string
     */
    public function locale()
    {
        return $this->locale;
    }
}