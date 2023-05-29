<?php

namespace App\Http\Livewire\Hotel;

use App\Models\Hotel;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Hotel $hotel;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->hotel->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function render()
    {
        return view('livewire.hotel.create');
    }

    public function submit()
    {
        $this->validate();

        $this->hotel->save();
        $this->syncMedia();

        return redirect()->route('admin.hotels.index');
    }

    protected function rules(): array
    {
        return [
            'hotel.name' => [
                'string',
                'required',
            ],
            'hotel.description' => [
                'string',
                'nullable',
            ],
            'hotel.address' => [
                'string',
                'nullable',
            ],
            'hotel.rating' => [
                'numeric',
                'nullable',
            ],
            'hotel.available_rooms' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'hotel.price_per_night' => [
                'numeric',
                'nullable',
            ],
            'mediaCollections.hotel_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.hotel_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
