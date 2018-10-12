<?php
namespace App\Domain\Advice;

use App\Domain\Attachment\Attachment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property integer $id
 * @property integer $attachment_id
 * @property string $full_text
 * @property string $short_text
 * @property string $title
 * @property int $is_publish
 * @property int $is_show_on_front
 * @property string $locale
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 */
class Advice extends Model
{
   const IS_PUBLISH_TRUE = 1;
   const IS_PUBLISH_FALSE = 2;

   const IS_SHOW_ON_FRONT_TRUE = 1;
   const IS_SHOW_ON_FRONT_FALSE = 2;

   const ENTITY_TABLE = "advice";

   protected $table = self::ENTITY_TABLE;

   public function attachment() {
       return $this->belongsTo(Attachment::class, "attachment_id");
   }
}