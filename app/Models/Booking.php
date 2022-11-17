<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Properties
 *
 * @property int id
 * @property int client_id
 * @property int product_id
 * @property timestamp booked_on
 * @property timestamp created_at
 * @property timestamp updated_at
 */
class Booking extends Model
{
    use HasFactory;

    /**
     * The values that can be filled
     *
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'product_id',
        'booked_on',
    ];

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
