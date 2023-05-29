<?php

namespace App\Http\Requests;

use App\Models\Tour;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTourRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('tour_edit'),
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
            'start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'tour_package' => [
                'required',
                'array',
            ],
            'tour_package.*.id' => [
                'integer',
                'exists:tour_packages,id',
            ],
            'hotel_id' => [
                'integer',
                'exists:hotels,id',
                'required',
            ],
            'location_id' => [
                'integer',
                'exists:locations,id',
                'required',
            ],
        ];
    }
}
