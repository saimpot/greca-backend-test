<?php

namespace App\Contracts\Booking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

interface BookingRepositoryInterface
{
    public function all(): Paginator;
    public function create(array $attributes): Model;
    public function countProductsWithSameId(int $productId): int;
}
