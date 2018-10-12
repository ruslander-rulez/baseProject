<?php
namespace App\Domain\Review;

use App\Domain\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const ENTITY_TABLE = "review";

    protected $table = self::ENTITY_TABLE;

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}