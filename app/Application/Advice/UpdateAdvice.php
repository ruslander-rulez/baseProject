<?php

namespace App\Application\Advice;

use ItDevgroup\CommandBus\Command;

class UpdateAdvice implements Command
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $short_text;
    /**
     * @var string
     */
    private $full_text;
    /**
     * @var int
     */
    private $attachment_id;
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
    private $is_publish;
    /**
     * @var string
     */
    private $locale;
    /**
     * @var int
     */
    private $is_show_on_front;

    /**
     * UpdateAdvice constructor.
     * @param int $id
     * @param string $short_text
     * @param string $full_text
     * @param int $attachment_id
     * @param string $title
     * @param string $slug
     * @param string $seo_title
     * @param string $seo_description
     * @param string $seo_keywords
     * @param string $is_publish
     * @param string $locale
     * @param $is_show_on_front
     */
    public function __construct(
        $id,
        $short_text,
        $full_text,
        $attachment_id,
        $title,
        $slug,
        $seo_title,
        $seo_description,
        $seo_keywords,
        $is_publish,
        $locale,
        $is_show_on_front
    ) {
        $this->id = $id;
        $this->short_text = $short_text;
        $this->full_text = $full_text;
        $this->attachment_id = $attachment_id;
        $this->title = $title;
        $this->slug = $slug;
        $this->seo_title = $seo_title;
        $this->seo_description = $seo_description;
        $this->seo_keywords = $seo_keywords;
        $this->is_publish = $is_publish;
        $this->locale = $locale;
        $this->is_show_on_front = $is_show_on_front;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function short_text()
    {
        return $this->short_text;
    }

    /**
     * @return string
     */
    public function full_text()
    {
        return $this->full_text;
    }

    /**
     * @return int
     */
    public function attachment_id()
    {
        return $this->attachment_id;
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
    public function is_publish()
    {
        return $this->is_publish;
    }

    /**
     * @return string
     */
    public function locale()
    {
        return $this->locale;
    }

    /**
     * @return int
     */
    public function is_show_on_front()
    {
        return $this->is_show_on_front;
    }
}