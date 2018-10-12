<?php
namespace App\Domain\Category;

use App\Domain\Attachment\Attachment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $locale
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property int $thumbnail_id
 */
class Category extends Model
{
    const ENTITY_TABLE = "category";

    protected $table = self::ENTITY_TABLE;

    public function thumbnail() {
        return $this->belongsTo(Attachment::class, "thumbnail_id");
    }
}