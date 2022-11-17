<?php

namespace App\Models;

use App\Repositories\Booking\BookingRepository;
use App\Services\BookingService;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'availability',
    ];

    /**
     * The accessors to hide from the model's array form.
     *
     * @var array
     */
    protected $hidden = [
        'product',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function getAvailabilityAttribute(): string
    {
        return (new BookingService(new BookingRepository($this)))->determineBookingAvailability($this);
    }
}
