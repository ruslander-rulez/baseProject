<?php
namespace App\Domain\Product;

use App\Domain\Attachment\Attachment;
use App\Domain\Category\Category;
use App\Domain\Review\Review;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property integer $id
 * @property string $title
 * @property string $vendor_code
 * @property boolean $show_on_front
 * @property integer $thumbnail_id
 * @property integer $category_id
 * @property string $made_in
 * @property integer $made_in_ico_id
 * @property string $locale
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string $description
 * @property string $short_description
 * @property Attachment $thumbnail
 * @property Category $category
 * @property Attachment $madeInIco
 */
class Product extends Model
{
    const ENTITY_TABLE = "product";

    protected $table = self::ENTITY_TABLE;

    public function made_in_ico() {
        return $this->belongsTo(Attachment::class, "made_in_ico_id");
    }
    public function thumbnail() {
        return $this->belongsTo(Attachment::class, "thumbnail_id");
    }

    public function gallery() {
        return $this->belongsToMany(Attachment::class, "attachment_product");
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, "product_id");
    }
}