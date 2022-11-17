<?php

namespace App\Contracts\Booking;

use App\Http\Requests\Api\Booking\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Pagination\Paginator;

interface BookingServiceInterface
{
    public function getAllBookings(): Paginator;
    public function getBookingByProductId(int $productId): ?Booking;
    public function createBooking(StoreBookingRequest $request): array;
    public function determineBookingAvailability(Booking $booking): string;
}
