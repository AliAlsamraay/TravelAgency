<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('booking_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'status' => [
                'required',
                'in:' . implode(',', array_keys(Booking::STATUS_RADIO)),
            ],
            'booking_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'tour_package_id' => [
                'integer',
                'exists:tour_packages,id',
                'required',
            ],
            'num_of_persons' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
