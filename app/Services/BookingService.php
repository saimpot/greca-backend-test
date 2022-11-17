<?php

namespace App\Services;

use App\Constants\BookingConstants;
use App\Contracts\Booking\BookingRepositoryInterface;
use App\Contracts\Booking\BookingServiceInterface;
use App\Http\Requests\Api\Booking\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\Paginator;

class BookingService implements BookingServiceInterface
{
    public function __construct(private BookingRepositoryInterface $bookingRepository)
    {

    }

    /**
     * @return Paginator
     */
    public function getAllBookings(): Paginator
    {
        return $this->bookingRepository->all();
    }

    /**
     * @param int $productId
     * @return Booking|null
     */
    public function getBookingByProductId(int $productId): ?Booking
    {
        return $this->bookingRepository->find($productId);
    }

    /**
     * @param StoreBookingRequest $request
     * @return array
     */
    public function createBooking(StoreBookingRequest $request): array
    {
        try {
            return [true, $this->bookingRepository->create($request->safe()->toArray()), 'Booking created successfully.'];
        }
        catch (QueryException $e) {
            $errorText = sprintf('Something unexpected happened. Please forward this code to the support team: %d', $e->getCode());

            if($e->getCode() === 23505 || $e->getCode() === '23505') {
                $errorText = 'Duplicate booking found. Please select another product.';
            }
            return [false, $errorText, []];
        }
    }

    /**
     * @param Booking|null $booking
     * @return string
     */
    public function determineBookingAvailability(?Booking $booking): string
    {
        if(is_null($booking)) {
            return BookingConstants::AVAILABLE;
        }

        if($this->bookingRepository->countProductsWithSameId($booking->product_id) >= $booking->product->capacity) {
            return BookingConstants::UNAVAILABLE;
        }

        return BookingConstants::AVAILABLE;
    }
}
