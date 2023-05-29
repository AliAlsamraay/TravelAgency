<?php

namespace App\Http\Requests;

use App\Models\TourPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTourPackageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('tour_package_create'),
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
            'price' => [
                'numeric',
                'required',
            ],
            'duration' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'activities' => [
                'string',
                'nullable',
            ],
        ];
    }
}
