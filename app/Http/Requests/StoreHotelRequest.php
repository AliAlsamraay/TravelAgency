<?php

namespace App\Http\Requests;

use App\Models\Hotel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;


class StoreHotelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('hotel_create'),
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
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'rating' => [
                'numeric',
                'min:0',
                'max:5',
                'nullable',
            ],
            'available_rooms' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'price_per_night' => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
