<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Properties
 *
 * @property int id
 * @property string title
 * @property string type
 * @property string description
 * @property int capacity
 * @property timestamp created_at
 * @property timestamp update_at
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The values that can be filled
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'type',
        'description',
        'capacity',
    ];

    public function type(): HasOne
    {
        return $this->hasOne(ProductType::class);
    }
}
