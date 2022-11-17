<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Validation\Rules\Enum;

/**
 * Properties
 *
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string passport_num
 * @property enum gender
 * @property timestamp created_at
 * @property timestamp update_at
 */
class Client extends Model
{
    use HasFactory;

    /**
     * The values that can be filled
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'passport_num',
        'gender',
    ];

    public function gender(): HasOne
    {
        return $this->hasOne(Gender::class);
    }
}
