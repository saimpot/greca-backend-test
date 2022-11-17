<?php

namespace App\Http\Requests\Api\Booking;

use App\Contracts\Booking\BookingRepositoryInterface;
use App\Contracts\Booking\BookingServiceInterface;
use App\Rules\Available;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function __construct(private BookingRepositoryInterface $bookingRepository, private BookingServiceInterface $bookingService)
    {
        parent::__construct();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'availability' => $this->bookingService->determineBookingAvailability($this->bookingRepository->find(request()?->input(['product_id']))),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|integer|exists:clients,id',
            'product_id' => 'required|integer|exists:products,id',
            'booked_on' => 'sometimes|required|date',
            'availability' => new Available,
        ];
    }
}
