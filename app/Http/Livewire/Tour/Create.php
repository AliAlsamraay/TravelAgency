<?php

namespace App\Http\Livewire\Tour;

use App\Models\Hotel;
use App\Models\Location;
use App\Models\Tour;
use App\Models\TourPackage;
use Livewire\Component;

class Create extends Component
{
    public Tour $tour;

    public array $tour_package = [];

    public array $listsForFields = [];

    public function mount(Tour $tour)
    {
        $this->tour = $tour;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.tour.create');
    }

    public function submit()
    {
        $this->validate();

        $this->tour->save();
        $this->tour->tourPackage()->sync($this->tour_package);

        return redirect()->route('admin.tours.index');
    }

    protected function rules(): array
    {
        return [
            'tour.name' => [
                'string',
                'required',
            ],
            'tour.description' => [
                'string',
                'nullable',
            ],
            'tour.start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'tour.end_date' => [
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
            'tour.hotel_id' => [
                'integer',
                'exists:hotels,id',
                'required',
            ],
            'tour.location_id' => [
                'integer',
                'exists:locations,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['tour_package'] = TourPackage::pluck('name', 'id')->toArray();
        $this->listsForFields['hotel']        = Hotel::pluck('name', 'id')->toArray();
        $this->listsForFields['location']     = Location::pluck('name', 'id')->toArray();
    }
}
