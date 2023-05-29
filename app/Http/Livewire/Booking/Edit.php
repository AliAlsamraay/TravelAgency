<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\TourPackage;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Booking $booking;

    public array $listsForFields = [];

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.booking.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->booking->save();

        return redirect()->route('admin.bookings.index');
    }

    protected function rules(): array
    {
        return [
            'booking.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'booking.booking_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'booking.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'booking.tour_package_id' => [
                'integer',
                'exists:tour_packages,id',
                'required',
            ],
            'booking.num_of_persons' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status']       = $this->booking::STATUS_RADIO;
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['tour_package'] = TourPackage::pluck('name', 'id')->toArray();
    }
}
