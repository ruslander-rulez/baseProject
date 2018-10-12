<?php


namespace App\Application\Product;


use ItDevgroup\CommandBus\Command;

/**
 * Class UpdateProduct
 * @package App\Application\Product
 */
class UpdateProduct implements Command
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $vendor_code;
    /**
     * @var int
     */
    private $show_on_front;
    /**
     * @var int
     */
    private $thumbnail_id;
    /**
     * @var int
     */
    private $category_id;
    /**
     * @var string
     */
    private $made_in;
    /**
     * @var int
     */
    private $made_in_ico_id;
    /**
     * @var string
     */
    private $locale;
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
    private $description;
    /**
     * @var string
     */
    private $short_description;

    /**
     * @var array
     */
    private $gallery;

    /**
     * UpdateProduct constructor.
     * @param int $id
     * @param string $title
     * @param string $vendor_code
     * @param int $show_on_front
     * @param int $thumbnail_id
     * @param int $category_id
     * @param string $made_in
     * @param int $made_in_ico_id
     * @param string $locale
     * @param string $slug
     * @param string $seo_title
     * @param $seo_description
     * @param $seo_keywords
     * @param $description
     * @param string $short_description
     * @param $gallery
     */
    public function __construct(
        $id,
        $title,
        $vendor_code,
        $show_on_front,
        $thumbnail_id,
        $category_id,
        $made_in,
        $made_in_ico_id,
        $locale,
        $slug,
        $seo_title,
        $seo_description,
        $seo_keywords,
        $description,
        $short_description,
        $gallery
    )
    {

        $this->id = $id;
        $this->title = $title;
        $this->vendor_code = $vendor_code;
        $this->show_on_front = $show_on_front;
        $this->thumbnail_id = $thumbnail_id;
        $this->category_id = $category_id;
        $this->made_in = $made_in;
        $this->made_in_ico_id = $made_in_ico_id;
        $this->locale = $locale;
        $this->slug = $slug;
        $this->seo_title = $seo_title;
        $this->seo_description = $seo_description;
        $this->seo_keywords = $seo_keywords;
        $this->description = $description;
        $this->short_description = $short_description;
        $this->gallery = $gallery;
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
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function vendor_code()
    {
        return $this->vendor_code;
    }

    /**
     * @return int
     */
    public function show_on_front()
    {
        return $this->show_on_front;
    }

    /**
     * @return int
     */
    public function thumbnail_id()
    {
        return $this->thumbnail_id;
    }

    /**
     * @return int
     */
    public function category_id()
    {
        return $this->category_id;
    }

    /**
     * @return string
     */
    public function made_in()
    {
        return $this->made_in;
    }

    /**
     * @return int
     */
    public function made_in_ico_id()
    {
        return $this->made_in_ico_id;
    }

    /**
     * @return string
     */
    public function locale()
    {
        return $this->locale;
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
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function short_description()
    {
        return $this->short_description;
    }

    /**
     * @return array
     */
    public function gallery()
    {
        return $this->gallery;
    }
}