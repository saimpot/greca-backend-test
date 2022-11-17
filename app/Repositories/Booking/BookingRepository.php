<?php

namespace App\Repositories\Booking;

use App\Contracts\Booking\BookingRepositoryInterface;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class BookingRepository implements BookingRepositoryInterface
{
    private Booking $model;
    /**
     * BookingRepository constructor
     *
     * @param Booking $model
     */
    public function __construct(Booking $model)
    {
        $this->model = $model;
    }

    /**
     * @return Paginator
     */
    public function all(): Paginator
    {
        return $this->model->simplePaginate(50);
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function countProductsWithSameId(int $productId): int
    {
        return $this->model->where('product_id', $productId)->count();
    }
}
