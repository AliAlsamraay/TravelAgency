<?php

namespace App\Http\Livewire\TourPackage;

use App\Models\TourPackage;
use Livewire\Component;

class Edit extends Component
{
    public TourPackage $tourPackage;

    public function mount(TourPackage $tourPackage)
    {
        $this->tourPackage = $tourPackage;
    }

    public function render()
    {
        return view('livewire.tour-package.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->tourPackage->save();

        return redirect()->route('admin.tour-packages.index');
    }

    protected function rules(): array
    {
        return [
            'tourPackage.name' => [
                'string',
                'required',
            ],
            'tourPackage.price' => [
                'numeric',
                'required',
            ],
            'tourPackage.duration' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'tourPackage.activities' => [
                'string',
                'nullable',
            ],
        ];
    }
}
