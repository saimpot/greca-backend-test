<?php

namespace App\Http\Controllers\Api\Booking;

use App\Contracts\Booking\BookingServiceInterface;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Booking\StoreBookingRequest;
use Illuminate\Http\JsonResponse;

class BookingController extends BaseController
{
    public function __construct(private BookingServiceInterface $bookingService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->sendResponse(['bookings' => $this->bookingService->getAllBookings()], 'Retrieved bookings successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookingRequest $request
     * @return JsonResponse
     */
    public function store(StoreBookingRequest $request): JsonResponse
    {
        [$success, $message, $data] = $this->bookingService->createBooking($request);

        if($success === false) {
            return $this->sendError($message, [$data]);
        }

        return $this->sendResponse($message, $data);
    }
}
